<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
class Dashboard extends CI_Controller{
    public function __construct(){
        // this is how we load libraries in codeigniter, here i load library of session 
                parent::__construct();
                      $this->load->helper('url');
                      $this->load->model('Import_Model', 'users');
                      $this->load->model('UserModel', 'subjects');
                $this->load->library('session');
            
            } 
public function index()
{
    # code...
    if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
        # code...
//         $this->db->where('email',$this->session->email[0]['email']);
// $result = $this->db->get('users')->result_array();
// echo $result[0]['role'];
    $data =['title'=>'home'];
    $this->load->view('admin/_header',$data);
    $this->load->view('admin/_home');
    }
    else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
    
}
public function students()
{
    # code...
    if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
        # code...
//         $this->db->where('email',$this->session->email[0]['email']);
// $result = $this->db->get('users')->result_array();
// echo $result[0]['role'];
$data1['students'] = $this->db->where('role', "student")->order_by('id', 'DESC')->get('users')->result_array();
    $data =['title'=>'students'];
    $this->load->view('admin/_header',$data);
    $this->load->view('admin/_students',$data1);
    }
    else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
}
// upload students from excel sheet or csv

public function uploadstudents(){
    
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    
    if(isset($_FILES['uploadFile']['name']) && in_array($_FILES['uploadFile']['type'], $file_mimes)) {
        $arr_file = explode('.', $_FILES['uploadFile']['name']);
        $extension = end($arr_file);
        if('csv' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }elseif('xls' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($_FILES['uploadFile']['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        if (!empty($sheetData)) {
            $y=0;
            for ($i=1; $i<count($sheetData); $i++) {
                $inserdata[$y]['Firstname'] = $sheetData[$i][1];
                $inserdata[$y]['Lastname'] = $sheetData[$i][2];
                $inserdata[$y]['email'] = $sheetData[$i][3];
                $inserdata[$y]['faculity'] = $sheetData[$i][4];
                $inserdata[$y]['level'] = $sheetData[$i][5];
                $inserdata[$y]['reference'] = $sheetData[$i][6];
                $inserdata[$y]['role'] = 'student';
                $inserdata[$y]['status'] = 0;
                $y++;
            }
    $result = $this->users->insert($inserdata);   
    if($result){
        $this->session->set_flashdata('danger', '<p class="alert alert-success text-center">Students Added!</p>');
  
        redirect($this->agent->referrer());
    }else{
        $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Something went wrong</p>');
  
        redirect($this->agent->referrer());
    }
        }
        
    }
    }
    public function delete_student($id){
        if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
            $property = $this->db->where('id', $id)->get('users')->result_array();
    
            $this->db->where('id', $id);
            $this->db->delete('users');
        
            
            $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">student removed</p>');
        
            redirect($this->agent->referrer());
    
        }
        else{
    $this->session->set_flashdata('alert', 'danger');
    $this->session->set_flashdata('msg', 'You must login and have access!');
    
    $data = ['title'=>'home'];
    $this->load->view('pages/header',$data);
    $this->load->view('home');
        }
     
        
    }
    public function teachers()
{
    # code...
    if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
        # code...
//         $this->db->where('email',$this->session->email[0]['email']);
// $result = $this->db->get('users')->result_array();
// echo $result[0]['role'];
$data1['students'] = $this->db->where('role', "teacher")->order_by('id', 'DESC')->get('users')->result_array();
    $data =['title'=>'teachers'];
    $this->load->view('admin/_header',$data);
    $this->load->view('admin/_teachers',$data1);
    }
    else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
}
public function uploadteachers(){
  
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    
    if(isset($_FILES['uploadFile']['name']) && in_array($_FILES['uploadFile']['type'], $file_mimes)) {
        $arr_file = explode('.', $_FILES['uploadFile']['name']);
        $extension = end($arr_file);
        if('csv' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }elseif('xls' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($_FILES['uploadFile']['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        if (!empty($sheetData)) {
            $y=0;
            for ($i=1; $i<count($sheetData); $i++) {
                $inserdata[$y]['Firstname'] = $sheetData[$i][1];
                $inserdata[$y]['Lastname'] = $sheetData[$i][2];
                $inserdata[$y]['email'] = $sheetData[$i][3];
                $inserdata[$y]['faculity'] = $sheetData[$i][4];
                $inserdata[$y]['level'] = $sheetData[$i][5];
                $inserdata[$y]['reference'] = $sheetData[$i][6];
                $inserdata[$y]['role'] = 'teacher';
                $inserdata[$y]['status'] = 0;
                $y++;
            }
    $result = $this->users->insert($inserdata);   
    if($result){
        $this->session->set_flashdata('danger', '<p class="alert alert-success text-center">Lecturers Added!</p>');
  
        redirect($this->agent->referrer());
    }else{
        $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Something went wrong</p>');
  
        redirect($this->agent->referrer());
    }
        }
        
    }
} 
    
    // import
    
    //end import
    //delete teacher
    public function delete_teacher($id){
        if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
            $property = $this->db->where('id', $id)->get('users')->result_array();
    
            $this->db->where('id', $id);
            $this->db->delete('users');
        
            
            $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">teacher removed</p>');
        
            redirect($this->agent->referrer());
    
        }
        else{
    $this->session->set_flashdata('alert', 'danger');
    $this->session->set_flashdata('msg', 'You must login and have access!');
    
    $data = ['title'=>'home'];
    $this->load->view('pages/header',$data);
    $this->load->view('home');
        }
     
        
    }
    public function logout()
    {
        # code...
        $this->session->sess_destroy();
		return redirect(base_url());
    }
    public function rooms()
{
    # code...
if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
   
$data1['students'] = $this->db->order_by('id', 'DESC')->get('rooms')->result_array();
    $data =['title'=>'rooms'];
    $this->load->view('admin/_header',$data);
    $this->load->view('admin/_rooms',$data1);
    }
    else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
}
//new room
public function addroom()
{
    # code...
if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
        # code...

  $data=[
    'name' => $this->input->post('name'),
    'capacity' => $this->input->post('capacity')
  ];
  $this->db->insert('rooms', $data);
  $this->session->set_flashdata('info', '<p class="alert alert-info text-center">Room Added</p>');
        
  redirect($this->agent->referrer());
    }
else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
}
//delete room
public function delete_room($id){
    if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
        $property = $this->db->where('id', $id)->get('rooms')->result_array();

        $this->db->where('id', $id);
        $this->db->delete('rooms');
    
        
        $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Room removed</p>');
    
        redirect($this->agent->referrer());

    }
    else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
 
    
}
//subjects

public function subjects()
{
    # code...
if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
   
$data1['students'] = $this->db->order_by('id', 'DESC')->get('subjects')->result_array();
    $data =['title'=>'subjects'];
    $this->load->view('admin/_header',$data);
    $this->load->view('admin/_subjects',$data1);
    }
    else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
}

// add subject
public function addsubject()
{
    # code...
if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
        # code...

  $data=[
    'title' => $this->input->post('title'),
    'code' => $this->input->post('code'),
    'level' => $this->input->post('level'),
    'faculity' => $this->input->post('faculity'),
    'semester' => $this->input->post('semester')
  ];
  $this->db->insert('subjects', $data);
  $this->session->set_flashdata('info', '<p class="alert alert-info text-center">Subject Added</p>');
        
  redirect($this->agent->referrer());
    }
else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
}
//exams timetables
public function exams()
{
    # code...
if (isset($this->session->email)&& $this->session->email[0]['role']=='admin'||$this->session->email[0]['role']=='teacher') {
    $data1['rooms'] = $this->db->order_by('id', 'DESC')->get('rooms')->result_array();
    $data1['teachers'] = $this->db->where('role','teacher')->get('users')->result_array();
    $data1['subjects'] = $this->db->order_by('id', 'DESC')->get('subjects')->result_array();
   
    $data1['students'] = $this->db->order_by('id', 'DESC')->get('examtime')->result_array();
    $data =['title'=>'exam-timetable'];
    $this->load->view('admin/_header',$data);
    $this->load->view('admin/_timetable',$data1);
    }
    else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
}
//delete exam
public function delete_exam($id){
    if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
        $property = $this->db->where('id', $id)->get('examtime')->result_array();

        $this->db->where('id', $id);
        $this->db->delete('examtime');
    
        
        $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Exam removed</p>');
    
        redirect($this->agent->referrer());

    }
    else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
 
    
}
//add timetable
public function addtable()
{
    # code...
if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
        # code...
$day = $this->input->post('date');
$newDate = date("l,d-m-Y", strtotime($day));
$number = $this->input->post('students');
$time_start = $this->input->post('time_start');
$time_end = $this->input->post('time_end');
$fname = $this->input->post('fname');
$subject_code = $this->input->post('subject_code');
$room_name = $this->input->post('room_name');
$semester = $this->input->post('semester');
$sy = $this->input->post('sy');
$department = $this->input->post('department');

$subjects = $this->db->where('code', $subject_code)->get('subjects')->result_array();
$time =$this->db->where('day',$newDate)->where('time_start',$time_start)->where('department',$department)->where('semester',$semester)->get('examtime')->result_array();


if ($time) {
    # code...
    if ($time[0]['day']==$newDate && $time[0]['time_start']== $time_start&& $time[0]['time_end']==$time_end && $time[0]['semester']==$semester && $time[0]['department']==$department) {
        # code...
        $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Time already taken</p>');
        redirect($this->agent->referrer());
        
    }
    
}
$singlel =$this->db->where('day',$newDate)->where('time_start',$time_start)->where('lecturer',$fname)->where('time_end',$time_end)->get('examtime')->result_array();
if ($singlel) {
    # code...
    if ($singlel[0]['day']==$newDate && $singlel[0]['time_start']== $time_start &&$singlel[0]['lecturer']==$this->input->post('fname')) {
        # code...
        $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Lecturer already assigned to an exam!</p>');
        redirect($this->agent->referrer());
    }
}
//$timed = $this->db->where('day',$newDate)->where('department',$department)->where('semester',$semester)->get('examtime')->count_all_results();
$this->db->where('day',$newDate);
$this->db->where('department',$department);
$this->db->where('semester',$semester);
$query = $this->db->get('examtime');
// echo $query->num_rows();die();
if ($query->num_rows()==2) {
    # code...
    $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Maximum day exams reached for this department and semester</p>');
    redirect($this->agent->referrer());
    
}
//$property = $this->db->where('name', $room_name)->get('rooms')->result_array();
// if ($property[0]['rplace']< $number) {
//     # code...
//     $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Not enough places! the current places are:'.$property[0]['rplace'].'</p>');

// redirect($this->agent->referrer());
// }
$this->db->where('role','student');
$this->db->where('faculity',$department);
$this->db->where('level',$semester);
$query = $this->db->get('users');
$number = $query->num_rows();
// echo $number;die();
$property = $this->db->where('rplace >=',$number)->limit(1)->get('rooms')->result_array();

  $data=[
    'coursename' => $subjects[0]['title'],
    
    'department' => $this->input->post('department'),
    'semester' => $this->input->post('semester'),
    'sy' => $this->input->post('sy'),
    'room_name' => $property[0]['name'],
    'subject_code' => $this->input->post('subject_code'),
    'lecturer' => $this->input->post('fname'),
    'time_end' => $this->input->post('time_end'),
    'time_start' => $this->input->post('time_start'),
    'day' => $newDate,
    'status'=>'new'
  ];
 
  if ( $this->db->insert('examtime', $data)) {
    # code...
    $remainplace = $property[0]['rplace']-$number;
      $this->db->set('rplace',$remainplace);
		$this->db->where('id', $property[0]['id']);
		$this->db->update('rooms');

    $this->session->set_flashdata('info', '<p class="alert alert-info text-center">Exam time table Added</p>');
        
  redirect($this->agent->referrer());
  }
  
    }
else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
}
//edit teacher
public function editteachers($id)
{
    # code...
    $property = $this->db->where('id', $id)->get('users')->result_array();
    $seo_data = array(
        'title' => $property[0]['Firstname']
    );

    $data['teachers'] = $property;
    $this->load->view('admin/_header', $seo_data);
	$this->load->view('admin/_edit', $data);

}
public function updateacher()
{
    # code...
        $this->db->set('Firstname' , $this->input->post('Firstname'));
        $this->db->set('Lastname' , $this->input->post('Lastname'));
        $this->db->set('email' , $this->input->post('email'));
        
        
        $this->db->set('faculity' , $this->input->post('faculity'));
        $this->db->set('level' , $this->input->post('level'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users');
        $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Lecturer updated</p>');
        redirect(base_url('dashboard/lecturers'));

}
//edit students
public function editstudents($id)
{
    # code...
    $property = $this->db->where('id', $id)->get('users')->result_array();
    $seo_data = array(
        'title' => $property[0]['Firstname']
    );

    $data['students'] = $property;
    $this->load->view('admin/_header', $seo_data);
	$this->load->view('admin/_editstudents', $data);

}
public function updatestudent()
{
    # code...
        $this->db->set('Firstname' , $this->input->post('Firstname'));
        $this->db->set('Lastname' , $this->input->post('Lastname'));
        $this->db->set('email' , $this->input->post('email'));
        
        
        $this->db->set('faculity' , $this->input->post('faculity'));
        $this->db->set('level' , $this->input->post('level'));
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users');
        $this->session->set_flashdata('danger', '<p class="alert alert-success text-center">Student updated</p>');
        redirect(base_url('dashboard/students'));

}
public function newstudents()
{
    # code...
    
$data = ['title'=>'New student'];
$this->load->view('admin/_header',$data);
$this->load->view('admin/_newstudent');

}
public function addstudent()
{
    # code...
    $data=[
        
        
        'Firstname' => $this->input->post('Firstname'),
        'level' => $this->input->post('level'),
        'Lastname' => $this->input->post('Lastname'),
        'email' => $this->input->post('email'),
        'faculity' => $this->input->post('faculity'),
        'reference' => $this->input->post('reference'),
        'role'=>'student'
      ];
     
      if ( $this->db->insert('users', $data)) {
                            # code...
                            $this->session->set_flashdata('success', '<p class="alert alert-success text-center">Student Added successfully!</p>');
                            redirect(base_url('dashboard/students'));
                                        
      }

}
// new lecturer
public function newlecturer()
{
    # code...
    
$data = ['title'=>'New lecturer'];
$this->load->view('admin/_header',$data);
$this->load->view('admin/_newteacher');

}
public function addteacher()
{
    # code...
    $data=[
        
        
        'Firstname' => $this->input->post('Firstname'),
        'level' => $this->input->post('level'),
        'Lastname' => $this->input->post('Lastname'),
        'email' => $this->input->post('email'),
        'faculity' => $this->input->post('faculity'),
        
        'role'=>'teacher'
      ];
     
      if ( $this->db->insert('users', $data)) {
                            # code...
                            $this->session->set_flashdata('success', '<p class="alert alert-success text-center">Lecturer Added successfully!</p>');
                            redirect(base_url('dashboard/lecturers'));
                                        
      }

}
//upload subjects
public function uploadsubjects(){
    
    $file_mimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    
    if(isset($_FILES['uploadFile']['name']) && in_array($_FILES['uploadFile']['type'], $file_mimes)) {
        $arr_file = explode('.', $_FILES['uploadFile']['name']);
        $extension = end($arr_file);
        if('csv' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        }elseif('xls' == $extension){
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        }else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
        $spreadsheet = $reader->load($_FILES['uploadFile']['tmp_name']);
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        if (!empty($sheetData)) {
            $y=0;
            for ($i=1; $i<count($sheetData); $i++) {
                $inserdata[$y]['code'] = $sheetData[$i][0];
                $inserdata[$y]['title'] = $sheetData[$i][1];
                $inserdata[$y]['semester'] = $sheetData[$i][2];
                $inserdata[$y]['faculity'] = $sheetData[$i][3];
                $inserdata[$y]['credits'] = $sheetData[$i][4];
                
                $y++;
            }
    $result = $this->subjects->insert($inserdata);   
    if($result){
        $this->session->set_flashdata('danger', '<p class="alert alert-success text-center">Subjects Added!</p>');
  
        redirect($this->agent->referrer());
    }else{
        $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Something went wrong</p>');
  
        redirect($this->agent->referrer());
    }
        }
        
    }
    }
    //delete subjects
    public function delete_subject($id){
        if (isset($this->session->email)&& $this->session->email[0]['role']=='admin') {
            $property = $this->db->where('id', $id)->get('subjects')->result_array();
    
            $this->db->where('id', $id);
            $this->db->delete('subjects');
        
            
            $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">SUbject removed</p>');
        
            redirect($this->agent->referrer());
    
        }
        else{
    $this->session->set_flashdata('alert', 'danger');
    $this->session->set_flashdata('msg', 'You must login and have access!');
    
    $data = ['title'=>'home'];
    $this->load->view('pages/header',$data);
    $this->load->view('home');
        }
     
        
    }
    public function getsubje($id){
	    $str1 = urldecode($id);
		$this->db->select('title');
		$this->db->where('title', $str1);
		$district = $this->db->get('subjects')->result_array();

		
		;
		$output = '<option>Select Subject</option>';

		// foreach ($districts as $district) {
			$output .= '<option value="'. $district['title'] .'">' . $district['title'] . '</option>';
		// }
		
		echo $output;
		// echo $district['name'];
		// echo view('_parts/_header',$data);
		// echo view('_parts/_survey',$dat);
		// echo 'hey';
	} 

}
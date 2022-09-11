<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Lecturer extends CI_Controller{
public function index()
{
    # code...
    $data =['title'=>'home'];
    $this->load->view('teachers/_header',$data);
    $this->load->view('teachers/_home');
}

public function lecturers()
{
    # code...
    if (isset($this->session->email)&& $this->session->email[0]['role']=='student') {
        # code...
        $this->db->where('email',$this->session->email[0]['email']);
$result = $this->db->get('users')->result_array();
// echo $result[0]['role'];
    $data1['teachers'] = $this->db->where('role', "teacher")->where('level',$result[0]['level'])->where('faculity',$result[0]['faculity'])->order_by('id', 'DESC')->get('users')->result_array();
    $data =['title'=>'lecturers'];
    $this->load->view('students/_header',$data);
    $this->load->view('students/_teachers',$data1);
// echo $this->session->email[0]['level'];
    }
    else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
}

//time table
public function exams()
{
    # code...
    if (isset($this->session->email)&& $this->session->email[0]['role']=='student') {
        # code...
        $this->db->where('email',$this->session->email[0]['email']);
$result = $this->db->get('users')->result_array();
// echo $result[0]['role'];
    $data1['examtime'] = $this->db->where('level',$result[0]['level'])->where('department',$result[0]['faculity'])->order_by('id', 'DESC')->get('examtime')->result_array();
    $data =['title'=>'timetable'];
    $this->load->view('students/_header',$data);
    $this->load->view('students/_timetable',$data1);
// echo $this->session->email[0]['level'];
    }
    else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'You must login and have access!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
}
}

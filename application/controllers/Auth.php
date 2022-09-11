<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Auth extends CI_Controller{
    public function __construct(){
// this is how we load libraries in codeigniter, here i load library of session 
        parent::__construct();
              $this->load->helper('url');
               
        $this->load->library('session');
    
    }
public function login()
{
    # code...
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    
// here i first checked if the email exists in our table, if exists i check if password matches
$this->db->where('email',$email);
$result = $this->db->get('users')->result_array();

if (count($result)==1) {
# here i checked if password is correct and if correct we check if account is activated
if (password_verify($password,$result[0]['password'])) {
    #check if account is verified or activated
    if ($result[0]['status']==0) {
        # code...
        $this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'Account not activated!! check your email to verify it!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
    }
    else{
        // echo 'authenticated';
        // if email and password are correct and account is verified, we redirect them according to roles i.e if teacher to teacher panel, student to student panel and admin to admin
        if ($result[0]['role']=='admin') {
            # code...
        $this->session->set_userdata('email', $result);
       $this->session->set_userdata('id', $result[0]['id']);
      return redirect(base_url('dashboard'));
            
        }
        else if($result[0]['role']=="student"){
            $this->session->set_userdata('email', $result);
          $this->session->set_userdata('id', $result[0]['id']);
            return redirect(base_url('account'));
        }
        else if($result[0]['role']=="teacher"){
            $this->session->set_userdata('email', $result);
          $this->session->set_userdata('id', $result[0]['id']);
            return redirect(base_url('home')); 
        }
        else{
            $this->session->set_flashdata('alert', 'danger');
            $this->session->set_flashdata('msg', 'Account not found! try again!');
            
            $data = ['title'=>'home'];
            $this->load->view('pages/header',$data);
            $this->load->view('home');  
        }
    }
    
}
else{
    $this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'Wrong password! try again!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
}
// $this->session->set_userdata('email', $result);
// $this->session->set_userdata('id', $result[0]['id']);
// return redirect(base_url('account'));
}
else{
$this->session->set_flashdata('alert', 'danger');
$this->session->set_flashdata('msg', 'Unknown email! try again!');

$data = ['title'=>'home'];
$this->load->view('pages/header',$data);
$this->load->view('home');
//echo 'invalid email';

}
    
}
public function postregister(){
   
    if (isset($_POST['register'])) {
        # code...
    
       $this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email');
       $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]|max_length[32]');
       $this->form_validation->set_rules('cpassword', 'Password Confirmation', 'trim|required|matches[password]');

            
              
                $email1 = $this->input->post('email');

            
            if (strpos($email1, 'auca.ac.rw') == false) {
                # code...
            $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Invalid email</p>');
        
            redirect($this->agent->referrer());
            }
            else{
                if ($this->form_validation->run() == FALSE) {
                    # code...
                    $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Fill all fields and passwords must match</p>');
        
                       redirect(base_url('register'));  
                                            
                     }
                     else{
                        $data1 = $this->db->where('email', $email1)->get('users')->result_array();
                        if ($data1) {
                            # code...
                            $unid = md5(str_shuffle($this->input->post('reference')).time());
                            $pass = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $this->db->set('password',$pass);
        $this->db->set('unid',$unid);
		$this->db->where('id', $data1[0]['id']);
		if($this->db->update('users')){
            $this->load->library('email');
        $subject = 'Account Activation';

                          
        $message ='';
        $message .= "<h2>You are receiving this message in response to your recent account created on monitoring.healthbuilders.org system</h2>"
                        . "<p>Follow this link to activate your account <a href='".base_url('activate/'.$unid.'')."' target='_blank' >Activate your account</a> </p>"
                        . "<p>If You did not make this request kindly ignore!</p>"
                        . "<P class='pj'><h2>Kind Regards</h2></p>"
                        . "<style>"
                        . ".pj{"
                        . "color:green;"
                        . "}"
                        . "</style>"
                        . "";
        
                        $email_to = $this->input->post('email');
                        $this->email->from('6eedcda7336a91', 'AUCA');
                        $this->email->to($email_to);
                        
                        $this->email->subject($subject);
                        $this->email->message($message);
                        if ($this->email->send()) {
                            # code...
                            $this->session->set_flashdata('success', '<p class="alert alert-success text-center">Check your email to activate your account!</p>');
                            redirect(base_url());
                        }
                        else{
                            $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Something went wrong! Call for assistance</p>');
                            redirect($this->agent->referrer());
                        }
        }

        
                        }
                        else{
                        $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Your account not found!</p>');
        
                       redirect($this->agent->referrer());  
                        }

                     }
                         

                    
                    
            
        }

    }
}










public function activate($unid)
{
    # code...
    if (!empty($unid)) {

        # code...
        
        
        $data = $this->db->where('unid', $unid)->get('users')->result_array();
        if ($data) {
            # code...
           if ($data[0]['status']==1) {
               # code...
               return redirect(base_url());

           }
           else{
               
              

// Save the changes
        $this->db->set('status',1);
       
		$this->db->where('id', $data[0]['id']);
		
              
               
               if ($this->db->update('users')) {
                   # code...
                   $this->session->set_flashdata('success', '<p class="alert alert-success text-center">Your account was activated!</p>');
        
                       redirect(base_url());

               }
               else{
                $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Your account not found!</p>');
        
                       redirect(base_url());
               }

           }
           
        }
        
    }
    else {
        $this->session->set_flashdata('danger', '<p class="alert alert-danger text-center">Your activation code is invalid!</p>');
        
                       redirect(base_url());
    }
   
}   
}
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller{
public function index()
{
    # code...
    $data =['title'=>'home'];
    $this->load->view('pages/header',$data);
    $this->load->view('home');
}
}
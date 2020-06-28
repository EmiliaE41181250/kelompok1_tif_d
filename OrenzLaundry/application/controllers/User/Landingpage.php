<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {
    function index(){
        $this->load->view('user/index');
    }
}
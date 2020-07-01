<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landingpage extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->helper(array('url','download')); 
    }
    
    function index(){
        $this->load->view('user/index');
    }

    public function download_apk(){			
		force_download('./assets/files/OrenzLaundry.apk',NULL);
	}	
}
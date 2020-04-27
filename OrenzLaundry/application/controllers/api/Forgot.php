<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;

class Forgot extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        $this->load->model('Forgot_model','forgot');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        // $this->methods['index_get']['limit'] = 500; // 500 requests per hour per user/key
    }

    public function index_post()
    {
        $request = $this->input->post(null,true);
        $request     = (object) $this->input->post(null, true);

        if (!$this->forgot->validate()) {
            $this->response([
                'status' => false,
                'message' => validation_errors(null, null)
            ], 404);
        }

        $forgot = $this->forgot->run($request);

        if($forgot['status']){
            $this->set_response([
                'status' => TRUE,
                'message' => $forgot['pesan']
            ], REST_Controller::HTTP_NOT_FOUND);
        }else{
            $this->set_response([
                'status' => FALSE,
                'message' => $forgot['pesan']
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

}

/* End of file Forgot.php */
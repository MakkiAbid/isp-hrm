<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!auth()) {
            redirect('auth/login');
        }
    }

    public function index()
    {
        echo $this->view('pages.profile.edit');
    }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!auth()){
            redirect('auth/login');
        }
    }

    public function index()
    {
        $jobs = JobPostModel::where('is_publish', 1)->get();
        $this->view('pages.jobs.all', compact('jobs'));
    }

}
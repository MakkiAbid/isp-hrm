<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobStatus extends My_Controller
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
        $applied_jobs = JobApplyModel::whereHas('job_post')->where('user_id', auth()->id)->get();
//        dd($applied_jobs);
        $this->view('pages.applied_jobs.all', compact('applied_jobs'));
    }

}
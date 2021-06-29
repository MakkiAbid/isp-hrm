<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CandidateStats extends My_Controller
{
    public function __construct()
    {
        parent::__construct();
        if(!auth()) {
            redirect('auth/login');
        }
    }



}
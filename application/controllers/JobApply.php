<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class JobApply extends My_Controller
{
    public function apply($job_id)
    {
        $job_apply = JobApply::where('id', $job_id)->first();
        dd('JOB APPLY');

    }

}
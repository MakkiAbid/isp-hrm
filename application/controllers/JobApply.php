<?php

use Carbon\Carbon;

defined('BASEPATH') OR exit('No direct script access allowed');

class JobApply extends My_Controller
{

    public function index()
    {
        $applied_candidates = JobApplyModel::all();
        $this->view('pages.applied_jobs.all_candidates', compact('applied_candidates'));
    }

    public function apply($job_id)
    {
        $job = JobPostModel::where('id', $job_id)->first();
        if($job) {
            if($job->education_types->duration <= getTotalEducationYears(auth()->id)) {
                if($job->minimum_experience <= getTotalExp(auth()->id)) {
                    if($job->last_submission_date >= Carbon::now()) {

                        $job_exist = JobApplyModel::where('user_id', auth()->id)->where('job_id', $job_id)->get();

                        if(!$job_exist) {

                            try {
                                JobApplyModel::create([
                                    'user_id' => auth()->id,
                                    'job_post_id' => $job->id
                                ]);

                                return $this->JSONResponse([
                                    'error' => false,
                                    'form' => false,
                                    'redirect_url' => base_url('jobs'),
                                    'status' => 'success',
                                    'messages' => 'Applied to job. Please be patient you\'ll receive a notification!'
                                ]);
                            }catch(\Exception $e) {
                                return $this->JSONResponse([
                                    'error' => true,
                                    'form' => false,
                                    'messages' => 'Something went wrong please try again'
                                ]);
                            }
                        }else {
                            return $this->JSONResponse([
                                'error' => false,
                                'form' => false,
                                'redirect_url' => base_url('jobs'),
                                'status' => 'warning',
                                'messages' => 'You already have applied for this job. Please be patient!'
                            ]);
                        }

                    }else {
                        return $this->JSONResponse([
                            'error' => false,
                            'form' => false,
                            'redirect_url' => base_url('jobs'),
                            'status' => 'danger',
                            'messages' => 'Job Date Expired'
                        ]);
                    }
                }else {
                    return $this->JSONResponse([
                        'error' => false,
                        'form' => false,
                        'redirect_url' => base_url('jobs'),
                        'status' => 'danger',
                        'messages' => 'You\'re under experienced for this job'
                    ]);
                }
            }else {
                return $this->JSONResponse([
                    'error' => false,
                    'form' => false,
                    'redirect_url' => base_url('jobs'),
                    'status' => 'danger',
                    'messages' => 'Your educational criteria is below for this job'
                ]);
            }
        }

    }

    public function resume($id)
    {
        $user = UserModel::where('id', $id)->first();
        $this->view('pages.applied_jobs.resume', compact('user'));
    }

}
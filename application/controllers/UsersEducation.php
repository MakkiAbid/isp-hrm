<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersEducation extends My_Controller
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
        if($this->input->is_ajax_request()) {
            try {
                foreach ($this->input->post('education') as $key => $value){
                    EducationModel::create([
                        'user_id' => auth()->id,
                        'education_type_id' => $this->input->post('education['.$key.'][degree]'),
                        'obtained' => $this->input->post('education['.$key.'][obtained_marks]'),
                        'total' => $this->input->post('education['.$key.'][total_marks]'),
                        'year' => $this->input->post('education['.$key.'][year]'),
                        'institute' => $this->input->post('education['.$key.'][institute]')
                    ]);
                }


                return $this->JSONResponse([
                   'error' => false,
                   'form' => false,
                   'messages' => 'User education updated successfully!'
                ]);
            }catch (\Exception $e){
                return $this->JSONResponse([
                    'error' => true,
                    'form' => false,
                    'messages' => 'Something went wrong please try again!'
                ]);
            }
        }
    }

}
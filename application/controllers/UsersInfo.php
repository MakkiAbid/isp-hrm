<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersInfo extends My_Controller
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
            $config = array(
                [
                    'field' => 'name',
                    'label' => 'Name',
                    'rules' => 'required'
                ],
                [
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|valid_email'
                ],
                [
                    'field' => 'address',
                    'label' => 'Address',
                    'rules' => 'required'
                ],
                [
                    'field' => 'city',
                    'label' => 'City',
                    'rules' => 'required'
                ],
                [
                    'field' => 'dob',
                    'label' => 'Date of Birth',
                    'rules' => 'required'
                ],
                [
                    'field' => 'gender',
                    'label' => 'Gender',
                    'rules' => 'required|in_list[male,female]'
                ],
                [
                    'field' => 'marital_status',
                    'label' => 'Marital Status',
                    'rules' => 'required|in_list[single,married]'
                ],
                [
                    'field' => 'nationality',
                    'label' => 'Nationality',
                    'rules' => 'required'
                ],
                [
                    'field' => 'religion',
                    'label' => 'Religion',
                    'rules' => 'required'
                ],
                [
                    'field' => 'cnic',
                    'label' => 'CNIC',
                    'rules' => 'required|regex_match[/^([0-9]{5})[\-]([0-9]{7})[\-]([0-9]{1})+/]'
                ]
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() === FALSE) {
                return $this->JSONResponse([
                    'error' => true,
                    'form' => true,
                    'messages' => $this->form_validation->error_array()
                ]);
            }else{
                try{
                    UsersInfoModel::create([
                        'user_id' => auth()->id,
                        'city' => $this->input->post('city'),
                        'address' => $this->input->post('address'),
                        'gender' => $this->input->post('gender'),
                        'marital_status' => $this->input->post('marital_status'),
                        'nationality' => $this->input->post('nationality'),
                        'religion' => $this->input->post('religion'),
                        'cnic' => $this->input->post('cnic')
                    ]);

                    return $this->JSONResponse([
                       'error' => false,
                       'form' => false,
                       'messages' => 'Personal Information updated successfully!'
                    ]);

                }catch (\Exception $e){
                    return $this->JSONResponse([
                        'error' => true,
                        'form' => false,
                        'messages' => 'Something went wrong please try again'
                    ]);
                }
            }
        }
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends My_Controller
{

    public function __construct()
    {
        parent::__construct();
        if(auth()) {
            if($this->uri->segment(2) !== 'logout'){
                redirect('dashboard');
            }
        }
    }


    public function login()
    {
        if($this->input->is_ajax_request()){
            $config = array(
                [
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|valid_email'
                ],
                [
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required'
                ]
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() === FALSE){
                return $this->JSONResponse([
                    'error' => true,
                    'form' => true,
                    'messages' => $this->form_validation->error_array()
                ]);
            }else{
                try{
                    $user = UserModel::where('email', $this->input->post('email'))->first();
                    if($user){
                        if(password_verify($this->input->post('password'), $user->password)){
                            $this->session->set_userdata('user_id', $user->id);
                            return $this->JSONResponse([
                                'error' => false,
                                'form'  => false,
                                'redirect_url' => base_url('/dashboard'),
                            ]);
                        }else{
                            return $this->JSONResponse([
                                'error' => true,
                                'form' => true,
                                'messages' => ['password' => 'Credentials are invalid.']
                            ]);
                        }
                    }else{
                        return $this->JSONResponse([
                            'error' => true,
                            'form' => true,
                            'messages' => ['email' => 'Email is not found in our system.']
                        ]);
                    }
                }catch (\Exception $e){
                    return $this->JSONResponse([
                       'error' => true,
                       'form' => false,
                       'messages' => 'Something went wrong please try again.'
                    ]);
                }
            }
        }else{
            $this->view('auth.login');
        }
    }

    public function signup()
    {
        if($this->input->is_ajax_request()) {
            $config = array(
                [
                    'field' => 'name',
                    'label' => 'Full name',
                    'rules' => 'required'
                ],
                [
                    'field' => 'email',
                    'label' => 'Email',
                    'rules' => 'required|valid_email|is_unique[users.email]'
                ],
                [
                    'field' => 'password',
                    'label' => 'Password',
                    'rules' => 'required'
                ]
            );

            $this->form_validation->set_rules($config);
            if($this->form_validation->run() === FALSE){
                return $this->JSONResponse([
                    'error' => true,
                    'form' => true,
                    'messages' => $this->form_validation->error_array()
                ]);
            }else{
                try {
                     $user = UserModel::create([
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'role' => 'candidate',
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                    ]);

                     UsersInfoModel::create([
                        'user_id' => $user->id
                     ]);

                        return $this->JSONResponse([
                            'error' => false,
                            'form' => false,
                            'redirect_url' => base_url('auth/login'),
                            'messages' => 'Candidate registered successfully!'
                        ]);

                }catch (\Exception $e) {
                    return $this->JSONResponse([
                       'error' => true,
                       'form' => false,
                       'messages' => 'Something went wrong please try again'
                    ]);
                }
            }
        } else {
            $this->view('auth.signup');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user_id');
        redirect('auth/login');
    }


}
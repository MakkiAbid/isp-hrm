<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campus extends My_Controller
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
        $campuses = CampusModel::all();
        echo $this->view('pages.campus.all', compact('campuses'));
    }

    public function add()
    {
        if($this->input->is_ajax_request()) {
            $config = array(
                [
                    'field' => 'name',
                    'label' => 'Campus Name',
                    'rules' => 'required|is_unique[campus.name]'
                ],
                [
                    'field' => 'city',
                    'label' => 'City',
                    'rules' => 'required'
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
                try {
                    CampusModel::create([
                        'name' => $this->input->post('name'),
                        'city' => $this->input->post('city')
                    ]);

                    return $this->JSONResponse([
                        'error' => false,
                        'form' => false,
                        'redirect_url' => base_url('campus'),
                        'messages' => 'Campus added successfully!'
                    ]);

                }catch (\Exception $e) {
                    return $this->JSONResponse([
                        'error' => true,
                        'form' => false,
                        'messages' => 'Something went wrong please try again'
                    ]);
                }
            }
        }else {
            echo $this->view('pages.campus.add');
        }
    }

    public function edit($id)
    {
        if($this->input->is_ajax_request()) {
            $config = array(
                [
                    'field' => 'name',
                    'label' => 'Campus Name',
                    'rules' => 'required|is_unique[campus.name]'
                ],
                [
                    'field' => 'city',
                    'label' => 'City',
                    'rules' => 'required'
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
                try {
                    $campus = CampusModel::where('id', $id)->first();
                    if($campus) {
                        $campus->update([
                            'name' => $this->input->post('name'),
                            'city' => $this->input->post('city')
                        ]);

                        return $this->JSONResponse([
                            'error' => false,
                            'form' => false,
                            'redirect_url' => base_url('campus'),
                            'messages' => 'Campus updated successfully'
                        ]);
                    }
                }catch (\Exception $e){
                    return $this->JSONResponse([
                        'error' => true,
                        'form' => false,
                        'messages' => 'Something went wrong please try again'
                    ]);
                }
            }
        }else{
            $campus = CampusModel::where('id', $id)->first();
            $this->view('pages.campus.edit', compact('campus'));
        }
    }

    public function delete($id)
    {
        $campus = CampusModel::where('id', $id)->first();
        if($campus){
            $campus->delete();
            return $this->JSONResponse([
                'error' => false,
                'form' => false,
                'redirect_url' => base_url('campus'),
                'messages' => 'Campus deleted successfully'
            ]);
        }else{
            return $this->JSONResponse([
                'error' => true,
                'form' => false,
                'redirect_url' => base_url('campus'),
                'messages' => 'Something went wrong please try again.'
            ]);
        }

    }

}
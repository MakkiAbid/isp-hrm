<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Departments extends My_Controller
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
        $departments = DepartmentsModel::all();
        $this->view('pages.departments.all', compact('departments'));
    }

    public function add()
    {
        if($this->input->is_ajax_request()) {
            $config = array(
                [
                    'field' => 'name',
                    'label' => 'Department',
                    'rules' => 'required|is_unique[departments.name]'
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
                    DepartmentsModel::create([
                        'name' => $this->input->post('name')
                    ]);

                    return $this->JSONResponse([
                        'error' => false,
                        'form' => false,
                        'redirect_url' => base_url('departments'),
                        'messages' => 'Department added successfully!'
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
            echo $this->view('pages.departments.add');
        }
    }

    public function edit($id)
    {
        if($this->input->is_ajax_request()) {
            $config = array(
                [
                    'field' => 'name',
                    'label' => 'Department Name',
                    'rules' => 'required|is_unique[departments.name]'
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
                    $departments = DepartmentsModel::where('id', $id)->first();
                    if($departments) {
                        $departments->update([
                            'name' => $this->input->post('name')
                        ]);

                        return $this->JSONResponse([
                            'error' => false,
                            'form' => false,
                            'redirect_url' => base_url('departments'),
                            'messages' => 'Department updated successfully'
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
            $departments = DepartmentsModel::where('id', $id)->first();
            $this->view('pages.departments.edit', compact('departments'));
        }

    }

    public function delete($id)
    {
        $departments = DepartmentsModel::where('id', $id)->first();
        if($departments){
            $departments->delete();
            return $this->JSONResponse([
                'error' => false,
                'form' => false,
                'redirect_url' => base_url('departments'),
                'messages' => 'Departments deleted successfully'
            ]);
        }else{
            return $this->JSONResponse([
                'error' => true,
                'form' => false,
                'redirect_url' => base_url('departments'),
                'messages' => 'Something went wrong please try again.'
            ]);
        }

    }

}
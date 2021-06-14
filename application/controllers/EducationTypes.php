<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class EducationTypes extends My_Controller
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
        $education_types = EducationTypesModel::get();
        $this->view('pages.education.all', compact('education_types'));
    }

    public function add()
    {
        if($this->input->is_ajax_request()) {
            $config = array(
                [
                    'field' => 'education',
                    'label' => 'Education',
                    'rules' => 'required|is_unique[education_types.education]'
                ],
                [
                    'field' => 'marks_type',
                    'label' => 'Marks Type',
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
                    EducationTypesModel::create([
                       'education' => $this->input->post('education'),
                       'marks_type' => strtoupper($this->input->post('marks_type'))
                    ]);

                    return $this->JSONResponse([
                       'error' => false,
                       'form' => false,
                       'redirect_url' => base_url('education'),
                       'messages' => 'Education added successfully'
                    ]);
                }catch (\Exception $e){
                    return $this->JSONResponse([
                        'error' => true,
                        'form' => false,
                        'messages' => 'Something went wrong please try again'
                    ]);
                }
            }
        }else{
            $this->view('pages.education.add');
        }
    }

    public function edit($id)
    {
        if($this->input->is_ajax_request()) {
            $config = array(
                [
                    'field' => 'education',
                    'label' => 'Education',
                    'rules' => 'required'
                ],
                [
                    'field' => 'marks_type',
                    'label' => 'Marks Type',
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
                    $education = EducationTypesModel::where('id', $id)->first();
                    if($education) {
                        $education->update([
                            'education' => $this->input->post('education'),
                            'marks_type' => $this->input->post('marks_type')
                        ]);

                        return $this->JSONResponse([
                            'error' => false,
                            'form' => false,
                            'redirect_url' => base_url('education'),
                            'messages' => 'Education updated successfully'
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
            $education_type = EducationTypesModel::where('id', $id)->first();
            $this->view('pages.education.edit', compact('education_type'));
        }
    }

    public function delete($id)
    {
        $education = EducationTypesModel::where('id', $id)->first();
        if($education){
            $education->delete();
            return $this->JSONResponse([
                'error' => false,
                'form' => false,
                'redirect_url' => base_url('education'),
                'messages' => 'Education deleted successfully'
            ]);
        }else{
            return $this->JSONResponse([
                'error' => true,
                'form' => false,
                'redirect_url' => base_url('education'),
                'messages' => 'Something went wrong please try again.'
            ]);
        }

    }

    public function get_education_types()
    {
        $education_types = EducationTypesModel::get();
        return $this->JSONResponse($education_types);
    }

}
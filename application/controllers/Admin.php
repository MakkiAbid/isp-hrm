<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends My_Controller
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
        $searchKeyWord = $this->input->get('search-term') ?? '';
        $config = $this->config->item('pagination');
        $config["base_url"] = base_url() . "admin";
        $config["total_rows"] = UserModel::getCountAdmin($searchKeyWord);
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $data["admins"] = UserModel::getAdminWithPaginate($config["per_page"], $page, $searchKeyWord);
        $data['links'] = $this->pagination->create_links();
        echo $this->view('pages.admin.all', $data);
    }

    public function ajax_search()
    {
        $searchTerm = $this->input->post('search-term');
        $data = UserModel::where('name','LIKE',"%{$searchTerm}%")
            ->orWhere('email', 'LIKE', "%{$searchTerm}%")
            ->get();

        dd($data);

    }

    public function add()
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
            if($this->form_validation->run() === FALSE) {
                return $this->JSONResponse([
                    'error' => true,
                    'form' => true,
                    'messages' => $this->form_validation->error_array()
                ]);
            }else{
                try {
                    UserModel::create([
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'role' => 'admin',
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                    ]);

                    return $this->JSONResponse([
                        'error' => false,
                        'form' => false,
                        'redirect_url' => base_url('admin'),
                        'messages' => 'Admin added successfully!'
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
            echo $this->view('pages.admin.add');
        }
    }

    public function edit($id)
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
                    'rules' => 'required|valid_email'
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
                    $admin = UserModel::where('id', $id)->first();
                    if($admin) {
                        $admin->update([
                            'name' => $this->input->post('name'),
                            'email' => $this->input->post('email'),
                            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                        ]);

                        return $this->JSONResponse([
                            'error' => false,
                            'form' => false,
                            'redirect_url' => base_url('admin'),
                            'messages' => 'Admin updated successfully'
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
            $admin = UserModel::where('id', $id)->first();
            $this->view('pages.admin.edit', compact('admin'));
        }
    }

    public function delete($id)
    {
        $admin = UserModel::where('id', $id)->first();
        if($admin){
            $admin->delete();
            return $this->JSONResponse([
                'error' => false,
                'form' => false,
                'redirect_url' => base_url('admin'),
                'messages' => 'Admin deleted successfully'
            ]);
        }else{
            return $this->JSONResponse([
                'error' => true,
                'form' => false,
                'redirect_url' => base_url('admin'),
                'messages' => 'Something went wrong please try again.'
            ]);
        }

    }

}
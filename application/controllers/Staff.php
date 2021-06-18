<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends My_Controller
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
        $searchKeyWord = $this->input->get('search-term') ?? '';
        $config = $this->config->item('pagination');
        $config["base_url"] = base_url() . "staff";
        $config["total_rows"] = UserModel::getCountUsers($searchKeyWord, 'staff');
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $data["staffs"] = UserModel::getUsersWithPaginate($config["per_page"], $page, $searchKeyWord, 'staff');
        $data['links'] = $this->pagination->create_links();
        $this->view('pages.staff.all', $data);
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
                    'rules' => 'required|regex_match[/^([0-9]{5})[\-]([0-9]{7})[\-]([0-9]{1})+/]|is_unique[personal_info.cnic]'
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
                    $user = UserModel::create([
                        'name' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'role' => 'staff',
                        'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
                    ]);

                    UsersInfoModel::create([
                        'user_id' => $user->id,
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
                        'redirect_url' => base_url('staff'),
                        'messages' => 'Staff added successfully!'
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
            echo $this->view('pages.staff.add');
        }
    }

}
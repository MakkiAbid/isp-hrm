<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersDetails extends My_Controller
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
        $name = $this->input->get('search-by-name') ?? '';
        $email = $this->input->get('search-by-email') ?? '';
        $institute = $this->input->get('search-by-institute') ?? '';
        $company = $this->input->get('search-by-company') ?? '';
        $designation = $this->input->get('search-by-designation') ?? '';
        $experience = $this->input->get('search-by-totalexp') ?? '';

        // Overall Search
        if(isset ($searchKeyWord) && !empty($searchKeyWord)) {
            $data = UsersDetailsModel::where('name','LIKE',"{$searchKeyWord}%")
                ->orWhere('email', 'LIKE', "{$searchKeyWord}%")
                ->orWhere('institute', 'LIKE', "{$searchKeyWord}%")
                ->orWhere('company', 'LIKE', "{$searchKeyWord}%")
                ->orWhere('designation', 'LIKE', "{$searchKeyWord}%")
                ->orWhere('total_exp', 'LIKE', "{$searchKeyWord}%")
                ->orderBy('total_exp')
                ->distinct()
                ->get();
        }else {
            $data = [];
        }

        // Search by Name
        if(isset($name) && !empty($name)){
            $data = UsersDetailsModel::where('name','LIKE',"$name%")
                ->distinct()
                ->get();;
        }else {
            $data = [];
        }

        // Search by Email
        if(isset($email) && !empty($email)){
            $data = UsersDetailsModel::where('email','LIKE',"$email%")
                ->distinct()
                ->get();
        }else {
            $data = [];
        }

        // Search by Institute
        if(isset($institute) && !empty($institute)){
            $data = UsersDetailsModel::where('institute','LIKE',"$institute%")
                ->distinct()
                ->get();
        }else {
            $data = [];
        }

        // Search by Company
        if(isset($company) && !empty($company)){
            $data = UsersDetailsModel::where('company','LIKE',"$company%")
                ->distinct()
                ->get();
        }else {
            $data = [];
        }

        // Search by Designation
        if(isset($designation) && !empty($designation)){
            $data = UsersDetailsModel::where('designation','LIKE',"$designation%")
                ->distinct()
                ->get();
        }else {
            $data = [];
        }

        // Search by Experience
        if(isset($experience) && !empty($experience)){
            $data = UsersDetailsModel::where('total_exp','LIKE',"$experience%")
                ->distinct()
                ->get();
        }else {
            $data = [];
        }


        echo $this->view('pages.candidates.users_details', compact('data'));
    }
}
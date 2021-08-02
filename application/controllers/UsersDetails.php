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
        if(empty($searchKeyWord)){
            $data = [];
        }else {
            $data = UsersDetailsModel::where('name','LIKE',"{$searchKeyWord}%")
                ->orWhere('email', 'LIKE', "{$searchKeyWord}%")
                ->orWhere('institute', 'LIKE', "{$searchKeyWord}%")
                ->orWhere('company', 'LIKE', "{$searchKeyWord}%")
                ->orWhere('designation', 'LIKE', "{$searchKeyWord}%")
                ->orWhere('total_exp', 'LIKE', "{$searchKeyWord}%")
                ->distinct()
                ->get();
        }
        echo $this->view('pages.candidates.users_details', compact('data'));
    }
}
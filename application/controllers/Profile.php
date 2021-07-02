<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Profile extends My_Controller
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
        $user_info = UserModel::where('id', auth()->id)->first();
        echo $this->view('pages.profile.edit', compact('user_info'));
    }


}
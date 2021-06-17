<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Candidates extends My_Controller
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
        $config = $this->config->item('pagination');
        $config["base_url"] = base_url() . "candidates";
        $config["total_rows"] = UserModel::getCountCandidate();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $data["candidates"] = UserModel::getCandidateWithPaginate($config["per_page"], $page);
        $data['links'] = $this->pagination->create_links();
        $this->view('pages.candidates.all', $data);
    }

}
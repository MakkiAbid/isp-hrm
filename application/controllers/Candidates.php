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
        $searchKeyWord = $this->input->get('search-term') ?? '';
        $config = $this->config->item('pagination');
        $config["base_url"] = base_url() . "candidate";
        $config["total_rows"] = UserModel::getCountUsers($searchKeyWord, 'candidate');
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($config["uri_segment"])) ? $this->uri->segment($config["uri_segment"]) : 0;
        $data["candidates"] = UserModel::getUsersWithPaginate($config["per_page"], $page, $searchKeyWord, 'candidate');
        $data['links'] = $this->pagination->create_links();
        $this->view('pages.candidates.all', $data);
    }

    public function fetch_details($id)
    {

        $data = array();
        $details = UserModel::where('id', $id)
            ->has('user_education.education_type')
            ->has('user_experience')
            ->first();

        $data['educations'] = array();
        $data['experiences'] = array();

        if($details){
            foreach ($details->user_education as $key => $value){
                array_push($data['educations'], [
                    'education' => $value->education_type->education,
                    'marks_type' => $value->education_type->marks_type,
                    'obtained' => $value->obtained,
                    'total' => $value->total,
                    'year' => $value->year,
                    'institute' => $value->institute,
                ]);
            }

            foreach($details->user_experience as $key => $value){
                array_push($data['experiences'], [
                   'company' => $value->company,
                    'designation' => $value->designation,
                    'start_date' => $value->start_date,
                    'end_date' => $value->end_date
                ]);
            }

            return $this->JSONResponse($data);
        }else {
            return $this->JSONResponse('Something went wrong');
        }
    }

    public function delete($id)
    {
        $candidate = UserModel::where('id', $id)->first();
        if($candidate){
            $candidate->delete();
            return $this->JSONResponse([
                'error' => false,
                'form' => false,
                'redirect_url' => base_url('candidates'),
                'messages' => 'Candidate deleted successfully'
            ]);
        }else{
            return $this->JSONResponse([
                'error' => true,
                'form' => false,
                'redirect_url' => base_url('candidates'),
                'messages' => 'Something went wrong please try again.'
            ]);
        }

    }

}
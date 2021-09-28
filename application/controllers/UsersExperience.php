<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersExperience extends My_Controller
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
        if($this->input->is_ajax_request()) {
            try{
                foreach ($this->input->post('experience') as $key => $value){
                    UsersExpModel::create([
                        'user_id' => auth()->id,
                        'company' => $this->input->post('experience['.$key.'][company]'),
                        'designation' => $this->input->post('experience['.$key.'][designation]'),
                        'start_date' => $this->input->post('experience['.$key.'][start_date]'),
                        'end_date' => $this->input->post('experience['.$key.'][end_date]')
                    ]);
                }

                return $this->JSONResponse([
                    'error' => false,
                    'form' => false,
                    'messages' => 'User experience updated successfully!'
                ]);
            }catch(\Exception $e){
                return $this->JSONResponse([
                    'error' => true,
                    'form' => false,
                    'messages' => 'Something went wrong please try again!'
                ]);
            }
        }
        
    }

    public function delete($id)
    {
        $education = UsersExpModel::where('id', $id)->first();
        if($education){
            $education->delete();
            return $this->JSONResponse([
                'error' => false,
                'form' => false,
                'redirect_url' => base_url('profile'),
                'messages' => 'Experience removed successfully'
            ]);
        }else{
            return $this->JSONResponse([
                'error' => true,
                'form' => false,
                'redirect_url' => base_url('profile'),
                'messages' => 'Something went wrong please try again.'
            ]);
        }

    }

}
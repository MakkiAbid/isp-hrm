<?php


/**
*
* @returns CI instance
*
*/
if(!function_exists('getInstance')){
	function getInstance(){
		return $CI =& get_instance();
	}
}

/**
 * auth function
 * @returns UserModel Eloquent Object | NULL
 */
if(!function_exists('auth')){
    function auth(){
        $user_id = getInstance()->session->userdata('user_id');
        $user = UserModel::where('id', $user_id)->first();
        return $user ? $user : null;
    }
}


/**
 * a function which read the entrypoints.json
 * and generate the scripts tags
 */
if(!function_exists('encore_entry_script_tags')){
    function encore_entry_script_tags($name){
        $file_path = FCPATH.'assets/entrypoints.json';
        $file_content = json_decode(file_get_contents($file_path), true);
        $tags = '';
        foreach ($file_content['entrypoints'][$name]['js'] as $file){
            $tags .= '<script src="'.base_url($file).'"></script>';
        }
        return $tags;
    }
}


/**
 * a function which read the entrypoints.json
 * and generate the link tags
 */
if(!function_exists('encore_entry_link_tags')){
    function encore_entry_link_tags($name){
        $file_path = FCPATH.'assets/entrypoints.json';
        $file_content = json_decode(file_get_contents($file_path), true);
        $tags = '';
        foreach ($file_content['entrypoints'][$name]['css'] as $file){
            $tags .= '<link rel="stylesheet" href="'.base_url($file).'">';
        }
        return $tags;
    }
}

function getCountAdmins() {
    return UserModel::where('role', 'admin')->count();
}

function getCountStaff() {
    return UserModel::where('role', 'staff')->count();
}

function getCountCandidates() {
    return UserModel::where('role', 'candidate')->count();
}

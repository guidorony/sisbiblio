<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model {
    
    
    public function login($usua_login, $usua_password){
    $usua_password = sha1($usua_password);
        $this->db->where('usua_login',$usua_login);
        $this->db->where('usua_password',$usua_password);
        $query = $this->db->get('usuario');
        if($query->num_rows()==1){
            foreach ($query->result() as $row){
                $data = array(
                            'usua_login'=> $row->usua_login,
                            'logged_in'=>TRUE
                        );
            }
            $this->session->set_userdata($data);
            return TRUE;
        }
        else{
            return FALSE;
      }    
    }
    
    public function isLoggedIn(){
            header("cache-Control: no-store, no-cache, must-revalidate");
            header("cache-Control: post-check=0, pre-check=0", false);
            header("Pragma: no-cache");
            header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
            $is_logged_in = $this->session->userdata('logged_in');

            if(!isset($is_logged_in) || $is_logged_in!==TRUE)
            {
                redirect('/');
                exit;
            }
    }
    
}
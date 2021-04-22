<?php

/**
 * 
 */
class Login_model extends CI_Model
{
	//fungsi cek login 
	function is_logged_in()
	{
		return $this->session->userdata('email');
	}

	function role()
	{
		return $this->session->userdata('role_id');
	}
			
}
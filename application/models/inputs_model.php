<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inputs_model extends CI_Model {
	function __construct()
	{
		parent::__construct();
		// if($this->ion_auth->is_admin())
		// {
		// 	$this->user = 4;
		// }
		// else
		// 	$this->user = NULL;
		// $this->userdata = $this->ion_auth->user($this->user)->row();
	}
	function get_company_input()
	{
		$company_input_query = $this->db->get('company');
		
		if (!$company_input_query)
		{
			return false;
		}
		return $company_input_query->result();
		
	}	

}

/* End of file inputs_model.php */
/* Location: ./application/models/inputs_model.php */
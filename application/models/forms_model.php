<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Forms_model extends CI_Model
{
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
	function save_company_form($form_data)
	{
		$this->db->insert('company', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
	}
	
}
/* End of file forms_model.php */
/* Location: ./application/models/jobs_model.php */

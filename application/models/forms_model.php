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
	function save_actuals_form($form_data)
	{
		$this->db->insert('actuals', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
	}
	function save_bankers_form($form_data)
	{
		$this->db->insert('bankers', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
	}
	function save_ellive_form($form_data)
	{
		$this->db->insert('ellive', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
	}
	function save_in_market_loi_form($form_data)
	{
		$this->db->insert('in_market_loi', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
	}
	function save_nda_per_month_form($form_data)
	{
		$this->db->insert('nda_per_month', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
	}
	function save_referral_company_form($form_data)
	{
		$this->db->insert('referral_company', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
	}
	function save_referral_individual_form($form_data)
	{
		$this->db->insert('referral_individual', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
	}
	function save_ssvsop_form($form_data)
	{
		$this->db->insert('ssvsop', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
	}
	function save_utilization_targets_form($form_data)
	{
		$this->db->insert('utilization_targets', $form_data);
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		return FALSE;
	}
}
/* End of file forms_model.php */
/* Location: ./application/models/forms_model.php */
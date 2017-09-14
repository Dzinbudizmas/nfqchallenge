<?php
class Order_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_orders()
	{
		$query = $this->db->get('orders');
		return $query->result_array();
	}
}

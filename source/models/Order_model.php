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

	public function set_order()
	{
		$this->load->helper('url');

		$data = array(
			'name' => $this->input->post('name'),
			'address' => $this->input->post('address'),
			'phone' => $this->input->post('phone'),
			'text' => $this->input->post('text')
		);

		return $this->db->insert('orders', $data);
	}
}

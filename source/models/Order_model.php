<?php
class Order_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_orders($limit, $start, $search_term = NULL, $order_field = NULL, $order_direction = NULL)
	{
		if ($search_term == 'NIL')
		{
			$search_term = '';
		}
		
		$this->db->like('name', $search_term);
		if ($order_field != 'NIL' and $order_direction != 'NIL')
		{
			$this->db->order_by($order_field, $order_direction);
		}
		$query = $this->db->get('orders', $limit, $start);
		return $query->result_array();
	}
	
	public function get_order_count($search_term = NULL)
	{
		if ($search_term == 'NIL')
		{
			$search_term = '';
		}

		$this->db->like('name', $search_term);
		$this->db->from('orders');
		return $this->db->count_all_results();
	}

	public function insert_order()
	{
		$this->load->helper('url');

		$data = array(
			'name' => $this->input->post('name'), 
			'address' => $this->input->post('address'), 
			'phone' => $this->input->post('phone'), 
			'amount' => $this->input->post('amount'), 
			'notes' => $this->input->post('notes')	
		);
		
		return $this->db->insert('orders', $data);
	}
}
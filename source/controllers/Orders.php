<?php
class Orders extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
		$this->load->helper('url_helper');
	}

	public function index()
	{
		$data['orders'] = $this->order_model->get_orders();
        $data['title'] = 'Užsakymų sąrašas';

        $this->load->view('templates/header', $data);
        $this->load->view('orders/index', $data);
        $this->load->view('templates/footer');
	}

}

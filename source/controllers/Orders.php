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

	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Užsakyti paslaugą';

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header', $data);
			$this->load->view('orders/create');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->order_model->set_order();
			$this->load->view('orders/success');
		}
	}
}

<?php
class Orders extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('order_model');
		$this->load->helper('url_helper');
	}
	
	public function index()
	{
		$this->load->library('pagination');
		$this->load->library('session');
		
		// get search string
		$search = ($this->input->get('query')) ? $this->input->get('query') : NULL;
		
		$config['base_url'] = site_url('orders/index');
		$config['total_rows'] = $this->order_model->get_order_count($search);
		$config['per_page'] = 10;
		$config["uri_segment"] = 3;
		$choice = $config["total_rows"] / $config["per_page"];
		$config["num_links"] = floor($choice);
		
		$config['enable_query_strings'] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['reuse_query_string'] = TRUE;
		
		// bootstrap pagination
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        //$config['first_link'] = false;
        //$config['last_link'] = false;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '«';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '»';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		
		$data['page'] = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;
		$data['searchFor'] = $search;
		$data['orderField'] = ($this->input->get('orderField')) ? $this->input->get('orderField') : 'id';
		$data['orderDirection'] = ($this->input->get('orderDirection')) ? $this->input->get('orderDirection') : 'ASC';
		
		$data['pagination_links'] = $this->pagination->create_links();
		$data['orders'] = $this->order_model->get_orders($config["per_page"], $data['page'], $search, $data['orderField'], $data['orderDirection']);
		
		$this->load->view('templates/header', $data);
		$this->load->view('orders/index', $data);
		$this->load->view('templates/footer');
	}

	public function create()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');		
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]|max_length[120]');
		$this->form_validation->set_rules('address', 'Address', 'required|min_length[10]|max_length[250]');
		$this->form_validation->set_rules('phone', 'Phone', 'required|min_length[4]|max_length[15]|alpha_numeric_spaces');
		$this->form_validation->set_rules('amount', 'Amount', 'required|integer|less_than_equal_to[100]');
		
		if ($this->form_validation->run() === FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('orders/create');
			$this->load->view('templates/footer');
		}
		else
		{
			$this->order_model->insert_order();
			$this->load->view('templates/header');
			$this->load->view('orders/success');
			$this->load->view('templates/footer');
		}
	}
}
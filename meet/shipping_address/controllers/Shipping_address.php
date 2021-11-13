<?php
defined('BASEPATH') or exit('No direct script access allowed');

	class Shipping_address extends AdminController
	{
	    public function __construct()
	    {
	        parent::__construct();
	        $CI = &get_instance();
	        $this->load->model('shipping_address_model');
	    }

	    public function index()
	    {
	    	$this->load->view('insert_data');
	    }

	    public function table()
	    {
	    	$this->app->get_table_data(module_views_path('shipping_address','tables/shipping_table'));
	    }

	    public function insert_data()
	    {
	    	$table="customer_shipping_address";
	    	$data=array(
	    		"address" => $this->input->post('address'),
	    		"city" => $this->input->post('city'),
	    		"state" => $this->input->post('state'),
	    		"zip" => $this->input->post('zip')
	    	);

	    	$val=$this->shipping_address_model->insert_data($table,$data);

	    	if ($val==true) {
				set_alert('success',"Data Inserted Successfully");
				redirect('Shipping_address/index','refresh');
			}
	    }

	    public function delete_data($id)
	    {
	    	$where=["id"=>$id];
	    	$table="customer_shipping_address";
	    	$val=$this->shipping_address_model->delete_data($table,$where);

	    	if ($val==true) {
	    		set_alert('warning',"Data Deleted Successfully");
				redirect('shipping_address/index','refresh');	
	    	}
	    }

	    public function update_address()
	    {
	    	$table="customer_shipping_address";
	    	$data=array(
	    		"address" => $this->input->post('address'),
	    		"city" => $this->input->post('city'),
	    		"state" => $this->input->post('state'),
	    		"zip" => $this->input->post('zip')
	    	); 
	    	$where['id']=$this->input->post('id');
	    	$val=$this->shipping_address_model->update_data($table,$data,$where);
	    	if ($val==true) {
				set_alert('success',"Data Updated Successfully");
				redirect('shipping_address/index','refresh');
			}
	    }
	    
	}





	/* End of file Shipping_address.php */
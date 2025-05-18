<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
	/**
	 * Constructor
	 */
	public function __construct()
	{
		parent::__construct();

		$this->load->model('product_model');
	}

	/**
	 * @return void
	 */
	public function index()
	{
		$this->template->load('product/index', []);
	}

	/**
	 * @return void
	 */
	public function store(): void
	{
		$productCreated = $this->product_model->store([
			'name' => $this->input->post('name', true),
			'price' => $this->input->post('price', true),
			'stock' => $this->input->post('stock', true),
		]);

		if(! $productCreated) {
			$this->session->set_flashdata('error', 'Error creating product');
		
			redirect(base_url('produtos'));
		}

		$this->session->set_flashdata('success', 'Product created successfully');
		redirect(base_url('produtos'));
	}

	/**
	 * @param int $id
	 * @return void
	 */
	public function update(int $id): void
	{
		$product = $this->product_model->get($id);

		if (empty($product)) {
			show_404();
		}

		$this->product_model->update($id, [
			'name' => $this->input->post('name', true),
			'price' => $this->input->post('price', true),
		]);


		if(! $productCreated) {
			$this->session->set_flashdata('error', 'Error creating product');
		
			redirect('product');
		}

		redirect(base_url('produtos'));
	}

	/**
	 * @param int $id
	 * @return void
	 */
	public function destroy(int $id): void
	{
		$product = $this->product_model->get($id);

		if (empty($product)) {
			show_404();
		}

		$productDeleted = $this->product_model->delete($id);


		$productDeleted
			? $this->session->set_flashdata('success', $message)
			: $this->session->set_flashdata('success', $message);

		redirect(base_url('produtos'));
	}
}

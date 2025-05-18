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
		$this->template->load('product/index', [
			'title' => 'Produtos',
			'action' => 'Gerenciar produtos',
			'products' => $this->product_model->findAll(),
		]);
	}

	/**
	 * @param int $id
	 * @return CI_Output
	 */
	public function show(int $id): CI_Output
	{
		$product = $this->product_model->find($id);

		if (! $product) {
			return $this->output
				->set_status_header(404)
				->set_content_type('application/json')
				->set_output(json_encode([
					'success' => false,
					'message' => 'Product not found',
				]));
		}

		return $this->output
			->set_status_header(200)
			->set_content_type('application/json')
			->set_output(json_encode([
				'success' => true,
				'data' => $product,
			]));
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

		$productCreated
			? $this->session->set_flashdata('success', 'Product created successfully')
			: $this->session->set_flashdata('error', 'Error creating product');

		redirect(base_url('produtos'));
	}

	/**
	 * @param int $id
	 * @return void
	 */
	public function update(int $id): void
	{
		$product = $this->product_model->find($id);

		if (! $product) {
			$this->session->set_flashdata('error', 'Product not found');
		
			redirect(base_url('produtos'));
		}

		$productUpdated = $this->product_model->update($id, [
			'name' => $this->input->post('name', true),
			'price' => $this->input->post('price', true),
			'stock' => $this->input->post('stock', true),
		]);

		$productUpdated
			? $this->session->set_flashdata('success', 'Product updated successfully')
			: $this->session->set_flashdata('error', 'Error updating product');	

		redirect(base_url('produtos'));
	}

	/**
	 * @param int $id
	 * @return CI_Output
	 */
	public function delete(int $id): CI_Output
	{
		$product = $this->product_model->find($id);

		if (empty($product)) {
			return $this->output
				->set_status_header(404)
				->set_content_type('application/json')
				->output(json_encode([
					'success' => false,
					'message' => 'Product not found',
				]));
		}

		$productDeleted = $this->product_model->delete($id);
		
		$message = $productDeleted
			? 'Product deleted successfully'
			: 'Error deleting product';
		
		$productDeleted
			? $this->session->set_flashdata('success', $message)
			: $this->session->set_flashdata('error', $message);

		return $this->output
			->set_status_header($productDeleted ? 200 : 500)
			->set_content_type('application/json')
			->set_output(json_encode([
				'success' => $productDeleted,
				'message' => $message,
			]));
	}
}

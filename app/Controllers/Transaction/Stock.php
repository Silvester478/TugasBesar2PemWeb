<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Stock as ModelsStock;
use App\Models\Stockdetails;

class Stock extends BaseController
{
	protected $model;

	function __construct()
	{
		$this->model 			= new ModelsStock();
		$this->stock_details 	= new Stockdetails();
		$this->product 			= new Product();
	}

	public function index()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Barang Masuk']),
			'page_title' => view('partials/page-title', ['title' => 'Management Barang Masuk', 'li_1' => 'Barang Masuk', 'li_2' => 'List Barang Masuk']),
			'records' => $this->model->where('type', 'IN')->orderBy('created_at', 'DESC')->findAll()
		];

		return view('transaction/stock_in/index', $data);
	}

	public function add()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Stocks']),
			'page_title' => view('partials/page-title', ['title' => 'Management Stocks', 'li_1' => 'Stocks', 'li_2' => 'New Record']),
			'users' 	=> $this->model->findAll(),
			'record'	=> $this->product->findAll()
		];
		// dd($data);
		return view('transaction/stock_in/add', $data);
	}

	public function store()
	{
		// SAVE PARENT 
		$parent = [
			"transaction_code" 	=> $this->request->getVar('transaction_code'),
			"date"				=> $this->request->getVar('date'),
			"type"				=> 'IN',
			"note"				=> $this->request->getVar('note'),
		];
		$this->model->save($parent);
		$parent_id = $this->model->getInsertID();
		// dd($parent_id);
		// SAVE CHILD 
		foreach ($this->request->getVar('stock_details') as $key => $value) {
			$child = [
				"stock_id" 		=> $parent_id,
				"product_id"	=> $value['product_id'],
				"qty"			=> $value['qty'],
			];
			$this->stock_details->save($child);
		}
		return redirect()->route('stock-list');
	}

	public function view($id)
	{
		$record 		= $this->model->find($id);
		$stock_detail	= $this->stock_details
			->join('products', 'products.id = stock_details.product_id', 'left')
			->where('stock_id', $id)->findAll();

		$data = [
			'title_meta' 	=> view('partials/title-meta', ['title' => 'Stocks']),
			'page_title' 	=> view('partials/page-title', ['title' => 'Management Stocks', 'li_1' => 'Stocks', 'li_2' => 'View Record']),
			'record' 		=> $record,
			'stock_detail'	=> $stock_detail
		];
		// dd($data);
		return view('transaction/stock_in/view', $data);
	}
}

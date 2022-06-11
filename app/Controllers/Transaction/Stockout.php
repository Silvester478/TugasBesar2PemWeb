<?php

namespace App\Controllers\Transaction;

use App\Controllers\BaseController;
use App\Models\Product;
use App\Models\Stock as ModelsStock;
use App\Models\Stockdetails;

class Stockout extends BaseController
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
			'title_meta' => view('partials/title-meta', ['title' => 'Barang Keluar']),
			'page_title' => view('partials/page-title', ['title' => 'Management Barang Keluar', 'li_1' => 'Barang Keluar', 'li_2' => 'List Barang Keluar']),
			'records' => $this->model->where('type', 'OUT')->orderBy('created_at', 'DESC')->findAll()
		];

		return view('transaction/stock_out/index', $data);
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
		return view('transaction/stock_out/add', $data);
	}

	public function store()
	{
		// SAVE PARENT 
		$parent = [
			"transaction_code" 	=> $this->request->getVar('transaction_code'),
			"date"				=> $this->request->getVar('date'),
			"type"				=> 'OUT',
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
		return redirect()->route('stock-out-list');
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
		return view('transaction/stock_out/view', $data);
	}

	public function getStock($id)
	{
		// dd($id);
		if ($this->request->isAJAX()) {
			$db = db_connect();
			$record = $db->query("SELECT
					product_id,
					SUM(qty) AS stock_in,
					IFNULL((select SUM(qty) from stock_details INNER JOIN stocks S ON S.id = stock_details.stock_id where product_id = SD.product_id and S.type = 'OUT'), 0) AS stock_out,
					(SUM(qty) - IFNULL((select SUM(qty) from stock_details INNER JOIN stocks S ON S.id = stock_details.stock_id where product_id = SD.product_id and S.type = 'OUT'), 0)) AS all_stock
				FROM
					stocks S
					INNER JOIN stock_details SD ON S.id = stock_id
					where type = 'IN' AND product_id = '$id'
				GROUP BY
					product_id");
			$result = $record->getResult()[0];
			// dd($result);
			return json_encode($result);
		}
	}
}

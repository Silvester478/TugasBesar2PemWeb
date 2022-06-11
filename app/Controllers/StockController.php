<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class StockController extends BaseController
{
	public function index()
	{
		$db = db_connect();
		$record = $db->query("SELECT
							products.`code` AS product_code,
							products.`name` AS product_name,
							categories.category_code,
							unit_code,
							SUM( qty ) AS stock_in,
							IFNULL((
								SELECT
									SUM( qty ) 
								FROM
									stock_details
									INNER JOIN stocks S ON S.id = stock_details.stock_id 
								WHERE
									product_id = SD.product_id 
									AND S.type = 'OUT' 
									),
								0 
							) AS stock_out,
							(
								SUM( qty ) - IFNULL((
									SELECT
										SUM( qty ) 
									FROM
										stock_details
										INNER JOIN stocks S ON S.id = stock_details.stock_id 
									WHERE
										product_id = SD.product_id 
										AND S.type = 'OUT' 
										),
									0 
								)) AS all_stock 
						FROM
							stocks S
							INNER JOIN stock_details SD ON S.id = stock_id
							INNER JOIN products ON products.id = SD.product_id
							INNER JOIN categories ON categories.id = products.category_id
							INNER JOIN units ON units.id = products.unit_id 
						WHERE
							type = 'IN' 
						GROUP BY
							product_id");
		$result = $record->getResult();

		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Stock']),
			'page_title' => view('partials/page-title', ['title' => 'Stock Barang', 'li_1' => 'Stock Barang', 'li_2' => 'List Stock Barang']),
			'records' => $result
		];

		return view('stock/index', $data);
	}
}

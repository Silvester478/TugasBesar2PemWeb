<?php

namespace App\Models;

use CodeIgniter\Model;

class Stockdetails extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'stock_details';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		"stock_id",
		"product_id",
		"qty",
	];
}

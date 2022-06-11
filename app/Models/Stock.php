<?php

namespace App\Models;

use CodeIgniter\Model;

class Stock extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'stocks';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'transaction_code',
		'date',
		'type',
		'note',
	];

	public function stock_details()
	{
		// dd();
		return $this->hasMany(new Stockdetails());
	}
}

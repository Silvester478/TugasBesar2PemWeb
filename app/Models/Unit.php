<?php

namespace App\Models;

use CodeIgniter\Model;

class Unit extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'units';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'unit_code', 
		'description'
	];
}

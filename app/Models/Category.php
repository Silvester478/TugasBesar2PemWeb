<?php

namespace App\Models;

use CodeIgniter\Model;

class Category extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'categories';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'category_code',
		'name',
	];
}

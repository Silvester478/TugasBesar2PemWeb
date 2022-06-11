<?php

namespace App\Models;

use CodeIgniter\Model;

class Mastercvskill extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'master_cv_skills';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'master_cv_id',
		'name'
	];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Mastercvexperience extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'master_cv_experiences';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'master_cv_id',
		'title',
		'company_name',
		'description',
		'start_date',
		'end_date'
	];
}

<?php

namespace App\Models;

use CodeIgniter\Model;

class Mastercveducation extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'master_cv_educations';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'master_cv_id',
		'name',
		'title',
		'start_date',
		'end_date'
	];
}

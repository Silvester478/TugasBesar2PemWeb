<?php

namespace App\Models;

use CodeIgniter\Model;

class Mastercv extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'master_cvs';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [
		'name',
		'title',
		'date_of_birth',
		'description',
		'email',
		'phone',
		'address',
		'photo',
	];
}

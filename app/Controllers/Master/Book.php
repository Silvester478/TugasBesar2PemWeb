<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;

class Book extends BaseController
{
	public function index()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'Management Buku']),
			'page_title' => view('partials/page-title', ['title' => 'Management Buku', 'li_1' => 'Buku', 'li_2' => 'List Buku'])
		];
		return view('master/book/index', $data);
	}
}

<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Category as ModelsCategory;

class Category extends BaseController
{
	protected $category;

    function __construct()
    {
        $this->category = new ModelsCategory();
    }

	public function index()
	{
		$data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Category']),
            'page_title' => view('partials/page-title', ['title' => 'Category', 'li_1' => 'Master', 'li_2' => 'Category']),
            'categories' => $this->category->findAll(),
        ];

        return view('master/category/index', $data);
	}

    public function add()
    {
        $data = [
            'category_code' => $this->request->getVar('code'),
            'name' => $this->request->getVar('name'),
        ];
        $this->category->save($data);

        return redirect()->route('category-list');
    }

    public function edit($id)
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Edit Category']),
            'page_title' => view('partials/page-title', ['title' => 'Edit Category', 'li_1' => 'Category', 'li_2' => 'Edit']),
            'category' => $this->category->find($id)
        ];

        return view('master/category/edit', $data);
    }

    public function update()
    {
        $data = [
            'category_code' => $this->request->getVar('code'),
            'name' => $this->request->getVar('name'),
        ];

        $this->category->update($this->request->getVar('id'), $data);

        return redirect()->route('category-list');
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->category->delete($id);

        return redirect()->route('category-list');
    }
}

<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Category;
use App\Models\Unit;
use App\Models\Product as ModelsProducts;

class Product extends BaseController
{
    protected $product;

    function __construct()
    {
        $this->product      = new ModelsProducts();
        $this->category     = new Category();
        $this->unit         = new Unit();
    }

    public function index()
    {
        $product = $this->product
            ->join('categories', 'categories.id = products.category_id', 'left')
            ->join('units', 'units.id = products.unit_id', 'left')
            ->select('products.id, products.code, products.name, units.description, categories.name as category_name, categories.category_code as category_code')
            ->findAll();

        $data = [
            'title_meta'    => view('partials/title-meta', ['title' => 'Product']),
            'page_title'    => view('partials/page-title', ['title' => 'Product', 'li_1' => 'Master', 'li_2' => 'Products']),
            'products'      => $product,
            'categories'    => $this->category->findAll(),
            'units'         => $this->unit->findAll()
        ];
        return view('master/product/index', $data);
    }
    public function add()
    {
        $data = [
            'category_id' => $this->request->getVar('category_id'),
            'unit_id' => $this->request->getVar('unit_id'),
            'code' => $this->request->getVar('code'),
            'name' => $this->request->getVar('name'),
        ];
        $this->product->save($data);

        return redirect()->route('product-list');
    }

    public function edit($id)
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Edit product']),
            'page_title' => view('partials/page-title', ['title' => 'Edit product', 'li_1' => 'product', 'li_2' => 'Edit']),
            'product'    => $this->product->find($id),
            'categories' => $this->category->findAll(),
            'units'      => $this->unit->findAll()
        ];

        return view('master/product/edit', $data);
    }

    public function update()
    {
        $data = [
            'category_id' => $this->request->getVar('category_id'),
            'unit_id' => $this->request->getVar('unit_id'),
            'code' => $this->request->getVar('code'),
            'name' => $this->request->getVar('name'),
        ];

        $this->product->update($this->request->getVar('id'), $data);

        return redirect()->route('product-list');
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->product->delete($id);

        return redirect()->route('product-list');
    }
}

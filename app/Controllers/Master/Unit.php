<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\Unit as ModelsUnit;

class Unit extends BaseController
{
	protected $unit;

    function __construct()
    {
        $this->unit = new ModelsUnit();
    }

	public function index()
	{
		$data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Unit']),
            'page_title' => view('partials/page-title', ['title' => 'Unit', 'li_1' => 'Master', 'li_2' => 'Unit']),
            'units' => $this->unit->findAll()
        ];

        return view('master/unit/index', $data);
	}

    public function add()
    {
        $data = [
            'unit_code' => $this->request->getVar('code'),
            'description' => $this->request->getVar('description'),
        ];
        $this->unit->save($data);

        return redirect()->route('unit-list');
    }

    public function edit($id)
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Edit Unit']),
            'page_title' => view('partials/page-title', ['title' => 'Edit Unit', 'li_1' => 'Unit', 'li_2' => 'Edit']),
            'unit' => $this->unit->find($id)
        ];

        return view('master/unit/edit', $data);
    }

    public function update()
    {
        $data = [
            'unit_code' => $this->request->getVar('code'),
            'description' => $this->request->getVar('description'),
        ];

        $this->unit->update($this->request->getVar('id'), $data);

        return redirect()->route('unit-list');
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->unit->delete($id);

        return redirect()->route('unit-list');
    }
}

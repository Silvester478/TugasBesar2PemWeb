<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Mastercv;
use App\Models\Mastercveducation;
use App\Models\Mastercvexperience;
use App\Models\Mastercvskill;

class MastercvController extends BaseController
{

	function __construct()
    {
        $this->cv = new Mastercv();
		$this->education = new Mastercveducation();
		$this->experience = new Mastercvexperience();
		$this->skill = new Mastercvskill();
    }

	public function index()
	{

		$result = new Mastercv();

		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'CV']),
			'page_title' => view('partials/page-title', ['title' => 'Curriculum Vitae', 'li_1' => 'Curriculum Vitae', 'li_2' => 'List Curriculum Vitae']),
			'records' => $result->findAll()
		];

		return view('cv/index', $data);
	}


	public function add()
	{
		$data = [
			'title_meta' => view('partials/title-meta', ['title' => 'CV']),
			'page_title' => view('partials/page-title', ['title' => 'Curriculum Vitae', 'li_1' => 'Curriculum Vitae', 'li_2' => 'Add Curriculum Vitae']),
		];

		return view('cv/add', $data);
	}

	public function store()
	{
		$MasterCv 				= new Mastercv();
		$MasterCvEducations 	= new Mastercveducation();
		$MasterCvExperiences 	= new Mastercvexperience();
		$MasterCvSkills 		= new Mastercvskill();

		// SAVE PARENT 
		$parent = [
			"name" 				=> $this->request->getVar('name'),
			"title"				=> $this->request->getVar('title'),
			"date_of_birth"		=> $this->request->getVar('date_of_birth'),
			"description"		=> $this->request->getVar('description'),
			"phone"				=> $this->request->getVar('phone'),
			"email"				=> $this->request->getVar('email'),
			"address"			=> $this->request->getVar('address'),
		];
		$MasterCv->save($parent);
		$parent_id = $MasterCv->getInsertID();

		// SAVE CHILD EDUCATION
		foreach ($this->request->getVar('master_cv_educations') as $key => $value) {
			$child = [
				"master_cv_id"	=> $parent_id,
				"name"			=> $value['name'],
				"title"			=> $value['title'],
				"start_date"	=> $value['start_date'],
				"end_date"		=> $value['end_date'],
			];
			$MasterCvEducations->save($child);
		}

		// SAVE CHILD EXPERIENCE
		foreach ($this->request->getVar('master_cv_experiences') as $key => $value) {
			$child = [
				"master_cv_id"	=> $parent_id,
				"title"			=> $value['title'],
				"company_name"	=> $value['company_name'],
				"description"	=> $value['description'],
				"start_date"	=> $value['start_date'],
				"end_date"		=> $value['end_date'],
			];
			$MasterCvExperiences->save($child);
		}
		// SAVE CHILD EXPERIENCE
		foreach ($this->request->getVar('master_cv_skills') as $key => $value) {
			$child = [
				"master_cv_id"	=> $parent_id,
				"name"			=> $value['name'],
			];
			$MasterCvSkills->save($child);
		}

		return redirect()->route('cv-list');
	}

	public function delete()
    {
        $id = $this->request->getVar('id');
        $this->cv->delete($id);
		$this->education->where('master_cv_id', $id)->delete();
		$this->experience->where('master_cv_id', $id)->delete();
		$this->skill->where('master_cv_id', $id)->delete();

        return redirect()->route('cv-list');
    }
}
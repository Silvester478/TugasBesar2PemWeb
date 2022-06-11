<?php

namespace App\Controllers\Master;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $user;

    function __construct()
    {
        $this->user = new UserModel();
    }

    public function index()
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Users']),
            'page_title' => view('partials/page-title', ['title' => 'Users', 'li_1' => 'Master', 'li_2' => 'Users']),
            'users' => $this->user->findAll()
        ];

        return view('master/user/index', $data);
    }

    public function add()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone_no' => $this->request->getVar('phone_no'),
            'role' => $this->request->getVar('role'),
            'password' => sha1($this->request->getVar('password'))
        ];
        $this->user->save($data);

        return redirect()->route('user-list');
    }

    public function edit($id)
    {
        $data = [
            'title_meta' => view('partials/title-meta', ['title' => 'Edit User']),
            'page_title' => view('partials/page-title', ['title' => 'Edit User', 'li_1' => 'Users', 'li_2' => 'Edit']),
            'user' => $this->user->find($id)
        ];

        return view('master/user/edit', $data);
    }

    public function update()
    {
        $data = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'phone_no' => $this->request->getVar('phone_no'),
            'role' => $this->request->getVar('role')
        ];

        if($this->request->getVar('password')) {
            $data['password'] = sha1($this->request->getVar('password'));
        }

        $this->user->update($this->request->getVar('id'), $data);

        return redirect()->route('user-list');
    }

    public function delete()
    {
        $id = $this->request->getVar('id');
        $this->user->delete($id);

        return redirect()->route('user-list');
    }
}
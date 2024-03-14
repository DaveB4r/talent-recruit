<?php

namespace App\Controllers;

class Home extends BaseController
{
    private $session;
    public function __construct()
    {
        $this->session = \Config\Services::session();
    }
    public function index(): string
    {
        $data['vista'] = 'index';
        $data['active'] = 'home';
        $data['username'] = $this->session->get('username');
        $data['rol'] = $this->session->get('rol');
        return view('layouts/homeTemplate', $data);
    }
}

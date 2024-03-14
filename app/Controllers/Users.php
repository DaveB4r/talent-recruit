<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\User;

class Users extends BaseController
{
    private $db;
    private $session;
    public function __construct()
    {
        $this->db = db_connect();
        $this->session = \Config\Services::session();
    }

    public function index()
    {        
        $ofertas = $this->db->table('ofertas')->get()->getResult();
        $data['ofertas'] = $ofertas;
        if(!$this->session->has('username')){
            return redirect()->to(base_url('/'));
        }
        $data['vista'] = 'talents/index';
        $data['active'] = 'talents';
        $data['username'] = $this->session->get('username');
        $data['rol'] = $this->session->get('rol');
        return view('layouts/mainTemplate', $data);
    }

    public function register()
    {   
        if($this->session->has('username')){
            return redirect()->to(base_url('/talents'));
        }
        $data['vista'] = 'talents/register';
        $data['active'] = 'talents';
        $data['username'] = $this->session->get('username');
        $data['rol'] = $this->session->get('rol');
        return view('layouts/mainTemplate', $data);
    }

    public function save()
    {
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
        $result = $this->db->table('users')->insert($data);
        $status = $result ? 'Se ha registrado satisfactoriamente' : 'Ocurrio un error!';
        
        return redirect()->to(base_url('talents_login'))->with('status', $status);
    }

    public function login()
    {
        if($this->session->has('username')){
            return redirect()->to(base_url('/talents'));
        }
        $data['vista'] = 'talents/login';
        $data['active'] = 'talents';
        $data['username'] = $this->session->get('username');
        $data['rol'] = $this->session->get('rol');
        return view('layouts/mainTemplate', $data);
    }

    public function logout()
    {
        $this->session->remove('id');
        $this->session->remove('username');
        $this->session->remove('rol');
        return redirect()->to(base_url('/'));
    }

    public function session()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $query = $this->db->query("SELECT password, id FROM users WHERE username = '$username';");
        $storedPassword = $query->getRow();
        $status =  'usuario o contraseña incorrectas';
        $route = 'talents_login';
        if(password_verify($password, $storedPassword->password))
        {
            $status =  'Bienvenido talent';
            $route = 'talents';
            $newdata = [
                'username'  => $username,
                'rol' => 'talent',
                'id' => $storedPassword->id
            ];
            
            $this->session->set($newdata);
        }

        return redirect()->to(base_url($route))->with('status', $status);
    }

    public function profile()
    {
        if(!$this->session->has('id')){
            return redirect()->to(base_url('/talents'));
        }
        $username = $this->session->get('username');
        $userId =  $this->session->get('id');
        $query = $this->db->query("SELECT * FROM users WHERE id = '$userId';");
        $userdata = $query->getRow();
        $data['vista'] = 'talents/profile';
        $data['active'] = 'talents';
        $data['username'] = $username;
        $data['rol'] = $this->session->get('rol');
        $data['userdata'] = $userdata;
        return view('layouts/mainTemplate', $data);
    }

    public function update()
    {
        $data = [
            'id' => $this->request->getPost('userid'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT)
        ];
        $result = $this->db->table('users')->replace($data);
        $status = $result ? 'Se ha actualizado su perfil satisfactoriamente' : 'Ocurrio un error!';
        
        return redirect()->to(base_url('talents_profile'))->with('status', $status);
    }
}

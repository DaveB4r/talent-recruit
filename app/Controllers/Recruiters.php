<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Recruiter;
use App\Models\Oferta;

class Recruiters extends BaseController
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
        $data['vista'] = 'recruiters/index';
        $data['active'] = 'recruiters';
        $data['username'] = $this->session->get('username');
        $data['rol'] = $this->session->get('rol');
        return view('layouts/mainTemplate', $data);
    }

    public function register()
    {   
        if($this->session->has('username')){
            return redirect()->to(base_url('/recruiters'));
        }
        $data['vista'] = 'recruiters/register';
        $data['active'] = 'recruiters';
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
        $result = $this->db->table('recruiters')->insert($data);
        $status = $result ? 'Se ha registrado satisfactoriamente' : 'Ocurrio un error!';
        
        return redirect()->to(base_url('recruiters_login'))->with('status', $status);
    }

    public function login()
    {
        if($this->session->has('username')){
            return redirect()->to(base_url('/recruiters'));
        }
        $data['vista'] = 'recruiters/login';
        $data['active'] = 'recruiters';
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
        $query = $this->db->query("SELECT password, id FROM recruiters WHERE username = '$username';");
        $storedPassword = $query->getRow();
        $status =  'usuario o contraseña incorrectas';
        $route = 'recruiters_login';
        if(password_verify($password, $storedPassword->password))
        {
            $status =  'Bienvenido Recruiter';
            $route = 'recruiters';
            $newdata = [
                'username'  => $username,
                'rol' => 'recruiter',
                'id' => $storedPassword->id
            ];
            
            $this->session->set($newdata);
        }

        return redirect()->to(base_url($route))->with('status', $status);
    }

    public function profile()
    {
        if(!$this->session->has('id')){
            return redirect()->to(base_url('/recruiter'));
        }
        $username = $this->session->get('username');
        $userId =  $this->session->get('id');
        $query = $this->db->query("SELECT * FROM recruiters WHERE id = '$userId';");
        $userdata = $query->getRow();
        $data['vista'] = 'recruiters/profile';
        $data['active'] = 'recruiters';
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
        $result = $this->db->table('recruiters')->replace($data);
        $status = $result ? 'Se ha actualizado su perfil satisfactoriamente' : 'Ocurrio un error!';
        
        return redirect()->to(base_url('recruiters_profile'))->with('status', $status);
    }

    public function oferta()
    {
        if(!$this->session->has('username')){
            return redirect()->to(base_url('/'));
        }
        $data['vista'] = 'recruiters/oferta';
        $data['active'] = 'recruiters';
        $data['username'] = $this->session->get('username');
        $data['rol'] = $this->session->get('rol');
        return view('layouts/mainTemplate', $data);
    }

    public function saveOferta()
    {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'stack' => implode(",", $this->request->getPost('stack[]')),
            'descripcion' => $this->request->getPost('descripcion'),
        ];
        $result = $this->db->table('ofertas')->insert($data);
        $status = $result ? 'Se ha guardado la oferta satisfactoriamente' : 'Ocurrio un error!';
        
        return redirect()->to(base_url('recruiters'))->with('status', $status);
    }

    public function editarOferta($id)
    {
        if(!$this->session->has('username')){
            return redirect()->to(base_url('/'));
        }
        $query = $this->db->query("SELECT * FROM ofertas WHERE id = '$id';");
        $ofertadata = $query->getRow();
        $data['vista'] = 'recruiters/edita_oferta';
        $data['active'] = 'recruiters';
        $data['username'] = $this->session->get('username');
        $data['rol'] = $this->session->get('rol');
        $data['ofertadata'] = $ofertadata;
        return view('layouts/mainTemplate', $data);
    }

    public function updateOferta()
    {
        $data = [
            'id' => $this->request->getPost('id'),
            'nombre' => $this->request->getPost('nombre'),
            'stack' => implode(",", $this->request->getPost('stack[]')),
            'descripcion' => $this->request->getPost('descripcion'),
        ];
        $result = $this->db->table('ofertas')->replace($data);
        $status = $result ? 'Se ha editado la oferta satisfactoriamente' : 'Ocurrio un error!';
        
        return redirect()->to(base_url('recruiters'))->with('status', $status);
    }

    public function eliminarOferta($id)
    {
        if(!$this->session->has('username')){
            return redirect()->to(base_url('/'));
        }
        $result = $this->db->table('ofertas')->where('id', $id)->delete();
        $status = 'Registro eliminado';
        return redirect()->to(base_url('recruiters'))->with('status', $status);
    }
}

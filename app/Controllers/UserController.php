<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UsuarioModel;
use App\Services\AuthService;
use CodeIgniter\Config\Factories;


class UserController extends BaseController
{
    protected $authService, $usuarioModel, $session;
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'nome' => 'required|min_length[6]|',
        
    ];

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();

        $this->authService = Factories::class(AuthService::class);
        
    }

    public function index()
    {
        return view('criar_usuario');
    }

    public function criarUsuario()
    {

        
        if ($this->request->getMethod() === 'post') {
            $usuarios = new User([
                'email' => $this->request->getPost('email'),
                'nome' => $this->request->getPost('nome'),
                
            ]);

          
            if ($this->usuarioModel->save($usuarios)) {

                return redirect()->to('/usuario')->with('success', 'Usuário criado com sucesso!');
            } else {

                return redirect()->back()->with('error', 'Erro ao criar o usuário. Por favor, tente novamente.');
            }
        }

        
        return view('criar_usuario');
    }

   
    public function deletarUsuario($id)
{
    
    if (!is_numeric($id) || $id <= 0) {
        return redirect()->back()->with('error', 'ID de usuário inválido.');
    }

    $usuario = $this->usuarioModel->find($id);
    if (!$usuario) {
        return redirect()->back()->with('error', 'Usuário não encontrado.');
    }

   
    try {
        $this->usuarioModel->delete($id);
        return redirect()->to('/usuario_deletado')->with('success', 'Usuário deletado com sucesso!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Erro ao deletar usuário: ' . $e->getMessage());
    }
}
public function usuarioDeletado()
{
    return view('usuario_deletado');
}



    public function logout()
    {

       
    }
}

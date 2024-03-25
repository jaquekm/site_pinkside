<?php

namespace App\Services;

use App\Entities\User;
use App\Models\UsuarioModel;
use CodeIgniter\Config\Factories;

class AuthService{

    protected $userModel;

    public function __construct()
    {
        $this->userModel = service('UsuarioModel');
        $this->userModel = Factories::models(UsuarioModel::class);
        $this->userModel = new UsuarioModel();
        
    }

    /* 'userModel' => UserModel::class, */
    public function authenticate(string $email, string $senha){

        $user = $this->userModel->getUser($email);
      /*   debug(password_verify($senha, $user->senha)); */
        if($user && password_verify($senha, $user->senha)){
           
            return true;
        }else{
          
            return false;
        }
    }

    public function criarUsuario($email, $senha = null, $dados = [])
    {
        $user = new User();
        
        if (!empty($dados)) {
            
            $user->fill($dados);
        } else {
            // Use o email e senha fornecidos como argumentos.
            $user->email = $email;
            $user->senha = $senha;
        }
    
        if ($this->userModel->save($user)) {
            session()->setFlashdata('success', 'Login criado com sucesso');
            return redirect()->to('/livros');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->userModel->errors());
        }
    }
    
}

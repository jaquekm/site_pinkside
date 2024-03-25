<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Models\UsuarioModel;
use App\Services\AuthService;
use CodeIgniter\Config\Factories;


class UserController extends BaseController
{
    protected $authService, $usuarioModel;
    protected $validationRules = [
        'email' => 'required|valid_email|is_unique[usuarios.email]',
        'nome' => 'required|min_length[6]|',
        'senha' => 'required|min_length[6]',
        
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
                'senha' => password_hash($this->request->getPost('senha'), PASSWORD_BCRYPT),
                'created_at' => date('Y-m-d H:i:s')
            ]);

          
            if ($this->usuarioModel->save($usuarios)) {

                return redirect()->to('/login')->with('success', 'Usuário criado com sucesso!');
            } else {

                return redirect()->back()->with('error', 'Erro ao criar o usuário. Por favor, tente novamente.');
            }
            
      
    }

        
        return view('criar_usuario');
    }

    public function editarUsuario($id)
{
   
    if (!is_numeric($id) || $id <= 0) {
        return redirect()->back()->with('error', 'ID de usuário inválido.');
    }

   
    $usuario = $this->usuarioModel->find($id);
    if (!$usuario) {
        return redirect()->back()->with('error', 'Usuário não encontrado.');
    }

    
    if ($this->request->getMethod() === 'post') {
        
        $validationRules = [
            'email' => 'required|valid_email',
            'nome' => 'required|min_length[6]',
            'senha' => 'required|min_length[6]',
        ];

        // Executa a validação
        if (!$this->validate($validationRules)) {
            // Se a validação falhar, redireciona de volta com os erros
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Obtém os dados do formulário
        $data = [
            'email' => $this->request->getPost('email'),
            'nome' => $this->request->getPost('nome'),
            'senha' => $this->request->getPost('senha'),
        ];

        // Tenta atualizar o usuário
        try {
            $this->usuarioModel->update($id, $data);
            return redirect()->to('/usuarios ')->with('success', 'Usuário atualizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao atualizar usuário: ' . $e->getMessage());
        }
    }

    // Se o método da requisição não for POST, carrega a view de edição com os dados do usuário
    return view('editar_usuario', ['usuario' => $usuario]);

}
public function login()
{
    if ($this->request->getMethod() === 'post') {
        $email = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');
     
        
        if ($this->authService->authenticate($email, $senha)) {
            // Autenticação bem-sucedida, redirecionar para a página do usuário
            return redirect()->to('usuario_view');
        } else {
            // Exibir mensagem de erro e renderizar a página de login novamente
            return redirect()->back()->withInput()->with('error', 'Credenciais inválidas');
        }
    } else {
        return view('login');
    }
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

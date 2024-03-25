<?php

namespace App\Models;

use App\Entities\User;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'email', 'senha', 'created_at'];
    protected $returnType = User::class;


    public function getUser($email)
    {
        return $this->where('email', $email)->first();
    }

    public function editarUsuario($id, $data)
    {
        // Verificar se o usuário existe
        $user = $this->find($id);
        if (!$user) {
            return false;
        }

        // Atualizar os dados do usuário
        $user->fill($data);

        // Salvar as alterações no banco de dados
        return $this->save($user);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }

    public function authenticate($email, $senha)
    {
        $user = $this->getUserByEmail($email);

        if ($user && password_verify($senha, $user->senha)) {
            return $user;
        } else {
            return null;
        }
    }
}

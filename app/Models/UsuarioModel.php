<?php

namespace App\Models;
use App\Entities\User;
use CodeIgniter\Model;

class UsuarioModel extends Model
{
    protected $table            = 'usuarios';
    protected $primaryKey = 'id'; 
    protected $allowedFields    = ['nome', 'email'];
    protected $returnType = User::class;

    

    public function getUser($email){
        return $this->where('email', $email)->first();
    }
    public function deleteUsuario($id)
    {
       
        if (!is_numeric($id) || $id <= 0) {
            return false; 
        }


}

}
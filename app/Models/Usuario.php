<?php

namespace App\Models;
use CodeIgniter\Model;

class Usuario extends Model
{
    protected $table = "usuarios";
    protected $primaryKey = 'id';

    protected $allowedFields = ['nombres', 'nomusuario', 'claveacceso', 'img_avatar'];

    // Campos de auditoría
    protected $useTimestamps = true;
    protected $createdField = 'create_at';
    protected $updatedField = 'update_at';

    /**
     * Retorna el registro del usuario por nombre de usuario
     */
    public function getUser($nomusuario = ''): array|object|null
    {
        $usuario = $this->where('nomusuario', $nomusuario)->first();
        return $usuario;
    }

    /**
     * Verifica si un nombre de usuario ya existe
     */
    public function existeUsuario($nomusuario = ''): bool
    {
        $usuario = $this->where('nomusuario', $nomusuario)->first();
        return $usuario !== null;
    }

    /**
     * Registra un nuevo usuario
     */
    public function registrarUsuario($data): bool
    {
        return $this->insert($data);
    }

    /**
     * Actualiza el avatar del usuario
     */
    public function actualizarAvatar($id, $rutaAvatar): bool
    {
        return $this->update($id, ['img_avatar' => $rutaAvatar]);
    }
}
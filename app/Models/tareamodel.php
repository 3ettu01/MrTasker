<?php 
namespace App\Models;
use CodeIgniter\Model;

class TareaModel extends Model { 
    protected $table = 'tareas'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'iddueño', 'tema', 'descripcion', 'prioridad', 'estado', 'frecordatorio', 'fvencimiento', 'color', 'archivo'];
    protected $useTimestamps = false; // Dates
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    protected $validationRules = []; // Validation
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;
}
?>
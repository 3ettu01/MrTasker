<?php 
namespace App\Models;
use CodeIgniter\Model;

class SubtareaModel extends Model { 
    protected $table = 'subtareas'; 
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true; 
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['id', 'idtarea', 'tema', 'descripcion', 'prioridad', 'estado', 'frecordatorio', 'fvencimiento', 'idresponsable', 'comentario'];
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
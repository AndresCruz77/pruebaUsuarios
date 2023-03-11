<?php
namespace App\Models;

use CodeIgniter\Model;

class TicketsModel extends Model
{
    protected $table = 'tickets';
    protected $primaryKey = 'id';
    protected $allowedFields = ['usuario','fecha_creacion','fecha_actualizacion','estatus'];
}
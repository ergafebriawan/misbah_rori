<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MSensor extends Model
{
    use HasFactory;

    protected $table = 'monitoringweb';

    protected $primarykey = 'id_sensor';

    protected $fillable = [
        'ph',
        'turbi',
        'status'
    ];

}

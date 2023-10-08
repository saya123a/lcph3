<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addnewreceiver extends Model
{
    use HasFactory;

    protected $table = 'receiver';

    protected $fillable = [
      'ic',
      'name'
    ];
}

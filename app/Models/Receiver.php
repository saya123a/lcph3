<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiver extends Model
{
    use HasFactory;

    protected $table = 'receiver';

    protected $fillable = [
      'receiver_ic',
      'receiver_name'
    ];
}

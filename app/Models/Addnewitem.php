<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addnewitem extends Model
{
    use HasFactory;

    protected $table = 'item';

    protected $fillable = [
      'item_barcode',
      'item_name',
      'item_brand'
    ];
}

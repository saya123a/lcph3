<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addnewproduct extends Model
{
    use HasFactory;

    protected $fillable = [
      'item_barcode',
      'item_name',
      'item_brand'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    use HasFactory;

    protected $table = 'item_receiver';

    protected $fillable = [
      'item_barcode',
      'item_name',
      'item_brand',
      'receiver_ic',
      'receiver_name'
    ];
}

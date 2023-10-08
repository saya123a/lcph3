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

    // Define the relationship with the 'items' table
    public function item()
    {
        return $this->belongsTo(Addnewitem::class, 'item_barcode', 'item_name', 'item_brand');
    }

    // Define the relationship with the 'receiver' table
    public function receiver()
    {
        return $this->belongsTo(Addnewreceiver::class, 'receiver_ic', 'receiver_name');
    }
}

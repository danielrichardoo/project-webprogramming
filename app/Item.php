<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $primaryKey ='itemID';
    protected $fillable = ['itemName','itemPrice','itemImage','itemDescription'];
}

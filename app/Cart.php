<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';
    protected $primaryKey ='cartID';
    protected $fillable = ['itemQty','itemID','userID'];

    public function getItem()
    {
        return $this->belongsTo('App\Item','itemID');
    }

    public function getUser()
    {
        return $this->belongsTo('App\User', 'userID');
    }

}

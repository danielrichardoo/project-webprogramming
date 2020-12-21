<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $primaryKey = 'transactionID';
    protected $fillable = ['userID','totalPrice'];

    public function getTransaction()
    {
        return $this->hasMany('App\TransactionDetail', 'transactionID');
    }

    public function getUser()
    {
        return $this->belongsTo('App\User', 'userID');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $table = 'transaction_details';
    protected $primaryKey = 'transactionDetailID';
    protected $fillable = ['transactionID', 'itemID'];

    public function getItem()
    {
        return $this->belongsTo('App\Item','itemID');
    }

}

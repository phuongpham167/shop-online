<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table = "bill_details";

    public function products(){
    	return $this->belongsTo("App\Product", "id_product", "id");
    }

    public function bills(){
    	return $this->belongsTo("App\Bill", "id_bill", "id");
    }
}

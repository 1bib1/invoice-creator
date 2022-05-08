<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    
    public function invoices()
    {
        return $this->HasMany('App\Models\Invoice');
    }
    
    public function fetchFromRequest(Customer $customer, $request){

        $customer->name = $request->name;
        $customer->address = $request->address;
        $customer->tin = $request->tin;

        return $customer;
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}

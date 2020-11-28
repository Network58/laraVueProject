<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'address',
        'phoneNo',
        'state_id',
        'nearStop',
    ];
    public function state(){
        return $this->belongsToMany('App\Models\States', 'states');
    }
}

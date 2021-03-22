<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'dob',
        'email',
    ];
    public function city(){
        return $this->belongsTo('App\Models\City');
    }

}

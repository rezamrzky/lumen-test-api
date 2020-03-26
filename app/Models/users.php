<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model {

    //deklarasi variabel model users
    protected $fillable = [
        'id', 'firstName', 'lastName', 'gender', 'status', 'email', 'city', 'address', 'phone', 'created_at', "updated_at"
    ];

}
<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Wallet extends Model
{

    protected $table = 'wallet';
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'wallet_name','id_user','id_icon','created_by', 'updated_by',
    ];
}

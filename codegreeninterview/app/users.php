<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class users extends Authenticatable
{
    protected $table = 'users';
	// Primary key
	public $primaryKey = 'id';

	protected $fillable = [
         'uname','password','status'
    ];
}

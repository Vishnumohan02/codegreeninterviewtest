<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    protected $table = 'users';
	// Primary key
	public $primaryKey = 'id';

	protected $fillable = [
         'uname','password','status'
    ];
}

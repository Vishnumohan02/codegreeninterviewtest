<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserOtp extends Model
{
    protected $table      ='user_otps';  

    /*primarykey*/  
  	protected $primaryKey = 'id';

  	/*table fields*/
    protected $fillable  = [
                           'userId',
                           'otp',
                           'created_at',
                           'updated_at'
                           ];
}

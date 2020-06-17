<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
     /*table name*/
    protected $table      ='user_details';  

    /*primarykey*/  
  	protected $primaryKey = 'id';

  	/*table fields*/
    protected $fillable  = [
                           'userId',
                           'email',
                           'dob',
                           'city',
                           'created_at',
                           'updated_at'
                           ];
}

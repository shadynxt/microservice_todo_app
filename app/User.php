<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
	
	
	
	public function todos(){
		return $this->hasMany(Todo::class);
	}
	
	 public static $rules = [
            
            'name' => 'required',
            'email' => 'required|unique',
            'password' => 'required',
    ];
	
	 public static $messages =[
      'name.required'            =>  'هذا الحقل مطلوب',
     
      'email.required'             =>  'هذا الحقل مطلوب',
      'password.required'             =>  'هذا الحقل مطلوب',
 
      
      
    ];
	
}

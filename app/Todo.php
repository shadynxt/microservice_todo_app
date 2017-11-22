<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
	protected $fillable = [
		'text',
		'body',
		'due',
	
	];
	
	public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

	
	 public static $rules = [
            
            'text' => 'required',
            'body' => 'required',
            'due' => 'required',
    ];
	
	 public static $messages =[
      'text.required'            =>  'هذا الحقل مطلوب',
     
      'body.required'             =>  'هذا الحقل مطلوب',
      'due.required'             =>  'هذا الحقل مطلوب',
 
      
      
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //
	
	public function user()
    {
        return $this->belongsTo(User::class);
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

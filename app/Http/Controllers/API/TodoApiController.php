<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\AppBaseController;
use App\User;
use App\Todo;
use Illuminate\Http\Request;
use App\Http\Requests\API\ApiTodoRequest;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Lang;
use Response;

class TodoApiController extends AppBaseController
{
    public function index(Request $request)
    {
        
		$todos = Todo::orderBy('created_at', 'desc')->get();
		
      
        
        return $this->sendResponse($todos->toArray());
    }

    public function create(ApiTodoRequest $request){

    	//$services = Service::find($request->input('id'));

        $input = $request->all();

        $user = auth()->user();
        if (!$user) {
            return $this->sendError('Please login !', 401);
        }

        $todo = new Todo();
		$todo->user_id = $user->id;
        $todo->text = $request->input('text');
        $todo->body = $request->input('body');
        $todo->due = $request->input('due');
        $todo->save();


        return $this->sendResponse($todo->toArray(), 'Todo created successfully');

    }

    public function update(ApiTodoRequest $request,$id)
    {
        $todo = Todo::find($id);
        
        $user = auth()->user();
		
        if (!$user) {
            return $this->sendError('Please login !', 401);
        }


        $inputs = $request->all();

        $todo->update($inputs);
        return $this->sendResponse($todo->toArray(), 'Todo updated successfully');
    }


    public function delete(Request $request,$id)
    {
    	$todo = Todo::find($id)->delete();


        return $this->sendResponse('Todo deleted successfully');
    }
}

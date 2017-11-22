<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Todo;
use App\User;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	 
	 
	 public function __construct()
	{
		$this->middleware('auth');
	}
	 
    public function index()
    {
        //$todos = Todo::all();
		$user = auth()->user();
		if($user->role == 1){
			 $todos = Todo::orderBy('created_at', 'desc')->get();
		}
		else
		{
			$todos = Todo::orderBy('created_at', 'desc')->where("user_id",$user->id)->get();
		}
        return view('todos.index')->with('todos', $todos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
          'text' => 'required',
		  'body' => 'required',
		  'due' => 'required',
        ]);
		 
		$user = auth()->user();
        // Create Todo
        $todo = new Todo;
        $todo->text = $request->input('text');
		$todo->user_id = $user->id;
        $todo->body = $request->input('body');
        $todo->due = $request->input('due');

        $todo->save();

        return redirect('/')->with('success', 'Todo Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$user =auth()->user();
		//dd($user);
		if($user->role == 0){
			$todo = Todo::where('id','=',$id)->Where('user_id',$user->id)->first();
			if(!empty($todo)){
				$todo = Todo::where('id',$id)->first();
				return view('todos.show')->with('todo', $todo);
			}
			else
			{
				return redirect('/')->with('error','CSRF SUCKS! , You are not authorized to view that todo');
			}
		}
		else{
			$todo = Todo::where('id',$id)->first();
			return view('todos.show')->with('todo', $todo);
		}
        //$todo = Todo::find($id);
        //return view('todos.show')->with('todo', $todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('todos.edit')->with('todo', $todo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
	$this->validate($request, [
          'text' => 'required',
		  'body' => 'required',
		  'due' => 'required'
        ]);
		
		$user = auth()->user();
		
        $todo = Todo::find($id);
        $todo->text = $request->input('text');
		$todo->user_id = $user->id;
        $todo->body = $request->input('body');
        $todo->due = $request->input('due');

        $todo->save();

        return redirect('/')->with('success', 'Todo Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('/')->with('success', 'Todo Deleted');
    }
}

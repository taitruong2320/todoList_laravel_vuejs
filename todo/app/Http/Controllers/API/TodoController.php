<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Http\Resources\TodoCollection;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::get();
        return TodoCollection::collection($todos);
    }
    public function add(Request $req){
    	$todo = new Todo;
    	$todo->content = $req->content;
    	$todo->checked = $req->checked;
    	$todo->completed = $req->completed;
    	$todo->created_at = now();
    	$todo->updated_at = now();
    	$todo->save();

    	$todos = Todo::get();
        return TodoCollection::collection($todos);
    }
    public function remove(Request $req){
    	
    	$todo =  Todo::find($req->id);
    	$todo->delete();
		// $todo = Todo::where('id',$req['id'])->delete();
    	$todos = Todo::get();
        return TodoCollection::collection($todos);
    }
    public function removeAll(Request $req){
    	foreach($req->params as $param){
    		if($param['checked'] == 1 ){
    			$todo = Todo::where('id',$param['id'])->delete();
    		}
    	}
    	$todos = Todo::get();
        return TodoCollection::collection($todos);
     // return $req;
    }
    public function doneAll(Request $req){
    	foreach($req->params as $param){
    		if($param['checked'] == 1 ){
    			$todo = Todo::where('id',$param['id'])->first();
    			$todo->completed = 1;
    			$todo->save();
    		}
    	}
    	$todos = Todo::get();
        return TodoCollection::collection($todos);
    }
}

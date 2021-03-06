<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Task;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('created_at', 'desc')->paginate(20);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }
        return view('tasks.index', $data);
        
        /*
        $tasks = Task::all();
        
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $task = new Task;

            $data = [
                'user' => $user,
                'task' => $task,
            ];
        }
        return view('tasks.create', $data);
        
        /*
        return view('tasks.create', [
            'task' => $task,
        ]);
        */
        
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
            'status' => 'required|max:10',
            'content' => 'required|max:255',
        ]);
        
        /*
        $task = new Task;
        $task->status = $request->status;
        $task->content = $request->content;
        $task->save();
        */
        
        $request->user()->tasks()->create([
            'status' => $request->status,
            'content' => $request->content,
        ]);
        
        
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $task = Task::find($id);

            $data = [
                'user' => $user,
                'task' => $task,
            ];
        }
        return view('tasks.show', $data);
        
        /*
        return view('tasks.show', [
            'task' => $task,
        ]);
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $task = Task::find($id);

            $data = [
                'user' => $user,
                'task' => $task,
            ];
        }
        return view('tasks.edit', $data);
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
            'status' => 'required|max:10',
            'content' => 'required|max:255',
        ]);

        $task = Task::find($id);
        if (\Auth::user()->id === $task->user_id) {
            $task->status = $request->status;
            $task->content = $request->content;
            $task->save();
        }
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if (\Auth::user()->id === $task->user_id) {
        $task->delete();
        }
        
        return redirect('/');
    }
}

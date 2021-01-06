<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Step;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = auth()->user()->todos()->orderBy('completed', 'asc')->get();
        return view('todos.index')->with(['todos' => $todos]);
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
    public function store(TodoCreateRequest $request)
    {
        // $rules = [
        //     'title' => 'required|max:255',
        // ];
        // $messages = [
        //     'tiitle.max' => 'Todo title should noet be greater than 255 chars',
        // ];
        // $validator = Validator::make($request->all(), $rules, $messages);
        // if ($validator->fails()) {
        //     return redirect()->back()
        //         ->withErrors($validator)
        //         ->withInput();
        // }
        // $request->validate([
        //     'title' => 'required',
        // ]);
        // dd(auth()->user()->todos());
        // Todo::create($request->all());

        $todos = auth()->user()->todos()->create($request->all());
        if ($todos) {
            foreach ($request->steps as $key => $value) {
                $todos->steps()->create(['name' => $value]);
            }
        }

        return redirect('/todos')->with('message', 'Add todo Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos/details', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(TodoCreateRequest $request, Todo $todo)
    {
        $todo->update(['title' => $request->title, 'description' => $request->description]);

        if ($request->stepName) {
            foreach ($request->stepName as $key => $value) {
                $id = $request->stepId[$key];
                if (!$id) {
                    $todo->steps()->create(['name' => $value]);
                } else {
                    $step = Step::find($id);
                    $step->update(['name' => $value]);
                }

            }
        }

        return redirect('todos')->with("message", 'Task has Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect()->back()->with('message', 'Task Has Deleted!');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect()->back()->with('message', 'Task Marked as completed');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect()->back()->with('message', 'Task Marked as incompleted');
    }

}
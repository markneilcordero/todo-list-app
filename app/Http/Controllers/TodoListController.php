<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use App\Http\Requests\StoreTodoListRequest;
use App\Http\Requests\UpdateTodoListRequest;
use App\Http\Requests\UpdateStatus;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TodoList::all();
        return view('todolist.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todolist.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoListRequest $request)
    {
        $validated = $request->validated();
        $model = new TodoList;
        $model->taskname = $request->input('taskname');
        $model->description = $request->input('description');
        $model->status = $request->input('status');
        $model->duedate = $request->input('duedate');
        $model->save();
        return redirect()->route('todolist.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoList $todolist)
    {
        return view('todolist.show', [
            'taskname' => $todolist->taskname,
            'description' => $todolist->description,
            'duedate' => $todolist->duedate,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TodoList $todolist)
    {
        return view('todolist.edit', [
            'id' => $todolist->id,
            'taskname' => $todolist->taskname,
            'description' => $todolist->description,
            'duedate' => $todolist->duedate,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoListRequest $request, TodoList $todolist)
    {
        $validated = $request->validated();
        $todolist->update([
            'taskname' => $request->input('taskname'),
            'description' => $request->input('description'),
            'duedate' => $request->input('duedate'),
        ]);
        return redirect()->route('todolist.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoList $todolist)
    {
        $todolist->delete();
        return redirect()->route('todolist.index');
    }

    public function taskcomplete(TodoList $taskname, UpdateStatus $request)
    {
        $validated = $request->validated();
        $taskname->update([
            'status' => $request->input('status'),
        ]);
        return redirect()->route('todolist.index');
    }
}

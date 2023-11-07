<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller {

    private $tasks = [];

    public function index() {
        $tasks = session()->get('tasks', []);
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create() {
        return view('tasks.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255',
        ]);

        $tasks = session()->get('tasks', []);

        $tasks[] = ['title' => $validated['title'], 'completed' => false];

        session()->put('tasks', $tasks);
    
        return redirect()->route('tasks.index');
    }
    

    public function complete($taskId) {
        $tasks = session()->get('tasks', []);
        if (isset($tasks[$taskId])) {
            $tasks[$taskId]['completed'] = true;
            session()->put('tasks', $tasks);
        }
        return redirect()->route('tasks.index');
    }
    

    public function destroy($taskId) {
        $tasks = session()->get('tasks', []);
        if (isset($tasks[$taskId])) {
            unset($tasks[$taskId]);
            $tasks = array_values($tasks);
            session()->put('tasks', $tasks);
        }
        return redirect()->route('tasks.index');
    }
    
}

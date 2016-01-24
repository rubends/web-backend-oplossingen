<?php

namespace App\Http\Controllers;

use App\Task;
use App\DoneTask;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
use App\Repositories\DoneTaskRepository;

class TaskController extends Controller
{
     protected $tasks;
     protected $donetasks;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks, DoneTaskRepository $donetasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
        $this->donetasks = $donetasks;
    }
    /**
	 * Display a list of all of the user's task.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function index(Request $request)
	{
	    $tasks = Task::where('user_id', $request->user()->id)->get();
	    $donetasks = DoneTask::where('user_id', $request->user()->id)->get();
	    return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
            'donetasks' => $this->donetasks->forUser($request->user()),
        ]);
	}

	public function newtask(Request $request)
	{
	    return view('tasks.newtask');
	}

	/**
	 * Create a new task.
	 *
	 * @param  Request  $request
	 * @return Response
	 */
	public function store(Request $request)
	{
	    $this->validate($request, [
	        'name' => 'required|max:255'
	    ]);

	    $request->user()->tasks()->create([
	        'name' => $request->name
	    ]);

	    return redirect('/tasks');
	}

	/**
	 * Destroy the given task.
	 *
	 * @param  Request  $request
	 * @param  Task  $task
	 * @return Response
	 */
	public function destroy(Request $request, Task $task)
	{

    	$this->authorize('destroy', $task);

	    $task->delete();

	    return redirect('/tasks');
	}
	public function donedestroy(Request $request, DoneTask $task)
	{

    	$this->authorize('destroy', $task);

	    $task->delete();

	    return redirect('/tasks');
	}

	public function done(Request $request, Task $task)
	{
		$request->user()->donetasks()->create([
	        'name' => $request->name
	    ]);


    	$this->authorize('destroy', $task);

	    $task->delete();

	    return redirect('/tasks');
	}

	public function notdone(Request $request, DoneTask $task)
	{
		$request->user()->tasks()->create([
	        'name' => $request->name
	    ]);


    	$this->authorize('destroy', $task);

	    $task->delete();

	    return redirect('/tasks');
	}

}

<?php
namespace Kumuwai\Playground\Modules\Project003\Http\Controllers;

use Illuminate\Foundation\Http\FormRequest;
use Kumuwai\Playground\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Kumuwai\Playground\Modules\Project003\Task;
use Kumuwai\Playground\Modules\Project003\TaskTransformer;


class TaskController extends Controller
{

	public function index()
	{
        $tasks = Task::all();

        return fractal()
            ->collection($tasks)
            ->transformWith(new TaskTransformer())
            ->toArray();
	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = Task::create($request->input());

        return fractal()
            ->item($task)
            ->transformWith(new TaskTransformer())
            ->toArray();
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
        $task = Task::findOrFail($id);
        $task->name = $request->input('name', $task->name);
        $task->done = $request->input('done') === 'true';
        $task->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id(s)
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasks = explode(',', $id);

        foreach($tasks as $task)
            Task::findOrFail((int)$task)->delete();
    }

}

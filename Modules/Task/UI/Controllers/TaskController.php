<?php

namespace Modules\Task\UI\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Modules\Task\Infrastructure\Repositories\Task;
use Modules\Task\UI\Validation\TaskValidator;
use Modules\Task\UI\Resources\Task as TaskResource;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::latest()->paginate(5);
        $tasks->withPath('/task/');

        $tasks = Collection::make($tasks->toArray())->map(function($item, $key){
            if($key == 'data'){
                $item = Collection::make($item)->map(function($task, $key){
                    return new TaskResource((object)$task);
                });
            }
            return $item;
        });

        return response($tasks->jsonSerialize(), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = TaskValidator::make($request->all());
        if($validator->fails()){
            return response(
                $validator->errors()->messages(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        return response(
            ['id' => Task::create($request->all())->id],
            Response::HTTP_OK
        );
    }

    /**
     * Edit the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return response(
            new TaskResource(Task::findOrFail((int)$id)),
            Response::HTTP_OK
        );
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
        $validator = TaskValidator::make($request->all());
        if($validator->fails()){
            return response(
                $validator->errors()->messages(),
                Response::HTTP_UNPROCESSABLE_ENTITY
            );
        }

        $task = Task::findOrFail((int)$id);
        $task->fill($request->all());
        $task->save();

        return response(['id' => $task->id], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Task::destroy($id);
        return response(null, Response::HTTP_OK);
    }
}

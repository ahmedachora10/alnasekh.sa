<?php

namespace Modules\Tasks\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Tasks\App\Http\Requests\CalendarEventsRequest;
use Modules\Tasks\App\Http\Requests\TaskRequest;
use Modules\Tasks\App\resources\CalendarEventsResource;
use Modules\Tasks\App\Services\TaskService;

class TasksController extends Controller
{
    public function __construct(protected TaskService $taskService) {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks::index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskRequest $request): RedirectResponse
    {
        return redirect()->route('tasks.index')->with('success', trans('message.create'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, $id): RedirectResponse
    {
        return redirect()->route('tasks.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(!$this->taskService->delete($id))
            return redirect()->route('tasks.index')->with('success', 'Something went wrong');
        return redirect()->route('tasks.index')->with('success', trans('message.delete'));
    }
}
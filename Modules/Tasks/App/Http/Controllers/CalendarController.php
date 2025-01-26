<?php

namespace Modules\Tasks\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Tasks\App\Http\Requests\CalendarEventsRequest;
use Modules\Tasks\App\Models\Task;
use Modules\Tasks\App\resources\CalendarEventsResource;
use Modules\Tasks\App\Services\MeetingService;
use Modules\Tasks\App\Services\TaskService;

class CalendarController extends Controller
{
    public function __construct(
        protected TaskService $taskService,
        protected MeetingService $meetingService,
    ) {}

    public function index() {
        return view('tasks::calendar');
    }

    public function getEventInfo(int $id) {
        $task = $this->taskService->find($id);

        if (!$task)
            return [];

        return new CalendarEventsResource($task);
    }

    public function calendarEvents(CalendarEventsRequest $request) {
        $start = $request->validated('start');
        $end = $request->validated('end');
        return CalendarEventsResource::collection(
            $this->taskService->calendarEvents(
                startDate: $start,
                endDate: $end,
            )->merge($this->meetingService->calendarEvents(
                startDate:$start,
                endDate: $end
            ))
        );
    }
}
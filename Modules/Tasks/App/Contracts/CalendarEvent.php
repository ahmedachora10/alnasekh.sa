<?php

namespace Modules\Tasks\App\Contracts;

use Illuminate\Database\Eloquent\Collection;

interface CalendarEvent {
    public function calendarEvents(string $startDate, string $endDate): Collection;
}
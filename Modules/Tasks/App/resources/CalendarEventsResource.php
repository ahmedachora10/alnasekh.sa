<?php

namespace Modules\Tasks\App\resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Tasks\App\Models\Meeting;

class CalendarEventsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     */
    public function toArray($request): array
    {
        $start = $this->start_date ?? $this->date;
        $end = $this->end_date ?? $this->date;
        return [
            'id' => $this->id,
            'title' => $this->name,
            'start' => $start?->format('Y-m-d H:i'),
            'end' => $end?->format('Y-m-d H:i'),
            'status' => $this->when($this->status != null, [
                'name' => $this->status?->name(),
                'color' => $this->status?->color(),
                'value' => $this->status?->value,
            ]),
            'classNames' => $this->when($this->status, ['bg-' . $this->status?->color(), 'text-white'], 'bg-success text-white'),
            'model' => get_class($this->resource),
            // $this->mergeWhen(get_class($this->resource) === Meeting::class, [
            //     'allDay' => true
            // ])
        ];
    }
}
<x-mail::message>
# Task Assigment

Your Mission Mr. {{$task->creator?->name}}!
</br>
{{$task->description}}

<x-mail::table>
| Field       | Value                        |
|------------|------------------------------|
| **Name**   | {{ $task->name }}            |
| **Description** | {{ $task->description }} |
| **Status** | {{ $task->status->label() }} |
| **Start**  | {{ $task->start_date->format('Y-m-d H:i') }} |
| **End**    | {{ $task->end_date->format('Y-m-d H:i') }} |
| **Priority** | {{ $task->priority->label() }} |
</x-mail::table>

{{-- <x-mail::button :url="url('calendar')">
{{$task->name}}
</x-mail::button> --}}

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>

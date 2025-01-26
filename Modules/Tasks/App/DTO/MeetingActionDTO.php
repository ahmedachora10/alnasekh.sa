<?php

namespace Modules\Tasks\App\DTO;

use App\Contracts\DTOInterface;
use App\Contracts\FromLivewireRequest;
use App\Contracts\ToArray;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Tasks\App\Enums\TaskPriority;
use Modules\Tasks\App\Enums\TaskStatus;

class MeetingActionDTO implements DTOInterface, FromLivewireRequest, ToArray {
    public function __construct(
        public readonly string $title,
        public readonly string $description,
        public readonly array $invited = [],
        public readonly Carbon $date,

    ) {}

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->date,
            'created_by' => Auth::id(),
        ];
    }

    public static function fromLivewireRequest(array $data): static {
        return new self(
            title: $data['title'],
            description: $data['description'],
            invited: $data['invited'],
            date: now()->parse($data['date'])
        );
    }
}

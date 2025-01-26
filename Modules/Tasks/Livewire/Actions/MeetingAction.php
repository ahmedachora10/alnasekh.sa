<?php

namespace Modules\Tasks\Livewire\Actions;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Tasks\App\DTO\MeetingActionDTO;
use Modules\Tasks\App\Models\Meeting;
use Modules\Tasks\App\Services\MeetingService;
use Modules\Tasks\Livewire\Forms\MeetingForm;

class MeetingAction extends Component
{
    public MeetingForm $form;
    public ?Meeting $meeting= null;
    public string $refreshEventName = 'refresh-meetings';
    public static string $modal = '#meeting-action';
    public ?int $tag = null;
    public Collection|array $users = [];

    public function mount()
    {
        $this->users = User::select(['id', 'name'])->whereHasRole('employee')->get();
    }

    #[On('edit-meeting-action')]
    public function edit(Meeting $meeting)
    {
        $this->meeting = $meeting;
        $this->form->fill($meeting->only(['title', 'description']) + [
            'invited' => $meeting->invited()->pluck('user_id')->toArray(),
            'date' => $meeting->date?->format('Y-m-d H:i'),
        ]);

        $this->dispatch('open-modal', target: self::$modal);
    }
    #[On('delete-meeting-action')]
    public function delete(Meeting $meeting)
    {
        $meetingName = $meeting->name;
        if (!app()->make(MeetingService::class)->delete($meeting->id))
            return false;

        $this->dispatch($this->refreshEventName);
        session()->put('success', 'تم حذف الاجتماع ' . $meetingName);
        $this->dispatch('refresh-alert');
    }
    public function store()
    {
        app()->make(MeetingService::class)->store(
            MeetingActionDTO::fromLivewireRequest($this->form->all())
        );
    }
    public function update()
    {
        app()->make(MeetingService::class)->update(
            $this->meeting,
            MeetingActionDTO::fromLivewireRequest($this->form->all())
        );
    }
    public function save()
    {
        $this->validate();

        if (!$this->meeting) {
            $this->store();
            $message = 'تم اضافة الاجتماع بنجاح';
        } else {
            $this->update();
            $message = 'تم تحديث الاجتماع بنجاح';
        }

        $this->dispatch($this->refreshEventName);
        $this->dispatch('close-modal', target: self::$modal);
        session()->put('success', $message);
        $this->dispatch('refresh-alert');
        $this->form->reset();
    }

    public function addInvited() {
        if (!$this->tag)
            return false;

        array_push($this->form->invited, $this->tag);

        $this->tag = null;
        // $this->users = $this->users->filter(fn($user) => !in_array($user->id, $this->form->invited));
    }
    public function removeItem(int $id) {
        unset($this->form->invited[$id]);
    }
    // public function rendered($view, $html) {
    //     $this->dispatch('meeting-send-request', tags: array_filter($this->users, fn($user) => in_array($user['id'], $this->form->invited)) );
    // }
    public function render()
    {
        return view('tasks::livewire.actions.meeting-action');
    }
}
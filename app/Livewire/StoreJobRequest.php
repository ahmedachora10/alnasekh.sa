<?php

namespace App\Livewire;

use App\Livewire\Forms\JobRequestForm;
use App\Mail\JobRequestSubmitted;
use App\Models\JobCity;
use App\Models\JobPost;
use App\Models\JobRequest;
use App\Models\User;
use App\Notifications\ClientActionNotification;
use App\Services\UploadFileService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class StoreJobRequest extends Component
{
    use WithFileUploads;

    protected UploadFileService $uploadFileService;

    public JobRequestForm $form;

    public $jobs = [];
    public $jobCities = [];

    #[Validate([
        'attachments.*' => 'file',
    ])]
    public $attachments = [];

    public function mount() {
        $this->uploadFileService = new UploadFileService;
        $this->jobs = JobPost::all();
        $this->jobCities = JobCity::all();
    }

    public function save() {
        $this->validate();

        $this->uploadFileService = new UploadFileService;

        DB::transaction(function () {
            $jobRequest = JobRequest::create($this->form->except('cv') + ['cv' => $this->uploadFileService->store($this->form->cv, 'jobs/cv')]);

            if(count($this->attachments) > 0) {
                foreach ($this->attachments as $attachment) {
                    $jobRequest->attachments()->create(['file' => $this->uploadFileService->store($attachment, 'jobs/attachments')]);
                }
            }

            $admins = Cache::remember('new-post-job-request-admin', now()->addDay(), fn() => User::whereHasRole('admin')->get());

            Notification::send($admins, new ClientActionNotification([
                'title' => ' طلب توظيف جديد',
                'content' => 'تم تقديم طلب توظيف على  ' . $jobRequest->jobPost?->title,
                'model' => JobRequest::class,
            ]));

            Mail::to($admins)->send(new JobRequestSubmitted($jobRequest));

            $this->form->reset();
            $this->reset('attachments');
            // session()->flash('success', trans('message.create'));
            $this->dispatch('alert-message-prompte', message: 'تم التقديم بنجاح');
        });

        $this->dispatch('close-modal', target:'#jobsForm');

    }

    public function render()
    {
        return view('livewire.store-job-request');
    }
}
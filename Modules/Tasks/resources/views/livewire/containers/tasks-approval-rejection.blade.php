<div>
    <ul class="list-unstyled mb-0">

    <li @class(['mb-4', 'd-none' => !$showReason])>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <h4 class="alert-heading d-flex align-items-center fs-4">
            <span class="alert-icon rounded-circle">
                <i class="bx bx-question-mark fs-3"></i>
            </span>
            {{trans('Reason')}}
            </h4>
            <hr>
            <p class="mb-0">{{ $comment }}</p>
            <button style="box-shadow: none !important;background-color: transparent; top: 2rem; left: 2rem;" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </li>

    <li @class(['mb-4', 'd-none' => !$open])>
        <div class="row justify-content-between align-items-start">
            <div class="col-md-10 col-9">
                <x-dashboard.input-group type="text" name="comment" wire:model.defer='comment' title="" placeholder="سبب الرفض ..." />
            </div>
            <button wire:click="reject({{$taskId}})" class="btn btn-primary btn-md col-md-2 col-3">{{trans('common.save')}}</button>
        </div>
    </li>

    @foreach ($items as $item)
        @php
            $task = $item->task;
            $employee = $item->employee;
        @endphp
        <li class="mb-4">
            <div class="d-flex align-items-center">
                <div class="d-flex align-items-center">
                    <div class="avatar me-2">
                        <img src="{{asset($employee?->thumbnail)}}"
                            alt="Avatar" class="rounded-circle">
                    </div>
                    <div class="me-2">
                        <h6 class="mb-0">{{ $employee?->name }}</h6>
                        <small>{{ $task->name }}</small>
                    </div>
                </div>
                <div class="ms-auto">
                    @if($item->pending)
                    <div class="d-flex align-items-center justify-content-start">
                        <a href="javascript:;" wire:click="accept({{$item}})"><span class="badge bg-label-success">{{ trans('Accept') }}</span></a>
                        <a href="javascript:;" wire:click="commentForm({{$item->id}})"><span class="badge bg-label-danger ms-2">{{ trans('Reject') }}</span></a>
                    </div>
                    @elseif($item->rejected && $item->comment == '')
                    <a href="javascript:;"><span class="badge bg-label-secondary ms-2">الغاء</span></a>
                    @else
                        <a href="javascript:;"><span class="badge bg-label-{{$item->status->color()}} ms-2">{{ $item->status->label() }}</span></a>
                        @if($item->comment != '')
                        <a href="javascript:;" wire:click='reason("{{$item->comment}}")'><span class="badge bg-label-warning ms-2"> {{trans('Reason')}} </span></a>
                        @endif
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>

<div class="mt-3">{{ $items->links() }}</div>
</div>

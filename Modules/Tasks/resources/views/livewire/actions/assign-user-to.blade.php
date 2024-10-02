<div>
    <div class="text-center mb-4">
        <h4 class="mb-2">
            تعيين موظف جديد
        </h4>
    </div>

    <h5 class="ms-4 ms-md-0 ps-md-6 mb-3">المستخدمين "{{$users->count()}}"</h5>
    <ul class="p-0 m-0 mx-4 mx-md-0 px-md-6">
        @foreach ($users as $user)
        @php
        $currentUser = $this->currentEmployee($user->id);
        @endphp
        <li class="d-flex flex-wrap mb-4">
            <div class="avatar me-4">
                <img src="{{$user->thumbnail}}" alt="avatar" class="rounded-circle">
            </div>
            <div class="d-flex justify-content-between flex-grow-1">
                <div class="me-2">
                    <p class="mb-0 text-heading">{{$user->name}}</p>
                    <p class="small mb-0 text-primary">{{implode(' - ',$user->roles->pluck('name')->toArray())}}</p>
                </div>
                <div class="dropdown">
                    <button type="button" wire:click="assign({{$user}})"
                        class="btn btn-text-{{$currentUser ? 'secondary' : 'primary'}}  p-2 text-{{$currentUser ? 'secondary' : 'primary'}}">
                        <span class="me-2 d-none d-sm-inline-block">
                            {{ $currentUser ? 'الحالي' : 'تعيين' }}
                        </span>
                    </button>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="">
        {{$users->links()}}
    </div>
</div>

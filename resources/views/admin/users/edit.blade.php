<x-app-layout>

    <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-dashboard.cards.sample column="col-12">

            <div class="row">

                <div class="col-12 mb-3">
                    <img width="100" height="100" src="{{ asset($user->thumbnail) }}" alt="avatar-{{ $user->name }}"
                        class="img-thumbnail">
                    <x-dashboard.input-group type="file" name="avatar" :title="trans('table.columns.image')" />
                    <x-size-notice key="user" />
                </div> {{-- / Name --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" :value="$user->name" name="name" :title="trans('table.columns.name')" />
                </div> {{-- / Name --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="email" :value="$user->email" name="email" :title="trans('table.columns.email')" />
                </div> {{-- / Display Name --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="password" name="password" :title="trans('table.columns.password')" />
                </div> {{-- / Password --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="password" name="password_confirmation" :title="trans('table.columns.password confirmation')" />
                </div> {{-- / Password --}}

                <hr class="col-12 my-5">

                @foreach ($roles as $role)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
                        <x-dashboard.options.option1 :title="$role->display_name" :value="$role->id" name="roles[]"
                            :checked="in_array($role->id, $user->roles->pluck('id')->toArray())" />
                    </div>
                @endforeach
            </div>


            <div class="col-12">
                <x-dashboard.button type="submit" name="Save" class="btn-primary" />
            </div>
        </x-dashboard.cards.sample>

    </form>

</x-app-layout>

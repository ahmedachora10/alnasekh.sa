<x-app-layout>
    <form action="{{ route('profile.update', $user) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <x-dashboard.cards.sample column="col-12">

            <div class="row">

                <div class="col-12 mb-3">
                    <img width="100" height="100" src="{{ asset($user->thumbnail) }}" alt="avatar-{{ $user->name }}"
                        class="img-thumbnail mb-4">
                    <x-dashboard.input-group type="file" name="avatar" :title="trans('table.columns.image')" />
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
            </div>


            <div class="col-12">
                <x-dashboard.button type="submit" name="Save" class="btn-primary" />
            </div>
        </x-dashboard.cards.sample>

    </form>
</x-app-layout>

<x-app-layout>

    <form action="{{ route('users.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-dashboard.cards.sample column="col-12">

            <div class="row">

                <div class="col-12 mb-3">
                    <x-dashboard.input-group type="file" name="avatar" :title="trans('table.columns.image')" />
                    <x-size-notice key="user" />
                </div> {{-- / Name --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" name="name" :title="trans('table.columns.name')" />
                </div> {{-- / Name --}}

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="email" name="email" :title="trans('table.columns.email')" />
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
                        <x-dashboard.options.option1 :title="$role->display_name" :value="$role->id" name="roles[]" />
                    </div>
                @endforeach

            </div>


            <div class="col-12">
                <x-dashboard.button type="submit" name="Save" class="btn-primary mt-3" />
            </div>
        </x-dashboard.cards.sample>

    </form>

</x-app-layout>

<x-app-layout>

    <form action="{{ route('clients.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-dashboard.cards.sample column="col-12">

            <div class="row">

                <div class="col-md-4 col-sm-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" name="name" :title="trans('table.columns.name')" />
                </div>

                <div class="col-md-4 col-sm-6 col-12 mb-3">
                    <x-dashboard.input-group type="email" name="email" :title="trans('table.columns.email')" />
                </div>
                <div class="col-md-4 col-sm-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" name="phone" :title="trans('table.columns.phone')" />
                </div>

                <div class="col-sm-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" name="city" :title="trans('table.columns.city')" />
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="date" name="registration_at"
                        :title="trans('table.columns.created at')" />
                </div>
            </div>


            <div class="col-12">
                <x-dashboard.button type="submit" name="Save" class="btn-primary mt-3" />
            </div>
        </x-dashboard.cards.sample>

    </form>

</x-app-layout>

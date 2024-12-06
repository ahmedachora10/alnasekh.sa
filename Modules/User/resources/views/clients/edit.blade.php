<x-app-layout>

    <form action="{{ route('clients.update', $client) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-dashboard.cards.sample column="col-12">

            <div class="row">

                <div class="col-md-4 col-sm-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" :value="$client->name" name="name" :title="trans('table.columns.name')" />
                </div>

                <div class="col-md-4 col-sm-6 col-12 mb-3">
                    <x-dashboard.input-group type="email" :value="$client->email" name="email" :title="trans('table.columns.email')" />
                </div>
                <div class="col-md-4 col-sm-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" :value="$client->phone" name="phone" :title="trans('table.columns.phone')" />
                </div>

                <div class="col-sm-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" :value="$client->city" name="city" :title="trans('table.columns.city')" />
                </div>
                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="date" :value="$client->registration_at?->format('Y-m-d')" name="registration_at" :title="trans('table.columns.created at')" />
                </div>
            </div>


            <div class="col-12">
                <x-dashboard.button type="submit" name="Save" class="btn-primary" />
            </div>
        </x-dashboard.cards.sample>

    </form>

</x-app-layout>

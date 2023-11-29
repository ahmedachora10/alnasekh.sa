<x-app-layout>

    <form action="{{ route('registries.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-dashboard.cards.sample column="col-12">

            <div class="row">

                <div class="col-12 mb-3">
                    <x-dashboard.input-group type="text" name="name" :title="trans('table.columns.name')" />
                </div>

                <div class="col-12">
                    <x-dashboard.button type="submit" name="Save" class="btn-primary mt-3" />
                </div>
            </div>

        </x-dashboard.cards.sample>

    </form>

</x-app-layout>
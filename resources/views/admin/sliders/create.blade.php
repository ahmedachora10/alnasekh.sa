<x-app-layout>

    <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-dashboard.cards.sample column="col-12">

            <div class="row">

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="file" name="image" :title="trans('table.columns.image')" />
                    <x-size-notice key="slider" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="file" name="image_en" :title="trans('table.columns.image en')" />
                    <x-size-notice key="slider" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" name="title" :title="trans('table.columns.title')" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" name="title_en" :title="trans('table.columns.title_en')" />
                </div>

                <div class="col-12 mb-3">
                    <x-dashboard.input-group type="number" min="1" name="delay" :title="trans('table.columns.delay')" />
                </div>

                <div class="col-12">
                    <x-dashboard.button type="submit" name="Save" class="btn-primary mt-3" />
                </div>
            </div>

        </x-dashboard.cards.sample>

    </form>

</x-app-layout>

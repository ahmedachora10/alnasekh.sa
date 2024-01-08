<x-app-layout>

    <form action="{{ route('our-services.update', $ourService) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-dashboard.cards.sample column="col-12">

            <div class="row align-items-end">

                <div class="col-md-6 col-12 mb-3">

                    <div class="mb-3">
                        <img src="{{ asset($ourService->thumbnail) }}" alt="image" width="60" height="60"
                            class="img-thumbnail">
                    </div>

                    <x-dashboard.input-group type="file" name="image" :title="trans('table.columns.image')" />
                    <x-size-notice key="our_special" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" :value="$ourService->title" name="title" :title="trans('table.columns.title')" />
                </div>

                <div class="col-12 mb-3">
                    <x-dashboard.input-group type="text" name="description" :value="$ourService->description" :title="trans('table.columns.description')" />
                </div>

                <div class="col-12">
                    <x-dashboard.button type="submit" name="Save" class="btn-primary mt-3" />
                </div>
            </div>

        </x-dashboard.cards.sample>

    </form>

</x-app-layout>

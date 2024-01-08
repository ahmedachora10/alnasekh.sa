<x-app-layout>

    <form action="{{ route('monthly-quarterly-update.update', $monthlyQuarterlyUpdate) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-dashboard.cards.sample column="col-12">

            <div class="row">

                <div class="col-12 mb-3">

                    <div class="mb-3">
                        <img src="{{ asset($monthlyQuarterlyUpdate->thumbnail) }}" alt="image" width="60"
                            height="60" class="img-thumbnail">
                    </div>

                    <x-dashboard.input-group type="file" name="image" :title="trans('table.columns.image')" />
                    <x-size-notice key="update" />
                </div>

                <div class="col-sm-6 mb-3">
                    <x-dashboard.input-group type="text" :value="$monthlyQuarterlyUpdate->entity_name" name="entity_name" :title="trans('table.columns.entity name')" />
                </div> {{-- / Name --}}

                <div class="col-sm-6 mb-3">
                    <x-dashboard.input-group type="text" :value="$monthlyQuarterlyUpdate->mission" name="mission" :title="trans('table.columns.mission')" />
                </div> {{-- / Name --}}

                <div class="col-12">
                    <x-dashboard.button type="submit" name="Save" class="btn-primary mt-3" />
                </div>
            </div>

        </x-dashboard.cards.sample>

    </form>

</x-app-layout>

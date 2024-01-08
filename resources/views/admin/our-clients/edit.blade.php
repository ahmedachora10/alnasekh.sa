<x-app-layout>

    <form action="{{ route('our-clients.update', $ourClient) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-dashboard.cards.sample column="col-12">

            <div class="row align-items-end">

                <div class="col-12 mb-3">

                    <div class="mb-3">
                        <img src="{{ asset($ourClient->thumbnail) }}" alt="image" width="60" height="60"
                            class="img-thumbnail">
                    </div>

                    <x-dashboard.input-group type="file" name="image" :title="trans('table.columns.image')" />
                    <x-size-notice key="our_client" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" :value="$ourClient->company_name" name="company_name" :title="trans('table.columns.company name')" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" :value="$ourClient->company_name_en" name="company_name_en"
                        :title="trans('table.columns.company name en')" />
                </div>
                <div class="col-12 mb-3">
                    <x-dashboard.input-group type="text" :value="$ourClient->link" name="link" :title="trans('table.columns.link')" />
                </div>

                <div class="col-12">
                    <x-dashboard.button type="submit" name="Save" class="btn-primary mt-3" />
                </div>
            </div>

        </x-dashboard.cards.sample>

    </form>

</x-app-layout>

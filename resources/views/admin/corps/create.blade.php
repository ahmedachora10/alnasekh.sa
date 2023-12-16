<x-app-layout>

    <x-dashboard.wizard.wizard-head current="corps" :branch="false" />

    <div class="mb-3"></div>

    <form action="{{ route('corps.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <x-dashboard.cards.sample column="col-12">

            <div class="row">

                <div class="col-12 mb-3">
                    <x-dashboard.input-group type="file" name="image" :title="trans('table.columns.image')" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" name="name" :title="trans('table.columns.corp name')" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" name="administrator_name" :title="trans('table.columns.administrator name')" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="email" name="email" :title="trans('table.columns.email')" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" name="phone" class="phone-number" :title="trans('table.columns.phone')" />
                </div>

                <div class="col-12 mb-3">
                    <x-dashboard.input-group type="number" name="commercial_registration_number" :title="trans('table.columns.commercial registration number')" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="date" name="start_date" :title="trans('table.columns.start date')" />
                </div>

                <div class="col-md-6 col-12 mb-4">
                    <x-dashboard.input-group type="date" name="end_date" :title="trans('table.columns.end date')" />
                </div>

                <div class="col-12 my-2"></div>
                <div class="col-12">
                    <x-dashboard.label> {{ trans('common.there is more branch') }} </x-dashboard.label>
                </div>
                @foreach ($hasBranches as $option)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
                        <x-dashboard.options.option1 icon="bx bx-list-check" :title="$option->name()" type="radio"
                            :value="$option->value" name="has_branches" :color="$option->color()" />
                    </div>
                @endforeach

            </div>


            <div class="col-12">
                <x-dashboard.button type="submit" class="btn-primary mt-4" />
            </div>
        </x-dashboard.cards.sample>

    </form>

</x-app-layout>

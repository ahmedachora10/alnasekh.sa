<x-app-layout>

    <form action="{{ route('corps.update', $corp) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <x-dashboard.cards.sample column="col-12">

            <div class="row">

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" :value="$corp->name" name="name" :title="trans('table.columns.name')" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="text" :value="$corp->administrator_name" name="administrator_name"
                        :title="trans('table.columns.administrator name')" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="email" :value="$corp->email" name="email" :title="trans('table.columns.email')" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="number" :value="$corp->phone" name="phone" :title="trans('table.columns.phone')" />
                </div>

                <div class="col-12 mb-3">
                    <x-dashboard.input-group type="number" :value="$corp->commercial_registration_number" name="commercial_registration_number"
                        :title="trans('table.columns.commercial registration number')" />
                </div>

                <div class="col-md-6 col-12 mb-3">
                    <x-dashboard.input-group type="date" :value="$corp->date('start_date')" name="start_date" :title="trans('table.columns.start date')" />
                </div>

                <div class="col-md-6 col-12 mb-4">
                    <x-dashboard.input-group type="date" :value="$corp->date('end_date')" name="end_date" :title="trans('table.columns.end date')" />
                </div>

                <div class="col-12 my-2"></div>

                @foreach ($hasBranches as $option)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12 mb-2">
                        <x-dashboard.options.option1 icon="bx bx-list-check" :title="$option->name()" type="radio"
                            :value="$option->value" :checked="$corp->has_branches == $option" name="has_branches" :color="$option->color()" />
                    </div>
                @endforeach
                <x-dashboard.error field="has_branches" />

            </div>


            <div class="col-12">
                <x-dashboard.button type="submit" name="Save" class="btn-primary mt-4" />
            </div>

        </x-dashboard.cards.sample>

    </form>

</x-app-layout>

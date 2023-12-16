<x-app-layout>
    {{-- <x-dashboard.headline :title="$corp->name" /> --}}

    <div class="row">

        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-widget-separator-wrapper">
                    <div class="card-body card-widget-separator">
                        <div class="row gy-4 gy-sm-1">
                            <div class="col-sm-6 col-lg-6">
                                <x-dashboard.cards.card-widget :name="trans('common.branches')" :total="$corp->branches_count"
                                    icon="bx bx-git-branch" color="primary" />
                                <hr class="d-none d-sm-block d-lg-none me-4">
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <x-dashboard.cards.card-widget :name="trans('common.employees')" :total="$corp->branches->sum('employees_count')" icon="bx bx-user-pin"
                                    color="info" :last="true" />
                                <hr class="d-none d-sm-block d-lg-none">
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            @if (!$corp->doesnt_has_branches)
                <div class="col-12 mb-4">
                    <div class="card">
                        <h5 class="card-header">{{ trans('common.branches') }}</h5>
                        <div class="card-body">
                            <livewire:dashboard.branches-container :corp="$corp" theme="branches-container2" />
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="col-md-4 col-sm-6">
            <x-dashboard.cards.user-corp-card :name="$corp->administrator_name" :image="asset($corp->thumbnail)" :startDate="$corp->date('start_date')" :endDate="$corp->date('end_date')" />
        </div>

    </div>
</x-app-layout>

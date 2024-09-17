<section>
    <x-dashboard.alert key="date" color="danger" />

    @if ($createMode)
        <x-dashboard.wizard.wizard-head current="monthly_quarterly_updates" :branch="$branch" />
        <div class="mb-3"></div>
    @endif

    <div class="row mb-4 py-4 bg-light">
        @foreach ($getAllMonthlyQuarterlyUpdate as $item)
            @php
                $savedItem = $savedRecords->contains('id', $item->id);
            @endphp
            <div class="col-lg-4 col-md-4 col-6 mb-4">
                <div @class([
                    'px-3 py-2 shadow-sm rounded-1 border',
                    'border-3 border-primary' => in_array($item->id, $checkedElements),
                ])>
                    <div class="mb-2">
                        <div class="input-group mb-3">
                            @if ($savedItem)
                                <div class="form-control" readonly aria-label="date">
                                    {{ $savedRecords->firstWhere('id', $item->id)->updates->date }}
                                </div>
                            @else
                                <input type="date" class="form-control" wire:model.defer="date" aria-label="date"
                                    aria-describedby="date" min="{{ date('Y-m-d') }}" />
                            @endif
                            <button @class([
                                'btn',
                                'btn-outline-primary' => !in_array($item->id, $checkedElements),
                                'btn-danger' => in_array($item->id, $checkedElements),
                            ]) wire:click="switchElement({{ $item }})"
                                type="button" id="button-addon1">
                                @if ($savedItem)
                                    <i class="bx bx-trash text-white"></i>
                                @else
                                    تحديد
                                @endif
                            </button>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="text-primary">{{ $item->entity_name }}</h5>
                    </div>
                    <article class=" text-gray">
                        {{ $item->mission }}
                    </article>
                </div>
            </div>
        @endforeach

        @if ($createMode)
            @if ($savedRecords->count() > 0)
                <div class="col-12">
                    <a href="{{ route('branches.employees.store', $branch) }}"
                        class="btn btn-primary float-end mt-2">{{ trans('common.next') }}</a>
                </div>
            @endif
        @endif
    </div>

</section>

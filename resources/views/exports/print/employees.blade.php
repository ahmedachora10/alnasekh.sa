<x-export-layout>
    <h4 class="text-primary text-center">{{ $title }}</h4>
    {{-- <x-dashboard.tables.table1 :responsive="false" :withActions="false" :withId="false" :columns="[
        'employee name',
        'resident number',
        'employee start date',
        'employee end date',
        'business card start date',
        'business card end date',
        'contract start date',
        'contract end date',
    ]"> --}}
    {{-- <tr>
                <td>
                    {{ $item->name }}
                </td>
                <td>
                    {{ $item->resident_number }}
                </td>

                <td>{{ $item->start_date?->format('Y-m-d') }}</td>
                <td>{{ $item->end_date?->format('Y-m-d') }}</td>

                <td>{{ $item->business_card_start_date?->format('Y-m-d') }}</td>
                <td>{{ $item->business_card_end_date?->format('Y-m-d') }}</td>

                <td>{{ $item->contract_start_date?->format('Y-m-d') }}</td>
                <td>{{ $item->contract_end_date?->format('Y-m-d') }}</td>

            </tr> --}}
    <div class="bg-white mx-auto" style="width: 690px;">
        @forelse ($data as $item)
            <div class="col-12 my-2">
                <!-- About User -->
                <div class="row">
                    <div class="col-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <small class="text-muted text-uppercase">معومات الموظف</small>
                                <ul class="list-unstyled mb-4 mt-3">
                                    <li class="d-flex align-items-center mb-3"><span
                                            class="fw-medium mx-2">{{ trans('table.columns.name') }} : </span>
                                        <span>{{ $item->name }}</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><span
                                            class="fw-medium mx-2">{{ trans('table.columns.nationality') }} : </span>
                                        <span>{{ $item->nationality->name() }}</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><span class="fw-medium mx-2">
                                            {{ trans('table.columns.resident number') }} : </span>
                                        <span>{{ $item->resident_number }}</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><span
                                            class="fw-medium mx-2">{{ trans('table.columns.employee start date') }} :
                                        </span>
                                        <span>{{ $item->start_date?->format('Y-m-d') ?? '-' }}</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><span
                                            class="fw-medium mx-2">{{ trans('table.columns.employee end date') }} :
                                        </span>
                                        <span>{{ $item->end_date?->format('Y-m-d') ?? '-' }}</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><span
                                            class="fw-medium mx-2">{{ trans('table.columns.business card start date') }}
                                            :
                                        </span>
                                        <span>{{ $item->business_card_start_date?->format('Y-m-d') ?? '-' }}</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><span
                                            class="fw-medium mx-2">{{ trans('table.columns.business card start date') }}
                                            :
                                        </span>
                                        <span>{{ $item->business_card_end_date?->format('Y-m-d') ?? '-' }}</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><span
                                            class="fw-medium mx-2">{{ trans('table.columns.business card start date') }}
                                            :
                                        </span>
                                        <span>{{ $item->contract_start_date?->format('Y-m-d') ?? '-' }}</span>
                                    </li>
                                    <li class="d-flex align-items-center mb-3"><span
                                            class="fw-medium mx-2">{{ trans('table.columns.business card start date') }}
                                            :
                                        </span>
                                        <span>{{ $item->contract_end_date?->format('Y-m-d') ?? '-' }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card mb-4">
                            <div class="card-body">
                                <small class="text-muted text-uppercase"> التأمين الطبي </small>
                                @if ($item->medicalInsurance)
                                    <ul class="list-unstyled mb-4 mt-3">
                                        <li class="d-flex align-items-center mb-3"><span
                                                class="fw-medium mx-2">{{ trans('table.columns.company') }} : </span>
                                            <span>{{ $item->medicalInsurance?->company }}</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3"><span class="fw-medium mx-2">
                                                {{ trans('table.columns.policy') }} : </span>
                                            <span>{{ $item->medicalInsurance?->policy }}</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3"><span class="fw-medium mx-2">
                                                {{ trans('table.columns.type') }} : </span>
                                            <span>{{ $item->medicalInsurance?->type }}</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3"><span
                                                class="fw-medium mx-2">{{ trans('table.columns.start date') }} :
                                            </span>
                                            <span>{{ $item->medicalInsurance?->start_date?->format('Y-m-d') ?? '-' }}</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3"><span
                                                class="fw-medium mx-2">{{ trans('table.columns.end date') }} :
                                            </span>
                                            <span>{{ $item->medicalInsurance?->end_date?->format('Y-m-d') ?? '-' }}</span>
                                        </li>
                                    </ul>
                                @else
                                    <span class="d-block fw-bold mt-2">غير متوفر</span>
                                @endif
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <small class="text-muted text-uppercase"> الكرت الصحي </small>
                                @if ($item->healthCardPaper)
                                    <ul class="list-unstyled mb-4 mt-3">
                                        <li class="d-flex align-items-center mb-3"><span
                                                class="fw-medium mx-2">{{ trans('table.columns.certificate number') }}
                                                :
                                            </span>
                                            <span>{{ $item->healthCardPaper?->certificate_number }}</span>
                                        </li>

                                        <li class="d-flex align-items-center mb-3"><span
                                                class="fw-medium mx-2">{{ trans('table.columns.start date') }} :
                                            </span>
                                            <span>{{ $item->healthCardPaper?->start_date?->format('Y-m-d') ?? '-' }}</span>
                                        </li>
                                        <li class="d-flex align-items-center mb-3"><span
                                                class="fw-medium mx-2">{{ trans('table.columns.end date') }} :
                                            </span>
                                            <span>{{ $item->healthCardPaper?->end_date?->format('Y-m-d') ?? '-' }}</span>
                                        </li>
                                    </ul>
                                @else
                                    <span class="d-block fw-bold mt-2">غير متوفر</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ About User -->
            </div>
            <hr>
        @empty
            <tr>
                <td>{{ trans('table.empty') }}</td>
            </tr>
        @endforelse
    </div>
    {{-- </x-dashboard.tables.table1> --}}
</x-export-layout>

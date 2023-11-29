<x-app-layout>
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="card-title m-0">متطلبات ملف العميل</h5>
        </div>
        <div class="card-body">
            <ul class="timeline pb-0 mb-0">
                @foreach ($requirements as $name => $status)
                    @php
                        $value = $status ? trans('common.yes') : trans('common.no');
                        $color = $status ? 'primary' : 'danger';
                    @endphp
                    <li class="timeline-item timeline-item-transparent border-{{ $color }}">
                        <span class="timeline-point-wrapper"><span
                                class="timeline-point timeline-point-{{ $color }}"></span></span>
                        <div class="timeline-event">
                            <div class="timeline-header">
                                <h6 @class(['mb-0', 'text-danger' => !$status])>{{ $name }}</h6>
                                <span class=" text-{{ $color }} fw-bold">{{ $value }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <div>
        @if ($corp->doesnt_has_branches)
            <a href="{{ route('corps.index') }}" class="btn btn-dark float-end">
                <i class="bx bx-show me-2"></i>
                {{ trans('common.corps page') }}
            </a>
        @else
            <a href="{{ route('branches.index', $corp) }}?target=branches" class="btn btn-dark float-end">
                <i class="bx bx-show me-2"></i>
                {{ trans('common.branches page') }}
            </a>
        @endif
    </div>
</x-app-layout>

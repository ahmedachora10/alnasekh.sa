<x-app-layout>


    <form method="post" action="{{ route('settings.store') }}" class="form-horizontal" role="form"
        enctype="multipart/form-data">
        {!! csrf_field() !!}

        @if (count(config('setting_fields', [])))

            @foreach (config('setting_fields') as $section => $fields)
                <x-dashboard.cards.sample column="col-md-12">
                    <div class="panel panel-info">
                        <div class="panel-heading mb-2 fs-5 fw-bold">
                            @if ($fields['icon'] !== '')
                                <i class="{{ $fields['icon'] }}"></i>
                            @endif
                            @if ($fields['title'])
                                {{ trans('settings.' . strtolower($fields['title'])) }}
                            @endif
                        </div>

                        @if ($fields['desc'])
                            <div class="panel-body">
                                <p class="text-muted">{{ trans('settings.' . strtolower($fields['desc'])) }}</p>
                            </div>
                        @endif

                        <div class="panel-body">
                            <div class="row">
                                @foreach ($fields['elements'] as $field)
                                    @includeIf('admin.common.settings.fields._' . $field['type'])
                                    {{-- <x-admin.setting.field.text :field="$field" class="my-2 col-md-6 col-12" /> --}}
                                @endforeach
                            </div>
                        </div>

                    </div>
                    <!-- end panel for {{ $fields['title'] }} -->
                </x-dashboard.cards.sample>
            @endforeach

        @endif

        <div class="row m-b-md">
            <div class="col-md-12">
                <button class="btn-primary btn">
                    {{ trans('settings.save') }}
                </button>
            </div>
        </div>
    </form>


</x-app-layout>

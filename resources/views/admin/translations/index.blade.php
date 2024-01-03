<x-app-layout>
    <div class="row">
        @foreach ($sections as $item)
            @php
                $section = 'front.' . $item->section;
            @endphp
            <div class="col-md-6 col-12">
                <h6 class="mt-4"> {{ trans($section) }} </h6>
                <div class="nav-align-top mb-3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" data-bs-toggle="tab"
                                data-bs-target="#headline-content-{{ $item->id }}" role="tab"
                                aria-selected="true">{{ trans('front.arabic') }}</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" data-bs-toggle="tab"
                                data-bs-target="#headline-content-en-{{ $item->id }}" role="tab"
                                aria-selected="false" tabindex="-1">{{ trans('front.english') }}</button>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="headline-content-{{ $item->id }}"
                            role="tabpanel">
                            <form action="{{ route('translation.update', $item) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <x-dashboard.input-group type="text" name="title" :value="$item->title"
                                            :title="trans('table.columns.title')" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-dashboard.input-group type="text" name="subtitle" :value="$item->subtitle"
                                            :title="trans('table.columns.subtitle')" />
                                    </div>
                                    <div class="col-12">
                                        <x-dashboard.input-group type="text" name="description" :value="$item->description"
                                            :title="trans('table.columns.description')" />
                                    </div>

                                </div>
                                <div class="pt-4">
                                    <button type="submit"
                                        class="btn btn-primary me-sm-3 me-1">{{ trans('common.save') }}</button>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane" id="headline-content-en-{{ $item->id }}" role="tabpanel">
                            <form action="{{ route('translation.update', $item) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <x-dashboard.input-group type="text" :value="$item->title_en" name="title_en"
                                            :title="trans('table.columns.title')" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-dashboard.input-group type="text" name="subtitle_en" :value="$item->subtitle_en"
                                            :title="trans('table.columns.subtitle')" />
                                    </div>
                                    <div class="col-12">
                                        <x-dashboard.input-group type="text" name="description_en" :value="$item->description_en"
                                            :title="trans('table.columns.description')" />
                                    </div>

                                </div>
                                <div class="pt-4">
                                    <button type="submit"
                                        class="btn btn-primary me-sm-3 me-1">{{ trans('common.save') }}</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>

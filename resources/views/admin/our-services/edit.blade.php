<x-app-layout>

    <div class="col-12">
        <form action="{{ route('our-services.update', $ourService) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="nav-align-top mb-3">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a style="cursor: pointer" class="nav-link active" data-bs-toggle="tab"
                            data-bs-target="#headline-content-service" role="tab"
                            aria-selected="true">{{ trans('front.arabic') }}</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a style="cursor: pointer" class="nav-link" data-bs-toggle="tab"
                            data-bs-target="#headline-content-en-service" role="tab" aria-selected="false"
                            tabindex="-1">{{ trans('front.english') }}</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="headline-content-service" role="tabpanel">
                        <div class="row g-3">


                            <div class="col-md-6 col-12 mb-3">

                                <div class="mb-3">
                                    <img src="{{ asset($ourService->thumbnail) }}" alt="image" width="60"
                                        height="60" class="img-thumbnail">
                                </div>

                                <x-dashboard.input-group type="file" name="image" :title="trans('table.columns.image')" />
                                <x-size-notice key="our_special" />
                            </div>

                            <div class="col-md-6 col-12 mb-3">
                                <x-dashboard.input-group type="text" :value="$ourService->title" name="title"
                                    :title="trans('table.columns.title')" />
                            </div>

                            <div class="col-12 mb-3">
                                <x-dashboard.input-group type="text" name="description" :value="$ourService->description"
                                    :title="trans('table.columns.description')" />
                            </div>
                            <div class="col-12">
                                <x-dashboard.button type="submit" name="Save" class="btn-primary mt-3" />
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane" id="headline-content-en-service" role="tabpanel">
                        <div class="row g-3">

                            <div class="col-12 mb-3">
                                <x-dashboard.input-group type="text" name="title_en" :value="$ourService->title_en"
                                    :title="trans('table.columns.title')" />
                            </div>

                            <div class="col-12 mb-3">
                                <x-dashboard.input-group type="text" name="description_en" :value="$ourService->description_en"
                                    :title="trans('table.columns.description')" />
                            </div>

                            <div class="col-12">
                                <x-dashboard.button type="submit" name="Save" class="btn-primary mt-3" />
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</x-app-layout>

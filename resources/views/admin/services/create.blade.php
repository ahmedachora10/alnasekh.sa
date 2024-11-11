<x-app-layout>
    <div class="col-12">
        <form action="{{ route('services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                                <x-dashboard.input-group type="file" name="image" :title="trans('table.columns.image')" />
                                <x-size-notice key="service" />
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <x-dashboard.input-group type="text" name="name" :title="trans('table.columns.name')" />
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <x-dashboard.input-group type="text" name="price" :title="trans('table.columns.price')" />
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <x-dashboard.input-group type="text" name="old_price" :title="trans('table.columns.old price')" />
                            </div>
                            <div class="col-12">
                                <x-dashboard.label>{{ trans('table.columns.description') }}</x-dashboard.label>
                                <textarea class="form-control" name="description" cols="10" rows="6"></textarea>
                                <x-dashboard.error field="description" />
                            </div>

                        </div>
                        <div class="pt-4">
                            <button type="submit"
                                class="btn btn-primary me-sm-3 me-1">{{ trans('common.save') }}</button>
                        </div>
                    </div>

                    <div class="tab-pane" id="headline-content-en-service" role="tabpanel">
                        <div class="row g-3">
                            <div class="col-12">
                                <x-dashboard.input-group type="text" name="name_en" :title="trans('table.columns.name')" />
                            </div>

                            <div class="col-12">
                                <x-dashboard.label>{{ trans('table.columns.description') }}</x-dashboard.label>
                                <textarea class="form-control" name="description_en" cols="10" rows="6"></textarea>
                                <x-dashboard.error field="description_en" />
                            </div>

                        </div>
                        <div class="pt-4">
                            <button type="submit"
                                class="btn btn-primary me-sm-3 me-1">{{ trans('common.save') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>

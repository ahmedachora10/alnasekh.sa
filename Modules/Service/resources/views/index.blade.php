<x-front-layout>
    <section style="padding: 10rem 0 3rem 0">
        <div class="container">
            <div class="col-md-8 col-10 mx-auto">
                <h5 class="text-secondary fw-bold mb-5">{{ trans('common.subscribe service request') }} "{{ $service->get_name }}"</h5>
                <livewire:service::store-request :service="$service" />
            </div>
        </div>
    </section>
</x-front-layout>

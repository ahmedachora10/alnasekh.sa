<x-front-layout>

    <section style="padding: 10rem 0 3rem 0">
        <div class="container">
            <div class="col-md-8 col-10 mx-auto">
                <h5 class="text-secondary mb-4">{{ trans('common.subscribe package request') }}</h5>
                <livewire:store-subscribe-package-request :package="$package" />
            </div>
        </div>
    </section>
</x-front-layout>

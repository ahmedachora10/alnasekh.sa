<x-front-layout>
    <section style="padding: 10rem 0 3rem 0">
        <div class="container">
            <div class="row g-4 pt-lg-3">
                <!-- Basic Plan: Start -->
                @foreach ($services as $service)
                <div class="col-lg-3 col-md-6">
                    <x-dashboard.cards.service-card :service="$service" />
                </div>
                @endforeach
                <!-- Basic Plan: End -->
            </div>
        </div>
    </section>
</x-front-layout>

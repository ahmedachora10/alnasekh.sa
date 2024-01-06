<x-front-layout>

    <section style="padding: 10rem 0 3rem 0">
        <div class="container">
            <div class="col-md-8 col-11 col-xl-6 mx-auto mb-4">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title m-0 me-2">{{ trans('front.new review') }}</h5>
                    </div>

                    <div class="card-body">

                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                            <script>
                                window.location.replace('/');
                            </script>
                        @endif

                        <form action="{{ route('reviews.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="rate" id="rating">

                            <div class="mb-3 mt-3">
                                <div id="rateYo"></div>
                                <x-dashboard.error field="rate" />
                            </div>

                            <div>
                                <x-dashboard.label>{{ trans('table.columns.comment') }}</x-dashboard.label>
                                <textarea wire:model.defer="comment" class="form-control" name="comment" cols="10" rows="6"></textarea>
                                <x-dashboard.error field="comment" />
                            </div>

                            <x-dashboard.button class="btn-primary mt-3" />

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    @endpush

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
        <script>
            $("#rateYo").rateYo({
                normalFill: "#A0A0A0",
                rtl: true,
                maxValue: 5
            });

            $("#rateYo").click(function() {
                const rating = $("#rateYo").rateYo("option", "rating");

                $('#rating').val(rating);

            });
        </script>
    @endpush
</x-front-layout>

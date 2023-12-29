<div>
    @if ($headline !== '')
        <div class="text-center mb-3 pb-1">
            <span class="badge bg-label-primary">{{ $headline }}</span>
        </div>
    @endif
    @if ($subHeadline !== '')
        <h3 class="text-center mb-1"><span class="section-title">{!! $subHeadline !!}</h3>
    @endif

    @if ($description !== '')
        <p class="text-center mb-4 mb-lg-5 pb-md-3">{!! $description !!}</p>
    @endif
</div>

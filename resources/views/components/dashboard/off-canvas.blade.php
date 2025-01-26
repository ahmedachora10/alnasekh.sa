@props(['headline' => null])
<div {{$attributes->merge(['class' => 'offcanvas'])}} data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScroll"
    aria-labelledby="offcanvasScrollLabel" aria-modal="true" role="dialog">
    @if($headline)
        <div class="offcanvas-header">
            <h5 id="title" class="offcanvas-title">{{ $headline }}</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
    @endif
    <div class="offcanvas-body my-auto mx-0 flex-grow-0">
        {{$slot}}
    </div>
</div>

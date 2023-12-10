<div class="modal fade {{ $show }}" id="{{ $id }}" tabindex="-1" style="{{ $style }}"
    aria-modal="true" role="dialog">
    <div class="modal-dialog modal-lg modal-simple modal-dialog-centered modal-add-new-role">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    @if ($title !== '')
                        <h3 class="role-title">{{ $title }}</h3>
                    @endif
                    @if ($description !== '')
                        <p>{{ $description }}</p>
                    @endif
                </div>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>

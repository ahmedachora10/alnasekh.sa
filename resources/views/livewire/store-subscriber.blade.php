<form class="footer-form" wire:submit.prevent="save">

    @if (session('success'))
        <span class="mb-2 d-block text-success">{{ session('success') }}</span>
    @endif

    <label for="footer-email" class="small">{{ trans('front.subscribe to newsletter') }}</label>
    <div class="d-flex mt-1">
        <input type="text" class="form-control rounded-0 rounded-start-bottom rounded-start-top" id="footer-email"
            placeholder="{{ trans('front.your phone') }}" wire:model.defer="phone">
        <button type="submit" class="btn btn-primary shadow-none rounded-0 rounded-end-bottom rounded-end-top"
            wire:click="save">
            {{ trans('front.subscribe') }}
        </button>
    </div>
    @error('phone')
        <span class="mt-2 d-block text-danger">{{ $message }}</span>
    @enderror
</form>

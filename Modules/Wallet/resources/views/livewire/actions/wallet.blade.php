<div class="d-flex justify-content-center align-items-center">
    <div class="col-md-6" wire:loading wire:ignore.self>
        <p class="placeholder-glow">
            <div class="d-flex align-items-center justify-content-center">
                <span class="placeholder placeholder-lg col-8"></span>
                <span class="placeholder placeholder-lg col-4 mx-2"></span>
            </div>
        </p>
    </div>
    <div @class(['col-md-6', 'd-none' => !$open]) wire:loading.remove>
        <div class="input-group has-validation">
            <x-dashboard.input type="text" name="wallet-action" wire:model.defer="balance" :value="$currentBalance" id="wallet-action"
                placeholder="الرصيد" />
            <button class="input-group-text bg-primary text-white" wire:click="operation">{{trans('common.'.strtolower($type?->label()))}}</button>
        </div>
        <x-dashboard.error field="balance" />
    </div>
</div>

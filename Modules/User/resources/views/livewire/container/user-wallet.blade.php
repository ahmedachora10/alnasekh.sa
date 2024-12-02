<div>
    <div class="row justify-content-between align-items-start">
        <div class="col-md-6">
            <livewire:wallet::container.wallet :balance="$balance" />
        </div>
        <div class="col-md-6">
            <livewire:wallet::container.points-wallet :points="$points" />
        </div>
        <div class="col-12 mt-5">
            <livewire:wallet::actions.wallet :currentBalance="$balance" :userId="$user?->id" />
        </div>
    </div>
</div>

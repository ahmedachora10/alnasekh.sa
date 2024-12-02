<x-cards.wallet :image="asset('assets/img/icons/unicons/cc-primary.png')" :amount="$balance ?? 0">
    <a class="dropdown-item" href="javascript:void(0);" wire:click="deposit">شحن</a>
    <a class="dropdown-item" href="javascript:void(0);" wire:click="withdraw">سحب</a>
</x-cards.wallet>

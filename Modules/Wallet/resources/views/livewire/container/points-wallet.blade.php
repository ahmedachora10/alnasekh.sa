<x-cards.wallet
    :image="asset('assets/img/icons/unicons/wallet-info.png')"
    :amount="$points ?? 0"
    :title="trans('common.points wallet')"
    currency="P"
>
    <a class="dropdown-item" href="javascript:void(0);" wire:click="convertPointsToBalance">تحويل</a>
</x-cards.wallet>

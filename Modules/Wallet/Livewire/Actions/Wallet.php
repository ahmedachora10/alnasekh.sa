<?php

namespace Modules\Wallet\Livewire\Actions;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\User\App\Services\ClientService;
use Modules\Wallet\App\DTO\WalletActionDTO;
use Modules\Wallet\App\Enums\TransactionType;
use Modules\Wallet\App\Rules\CheckWalletBalance;
use Modules\Wallet\App\Services\WalletService;

class Wallet extends Component
{
    public bool $open = false;
    public mixed $balance = 0;
    public ?int $userId = null;
    public float $currentBalance = 0;
    public ?TransactionType $type = null;

    #[On('wallet-type-action')]
    public function setType(int $userId, float $balance, int $type) {
        $this->userId = $userId;
        $this->currentBalance = $balance;
        $this->type = TransactionType::tryFrom($type);
        $this->open = true;
    }

    public function operation() {
        if (!$this->type || !$this->userId)
            return false;

        if ($this->type === TransactionType::Withdraw)
            return $this->withdraw();

        return $this->deposit();
    }

    private function deposit() {
        $this->validate(['balance' => ['required', 'decimal:0,2', 'min:1']]);
        app(WalletService::class)->increment(
            dto: new WalletActionDTO(
                userId: $this->userId,
                balance: $this->balance
            )
        );

        $this->refreshBalance();
        $this->reset('open', 'balance');
    }
    private function withdraw() {
        $this->validate(['balance' => ['required', 'decimal:0,2', 'min:1', new CheckWalletBalance($this->currentBalance)]]);
        app(WalletService::class)->decrement(
            dto: new WalletActionDTO(
                userId: $this->userId,
                balance: $this->balance
            )
        );

        $this->refreshBalance();
        $this->reset('open', 'balance');
    }

    public function refreshBalance() {
        $clientService = app(ClientService::class);

        $wallet = $clientService->wallet($this->userId);
        $pointsWallet = $clientService->piontsWallet($this->userId);

        if (!$wallet || !$pointsWallet)
            return false;

        $this->dispatch('set-balance', balance: $wallet?->balance, userId: $this->userId);
        $this->dispatch('set-points', points: $pointsWallet?->points, userId: $this->userId);
    }

    public function render()
    {
        return view('wallet::livewire.actions.wallet');
    }
}
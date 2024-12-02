<?php

namespace Modules\Wallet\Livewire\Container;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\Wallet\App\Enums\TransactionType;

class Wallet extends Component
{
    public ?int $userId = null;
    public float $balance = 0;

    #[On('set-balance')]
    public function setBalance(float $balance, int $userId) {
        $this->userId = $userId;
        $this->balance = $balance;
    }

    public function deposit() {
        $this->dispatch('wallet-type-action', type: TransactionType::Deposit, userId: $this->userId, balance:$this->balance);
    }
    public function withdraw() {
        $this->dispatch('wallet-type-action', type: TransactionType::Withdraw, userId: $this->userId, balance:$this->balance);
    }

    public function render()
    {
        return view('wallet::livewire.container.wallet');
    }
}
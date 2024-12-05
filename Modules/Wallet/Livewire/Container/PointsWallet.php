<?php

namespace Modules\Wallet\Livewire\Container;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\User\App\Services\ClientService;
use Modules\Wallet\App\DTO\PointsWalletActionDTO;
use Modules\Wallet\App\Services\WalletService;

class PointsWallet extends Component
{
    public ?int $userId = null;
    public float $points = 0;

    #[On('set-points')]
    public function setPoints(float $points, int $userId) {
        $this->userId = $userId;
        $this->points = $points;
    }

    public function convertPointsToBalance() {
        if ($this->points === 0)
            return false;

        app(WalletService::class)->convertPointsToBalance(
            dto: new PointsWalletActionDTO(
                userId: $this->userId,
                points: $this->points
            )
        );

        $wallet = app(ClientService::class)->wallet($this->userId);

        $this->dispatch('set-balance', balance: $wallet?->balance ?? 0, userId: $this->userId);
        $this->dispatch('set-points', points: 0, userId: $this->userId);

    }

    public function render()
    {
        return view('wallet::livewire.container.points-wallet');
    }
}
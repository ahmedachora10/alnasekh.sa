<?php

namespace Modules\User\Livewire\Container;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\User\App\Services\UserService;
use Modules\Wallet\App\Services\PointsWalletService;
use Modules\Wallet\App\Services\WalletService;

class UserWallet extends Component
{
    public ?User $user = null;

    public float $balance = 0;
    public float $points = 0;

    #[On('open-wallet')]
    public function openWallet(User $user) {
        $this->user = $user;

        $userService = app(UserService::class);

        $this->balance = $userService->wallet($user->id)?->balance ?? 0;
        $this->points = $userService->piontsWallet($user->id)?->points ?? 0;

        $this->dispatch('set-balance', balance: $this->balance, userId: $user->id);
        $this->dispatch('set-points', points: $this->points, userId: $user->id);

        $this->dispatch('open-modal', target: '#user-wallet');
    }

    public function render()
    {
        return view('user::livewire.container.user-wallet');
    }
}

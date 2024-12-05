<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;

class DashboardService {
    public function statistics() {
        $statisctis = DB::table('users')
            ->select([
                DB::raw('(SELECT COUNT(*) FROM users) as users_count'),
                DB::raw('(SELECT COUNT(*) FROM corps) as corps_count'),
                DB::raw('(SELECT COUNT(*) FROM job_posts) as jobs_count'),
                DB::raw('(SELECT COUNT(*) FROM subscribers) as subscribers_count'),
                DB::raw('(SELECT COUNT(*) FROM clients) as clients_count'),
            ])
            ->first();
        return new class(
            $statisctis->users_count,
            $statisctis->subscribers_count,
            $statisctis->corps_count,
            $statisctis->jobs_count,
            $statisctis->clients_count,
        ) {
            public function __construct(
                public readonly int $usersCount = 0,
                public readonly int $subscribersCount = 0,
                public readonly int $corpsCount = 0,
                public readonly int $jobsCount = 0,
                public readonly int $clientsCount = 0,
            ) {}
        };
    }
}

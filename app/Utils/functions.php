<?php

use App\Enums\Status;
use App\Models\CorpBranch;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\UserActionNotification;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Notification;

if (! function_exists('setting')) {

    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new Setting();
        }

        if (is_array($key)) {
            return Setting::set($key[0], $key[1]);
        }

        $value = app('settings')->firstWhere('name', $key);

        return is_null($value) ? value($default) : Setting::castValue($value->val, $value->type);
    }
}

if (!function_exists('ar_slug')) {

    function ar_slug(string $string, string $separator = '-')
    {
        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }
}

if (!function_exists('status_handler')) {

    function status_handler($date): Status
    {

        if (empty($date) || is_null($date)) {
            return Status::DEFAULT;
        }

        $currentDate = now();
        $endDate = Carbon::parse($date);

        $daysDiff = $endDate->diffInDays($currentDate);

        if ($endDate->isPast()) {
            return Status::FINISHED;
        }

        if ($endDate->isFuture() && $daysDiff > 30) {
            return Status::VALID;
        }

        return Status::ALMOST_FINISHED;
    }
}

if (!function_exists('short_date_name')) {

    function short_date_name(string $date)
    {
        $replacement = [
            'دقيقة' =>  'د',
            'دقائق' =>  'د',
            'ساعة' =>  'س',
            'يوم' =>  'ي',
            'أيام' =>  'ي',
            'شهر' =>  'ش',
            'سنة' =>  'ع',
        ];

        return str($date)->replace('منذ', '')->replace(array_keys($replacement), array_values($replacement));
    }
}

if (!function_exists('stepsChecker')) {

    function stepsChecker(CorpBranch $branch)
    {
        $subscriptions = $branch->subscriptions->count() > 0 ? true : null;
        $monthlyQuarterly = $branch->monthlyQuarterlyUpdates->count() > 0 ? true : null;
        $employees = $branch->employees->count() > 0 ? true : null;


        if ($branch->corp->corp_has_branches) {
            $stepsOfBranche = [
                'branches.record.store' => $branch->record,
                'branches.certificate.store' => $branch->certificate,
                'branches.civil_defense_permit.store' => $branch->civilDefenseCertificate,
            ];
        } else {
            $stepsOfBranche = [
                'branches.registries.store' => $branch->registries->count() > 0 ? true : null,
            ];
        }

        $steps = [
            'branches.subscription.store' => $subscriptions,
            'branches.monthly-quarterly-update.store' => $monthlyQuarterly,
            'branches.employees.store' => $employees,
        ];

        $steps = array_merge($stepsOfBranche, $steps);

        foreach ($steps as $key => $value) {
            if ($value !== null) continue;

            return ['text' => trans('common.uncompleted'), 'link' => route($key, $branch)];
        }

        return ['text' => trans('common.completed'), 'link' => '#'];
    }
}

if (!function_exists('go_back')) {
    function go_back()
    {
        // Retrieve the navigation history from the session
        $history = session()->get('my_history', []);

        // If history exists, pop the last entry
        if (!empty($history)) {
            $previousUrl = array_pop(array: $history);

            // Update the session with the new history
            session()->put('my_history', $history);

            // Redirect the user to the last page in the history
            return $previousUrl;
        }

        // Default: If no history exists, go to a fallback route (e.g., Dashboard)
        return '/dashboard';
    }
}

if(!function_exists('notify_admin')) {
    function notify_admin(array|Illuminate\Notifications\Notification|null $data) {

        if (!is_array($data) && !$data instanceof Illuminate\Notifications\Notification)
            logger("the notication doesn't supported as notification action");
            return null;

        if (is_array($data))
            $notification = new UserActionNotification($data);

        if($data instanceof Illuminate\Notifications\Notification)
            $notification = $data;

        Notification::send(
            notifiables: Cache::remember(
                key: 'notify-admins',
                ttl: now()->addDay(),
                callback: fn() => User::whereHasRole('admin')->get()
            ),
            notification: $notification
        );
    }
}

if(!function_exists('notify_user')) {
    function notify_user(User|Collection $notifiables, array|Illuminate\Notifications\Notification|null $data) {

        if (!is_array($data) && !$data instanceof Illuminate\Notifications\Notification)
            logger("the notication doesn't supported as notification action");
            return null;

        if (is_array($data))
            $notification = new UserActionNotification($data);

        if($data instanceof Illuminate\Notifications\Notification)
            $notification = $data;

        Notification::send(
            notifiables: $notifiables,
            notification: $notification
        );
    }
}


if (!function_exists('file_type')) {
    function file_type(string $type): object {



        $match = match ($type) {
            'image/jpeg' => ['icon' => 'bx bx-image', 'name' => __('Image')],
            'application/pdf' => ['icon' => 'bx bx-file', 'name' => __('Pdf')],
            'application/docx' => ['icon' => 'bx bx-file-doc', 'name' => __('Docx')],
            default => ['icon' => 'bx bx-file', 'name' => __('File')],
        };

        return (object) $match;
    }
}
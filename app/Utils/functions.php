<?php

use App\Enums\Status;
use App\Models\CorpBranch;
use App\Models\Setting;
use Carbon\Carbon;

if (! function_exists('setting')) {

    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new Setting();
        }

        if (is_array($key)) {
            return Setting::set($key[0], $key[1]);
        }

        $value = Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}

if(!function_exists('ar_slug')) {

    function ar_slug(string $string, string $separator = '-') {
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

if(!function_exists('status_handler')) {

    function status_handler($date) : Status {

        if(empty($date) || is_null($date)) {
            return Status::DEFAULT;
        }

        $currentDate = now();
        $endDate = Carbon::parse($date);

        $daysDiff = $endDate->diffInDays($currentDate);

        if($endDate->isPast()) {
            return Status::FINISHED;
        }

        if($endDate->isFuture() && $daysDiff > 30) {
            return Status::VALID;
        }

        return Status::ALMOST_FINISHED;
    }
}

if(!function_exists('short_date_name')) {

    function short_date_name(string $date) {
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

if(!function_exists('stepsChecker')) {

    function stepsChecker(CorpBranch $branch) {
        $subscriptions = $branch->subscriptions->count() > 0 ? true : null;
        $monthlyQuarterly = $branch->monthlyQuarterlyUpdates->count() > 0 ? true : null;
        $employees = $branch->employees->count() > 0 ? true : null;


        if($branch->corp->corp_has_branches) {
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
            if($value !== null) continue;

            return ['text' => trans('common.uncompleted'), 'link' => route($key, $branch)];
        }

        return ['text' => trans('common.completed'), 'link' => '#'];
    }
}
<?php

namespace App\Enums;

use App\Models\BranchCertificate;
use App\Models\BranchCivilDefenseCertificate;
use App\Models\BranchEmployee;
use App\Models\BranchRecord;
use App\Models\BranchSubscription;
use App\Models\Corp;
use App\Models\CorpBranch;
use App\Models\CorpBranchMonthlyQuarterlyUpdate;
use App\Models\CorpBranchRegistry;
use App\Models\EmployeeHealthCardPaper;
use App\Models\EmployeeMedicalInsurance;
use App\Models\MonthlyQuarterlyUpdate;
use App\Models\Registry;
use App\Models\User;

enum ActivityLogType:string {
    case Create = 'created';
    case Update = 'updated';
    case Delete = 'deleted';
    case Login = 'login';
    case LogOut = 'logout';
    case Email = 'email';
    case Whatsapp = 'whatsapp';

    public function name() {
        return match ($this) {
            self::Create => 'الاضافة',
            self::Update => 'التحديث',
            self::Delete => 'الحذف',
            self::Login => 'الدخول على الحساب',
            self::LogOut => 'الخروج من الحساب',
            self::Email => 'تذكير عبر الايميل',
            self::Whatsapp => 'تذكير عبر الواتساب',
        };
    }

    public function color() {
        return match ($this) {
            self::Create => 'primary',
            self::Update => 'info',
            self::Delete => 'danger',
            self::Login => 'warning',
            self::LogOut => 'secondary',
            self::Whatsapp => 'success',
            self::Email => 'success',
        };
    }

    public function content($model): string {
        $title = $this->prepareContent($model);
        return match ($this) {
            self::Create => 'تم اضافة ' . $title,
            self::Update => 'تم تحديث ' . $title,
            self::Delete => 'تم حذف ' . $title,
            self::Login => 'تم تسجيل الدخول من طرف ' . $title,
            self::LogOut => 'تم تسجيل الخروج من طرف ' . $title,
            self::Email => 'تذكير عبر الايميل - ' . $title,
            self::Whatsapp => 'تذكير عبر الواتساب - ' . $title,
        };
    }

    public function prepareContent($model): string {
        return match ($model::class) {
            Corp::class => 'المنشأة ' . $model->name,
            CorpBranch::class => 'الفرع '. $model->name,
            BranchRecord::class => 'الرخصة ' . $model->type,
            BranchCertificate::class => 'الرخصة ' . $model->type,
            BranchSubscription::class => 'الاشتراك ' . $model->subscription_type?->name(),
            BranchCivilDefenseCertificate::class => 'شهادة الدفاع المدني',
            BranchEmployee::class => 'الموظف ' . $model->name,
            EmployeeHealthCardPaper::class => 'الكارت الصحي للموظف ' . $model?->employee?->name,
            EmployeeMedicalInsurance::class => 'التأمين الطبي للموظف ' . $model?->employee?->name,
            MonthlyQuarterlyUpdate::class => 'التحديثات الشهرية و الربع السنوية ' .  $model->entity_name,
            CorpBranchMonthlyQuarterlyUpdate::class => 'التحديث الشهري والربع السنوي ' .  $model?->monthlyQuarterlyUpdate?->entity_name,
            CorpBranchRegistry::class => 'السجل ' .  $model?->registry?->name,
            CorpBranchRegistry::class => 'السجل ' . $model?->name,
            Registry::class => 'السجل ' . $model?->name,
            User::class => 'المستخدم ' . $model->name,
            default => 'Default'
        };
    }

    public static function getCorpBranchIds($model): array {
        return match ($model::class) {
            Corp::class => [
                'corp_id' => $model->id,
                'branch_id' => ''
            ],
            CorpBranch::class => [
                'corp_id' => $model->corp_id,
                'branch_id' => $model->id
            ],
            BranchRecord::class => [
                'corp_id' => $model->branch->corp_id,
                'branch_id' => $model->corp_branch_id
            ],
            BranchCertificate::class => [
                'corp_id' => $model->branch->corp_id,
                'branch_id' => $model->corp_branch_id
            ],
            BranchSubscription::class => [
                'corp_id' => $model->branch->corp_id,
                'branch_id' => $model->corp_branch_id
            ],
            BranchCivilDefenseCertificate::class => [
                'corp_id' => $model->branch->corp_id,
                'branch_id' => $model->corp_branch_id
            ],
            BranchEmployee::class => [
                'corp_id' => $model->branch->corp_id,
                'branch_id' => $model->corp_branch_id
            ],
            EmployeeHealthCardPaper::class => [
                'corp_id' => $model->employee?->branch?->corp_id,
                'branch_id' => $model->employee?->corp_branch_id
            ],
            EmployeeMedicalInsurance::class => [
                'corp_id' => $model->employee?->branch?->corp_id,
                'branch_id' => $model->employee?->corp_branch_id
            ],
            CorpBranchMonthlyQuarterlyUpdate::class => [
                'corp_id' => $model->branch?->corp_id,
                'branch_id' => $model->corp_branch_id
            ],
            CorpBranchRegistry::class => [
                'corp_id' => $model->employee?->branch?->corp_id,
                'branch_id' => $model->employee?->corp_branch_id
            ],
            Registry::class => [
                'corp_id' => $model->employee?->branch?->corp_id,
                'branch_id' => $model->employee?->corp_branch_id
            ],
            User::class => [],
            default => [
                'corp_id' => '',
                'branch_id' => ''
            ],
        };
    }
}
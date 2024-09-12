<?php

namespace App\Observers;

use App\Enums\ActivityLogType;
use App\Models\ActivityLog;
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
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ActivityLogsObserver
{

    public function __construct(protected ?string $className = null, protected ?string $title = null) {}
    public function created(Model|Pivot $model) {
        $this->createActivityLog(activityLogType: ActivityLogType::Create, title: $this->prepareModelContent($model));
    }
    public function updated(Model|Pivot $model) {
        $this->createActivityLog(activityLogType: ActivityLogType::Update, title: $this->prepareModelContent($model));
    }

    public function deleted(Model|Pivot $model) {
        $this->createActivityLog(activityLogType: ActivityLogType::Delete, title: $this->prepareModelContent($model));
    }
    public function login(Model|Pivot $model) {
        $this->createActivityLog(activityLogType: ActivityLogType::Login, title: $this->prepareModelContent($model));
    }

    public function sendEmail(Model|Pivot $model) {
        $this->createActivityLog(activityLogType: ActivityLogType::Email, title: $this->prepareModelContent($model));
    }
    public function sendWhatsapp(Model|Pivot $model) {
        $this->createActivityLog(activityLogType: ActivityLogType::Whatsapp, title: $this->prepareModelContent($model));
    }
    private function createActivityLog(ActivityLogType $activityLogType, string $title) {
        ActivityLog::create(attributes: [
            'user_id' => auth()->id(),
            'activity_type' => $activityLogType->value,
            'content' => $activityLogType->content($title)
        ]);
    }

    private function prepareModelContent(Model|Pivot $model): string {
        return match ($this->className ?? $model::class) {
            Corp::class => 'المنشأة ' . $model->name,
            CorpBranch::class => 'الفرع '. $model->name,
            BranchRecord::class => 'الرخصة ' . $model->type,
            BranchCertificate::class => 'الرخصة ' . $model->type,
            BranchSubscription::class => 'الاشتراك ' . $model->subscription_type?->name(),
            BranchCivilDefenseCertificate::class => 'شهادة الدفاع المدني',
            BranchEmployee::class => 'الموظف ' . $model->name,
            EmployeeHealthCardPaper::class => 'الكارت الصحي للموظف ' . $model?->employee?->name,
            EmployeeMedicalInsurance::class => 'التأمين الطبي للموظف ' . $model?->employee?->name,
            CorpBranchMonthlyQuarterlyUpdate::class => 'التحديثات الشهرية و الربع السنوية ' .  ($this->title !== null ? $this->title : $model?->entity_name),
            CorpBranchRegistry::class => 'السجل ' . ($model->registry ? $model?->registry?->name : $model?->name),
            User::class => 'المستخدم ' . $model->name,
        };
    }
}

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
use App\Models\Registry;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ActivityLogsObserver
{

    public function __construct(protected ?string $className = null, protected ?string $title = null, protected ?string $corpId = null) {}
    public function created(Model|Pivot $model) {
        $this->createActivityLog(activityLogType: ActivityLogType::Create,model: $model);
    }
    public function updated(Model|Pivot $model) {
        $this->createActivityLog(activityLogType: ActivityLogType::Update,model: $model);
    }

    public function deleted(Model|Pivot $model) {
        $this->createActivityLog(activityLogType: ActivityLogType::Delete,model: $model);
    }
    public function login(Model|Pivot $model) {
        $this->createActivityLog(activityLogType: ActivityLogType::Login,model: $model);
    }

    public function sendEmail(Model|Pivot $model) {
        $this->createActivityLog(activityLogType: ActivityLogType::Email,model: $model);
    }
    public function sendWhatsapp(Model|Pivot $model) {
        $this->createActivityLog(activityLogType: ActivityLogType::Whatsapp,model: $model);
    }
    private function createActivityLog(ActivityLogType $activityLogType, Model $model) {
        ActivityLog::create(attributes: [
            'user_id' => auth()->id(),
            'activity_type' => $activityLogType->value,
            'content' => $activityLogType->content($this->prepareModelContent($model)),
            'logable_id' => $model->id,
            'logable_type' => $model::class,
        ]);
    }

    private function prepareModelContent(Model|Pivot $model): string {
        return match ($this->className ?? $model::class) {
            Corp::class => 'المنشأة ' . $model->id,
            CorpBranch::class => 'الفرع '. $model->corp_id,
            BranchRecord::class => 'الرخصة ' . $model->branche,
            BranchCertificate::class => 'الرخصة ' . $model->type,
            BranchSubscription::class => 'الاشتراك ' . $model->subscription_type?->name(),
            BranchCivilDefenseCertificate::class => 'شهادة الدفاع المدني',
            BranchEmployee::class => 'الموظف ' . $model->name,
            EmployeeHealthCardPaper::class => 'الكارت الصحي للموظف ' . $model?->employee?->name,
            EmployeeMedicalInsurance::class => 'التأمين الطبي للموظف ' . $model?->employee?->name,
            CorpBranchMonthlyQuarterlyUpdate::class => 'التحديثات الشهرية و الربع السنوية ' .  ($this->title !== null ? $this->title : $model?->entity_name),
            CorpBranchRegistry::class => 'السجل ' . ($model->registry ? $model?->registry?->name : $model?->name),
            Registry::class => 'السجل ' . $model?->name,
            User::class => 'المستخدم ' . $model->name,
        };
    }

    // private function getCorpId(string $className): string {
    //     return match ($this->className ?? $model::class) {
    //         Corp::class => $model->id,
    //         CorpBranch::class => $model->name,
    //         BranchRecord::class => $model->type,
    //         BranchCertificate::class => $model->type,
    //         BranchSubscription::class =>$model->subscription_type?->name(),
    //         BranchCivilDefenseCertificate::class => ,
    //         BranchEmployee::class => $model->name,
    //         EmployeeHealthCardPaper::class =>  $model?->employee?->name,
    //         EmployeeMedicalInsurance::class =>$model?->employee?->name,
    //         CorpBranchMonthlyQuarterlyUpdate::class =>,
    //         CorpBranchRegistry::class => $model->registry,
    //         Registry::class => $model?->name,
    //         User::class => 'المستخدم ' . $model->name,
    //     };
    // }
}
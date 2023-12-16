<?php

namespace App\Livewire\Exports;

use App\Exports\BranchesExport;
use App\Exports\CertificatesExport;
use App\Exports\CorpsExport;
use App\Exports\EmployeesExport;
use App\Exports\EmployeesRequirementsExport;
use App\Exports\MonthlyQuarterlyExport;
use App\Exports\RecordsExport;
use App\Exports\RegistriesExport;
use App\Exports\ReportsExport;
use App\Exports\SubscriptionsExport;
use App\Models\Corp;
use App\Models\CorpBranch;
use Livewire\Attributes\On;
use Livewire\Component;
use Maatwebsite\Excel\Excel as ExcelFormat;
use Maatwebsite\Excel\Facades\Excel;

class ExportButton extends Component
{
    public ?CorpBranch $branch;
    public ?Corp $corp = null;

    public string $type = '';

    public ?string $title = null;

    public string $icon = 'bx bx-cloud-download';

    public string $style = '';

    public string $fileType = 'pdf';

    public function mount($title = null) {
        $this->title = $title ?? trans('common.export');
    }

    #[On('set-corp')]
    public function setCorp(Corp $corp) {
        $this->corp = $corp;
    }

    public function export() {
        if($this->fileType === 'pdf') {
            return $this->pdf();
        }

        return $this->docx();
    }

    private function pdf() {
        return match ($this->type) {
            'employees' => Excel::download(new EmployeesExport($this->branch->id), date('Y-m-d-H-i-s').'-employees.xlsx'),
            'all-employees' => Excel::download(new EmployeesRequirementsExport($this->corp->id, true), date('Y-m-d-H-i-s').'-employees.xlsx'),
            'corp' => Excel::download(new CorpsExport($this->corp->id), date('Y-m-d-H-i-s').'-corp.xlsx'),
            'corps' => Excel::download(new CorpsExport, date('Y-m-d-H-i-s').'-corps.xlsx'),
            'all-subscriptions' => Excel::download(new SubscriptionsExport($this->corp->id), date('Y-m-d-H-i-s').'-subscriptions.xlsx'),
            'all-monthly-quarterly-updates' => Excel::download(new MonthlyQuarterlyExport($this->corp->id), date('Y-m-d-H-i-s').'-monthly-and-quarterly-updates.xlsx'),
            'all-records' => Excel::download(new RecordsExport($this->corp->id), date('Y-m-d-H-i-s').'-records.xlsx'),
            'all-certificates' => Excel::download(new CertificatesExport($this->corp->id), date('Y-m-d-H-i-s').'-certificates.xlsx'),
            'all-registries' => Excel::download(new RegistriesExport($this->corp->id), date('Y-m-d-H-i-s').'-registries.xlsx'),
            'all-branches' => Excel::download(new BranchesExport($this->corp), date('Y-m-d-H-i-s').'-branches.xlsx'),
            'reports' => Excel::download(new ReportsExport($this->corp->id), date('Y-m-d-H-i-s').'-reports.xlsx'),
            default => ''
        };
    }

    private function docx() {
        return match ($this->type) {
            'corp' => redirect()->route('export.corps.all', $this->corp),
            'corps' => redirect()->route('export.corps.all'),
            'employees' => redirect()->route('export.corps.employees', $this->corp),
            'all-employees' => redirect()->route('export.corps.employees', $this->corp),
            'all-subscriptions' => redirect()->route('export.corps.subscriptions', $this->corp),
            'all-monthly-quarterly-updates' => redirect()->route('export.corps.monthly-quarterly-update', $this->corp),
            'all-records' => redirect()->route('export.corps.records', $this->corp),
            'all-certificates' => redirect()->route('export.corps.certificates', $this->corp),
            'all-registries' => redirect()->route('export.corps.registries', $this->corp),
            'all-branches' => redirect()->route('export.corps.branches', $this->corp),
            'reports' => redirect()->route('export.corps.reports', $this->corp),
            default => ''
        };
    }

    public function render()
    {
        return view('livewire.exports.export-button');
    }
}
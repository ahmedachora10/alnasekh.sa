<?php

namespace App\Http\Controllers\Admin;

use App\Enums\HasBranches;
use App\Http\Controllers\Controller;
use App\Models\Corp;
use App\Http\Requests\Admin\StoreCorpRequest;
use App\Http\Requests\Admin\UpdateCorpRequest;
use App\Models\CorpBranch;

class CorpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.corps.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hasBranches = HasBranches::cases();
        return view('admin.corps.create', compact('hasBranches'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCorpRequest $request)
    {
        $corp = Corp::create($request->validated());

        if($request->integer('has_branches') === HasBranches::Yes->value) {
            return redirect()->route('branches.index', ['corp' => $corp, 'target' => 'branches'])
            ->with('success', trans('message.create'));
        }

        $branch = $corp->branches()->create([
            'name' => $corp->name,
            'registration_number' => $corp->commercial_registration_number,
        ]);

        return redirect()->route('branches.registries.store', $branch)->with('success', trans('message.create'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Corp $corp)
    {
        $corp->load(
            [
                'branches' => function ($query) {
                    $query->with([
                        'record',
                        'certificate',
                        'subscriptions',
                        'monthlyQuarterlyUpdates',
                        'registries',
                        'employees'
                    ])->withCount('employees');
                }
            ]
        )->loadCount(['branches']);

        $records = [];

        foreach($corp->branches as $branch) {
            $records[] = $branch->record;
        }

        return view('admin.corps.show', compact('corp', 'records'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Corp $corp)
    {
        $hasBranches = HasBranches::cases();
        return view('admin.corps.edit', compact('corp', 'hasBranches'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCorpRequest $request, Corp $corp)
    {
        $corp->update($request->validated());
        return redirect()->route('corps.index')->with('success', trans('message.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Corp $corp)
    {
        $corp->delete();

        return redirect()->route('corps.index')->with('success', trans('message.delete'));
    }

    public function requirements(CorpBranch $branch) {

        $branch->load('corp', 'employees.healthCardPaper', 'employees.medicalInsurance');
        $corp = $branch->corp;

        //TODO: implement better solution for employees checker

        $monthly_quarterly_updates = $branch->monthlyQuarterlyUpdates->count() > 0;
        $employees = !$branch->doesntHave('employees')->exists();
        $healthPaper = !$branch->doesntHave('employees.healthCardPaper')->exists();
        $insurance = !$branch->doesntHave('employees.medicalInsurance')->exists();

        $requirements = [
            'ورقة التحديث الشهري والرفع سنوي' =>  $monthly_quarterly_updates,
            'ورقة الاقامات والعقود' =>  $employees,
            'وقة الكروت الصحية' =>  $healthPaper,
            'ورقة التأمين الطبي' =>  $insurance,
        ];

        if($corp->doesnt_has_branches) {
            $requirements = array_merge(['السجلات' => $branch->registries()->exists()], $requirements);
        } else {
            $requirements = array_merge(['الاشتراكات' =>  $branch->subscriptions()->count() === 4], $requirements);
            $requirements = array_merge(['التراخيص' =>  $branch->certificate()->exists()], $requirements);
            $requirements = array_merge(['السجلات' =>  $branch->record()->exists()], $requirements);
        }

        return view('admin.corps.requirements', compact('requirements', 'corp'));
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Corp;
use App\Models\CorpBranch;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Corp $corp)
    {
        return view('admin.branches.index', compact('corp'));
    }

    /**
     * Display a listing of the resource.
     */
    public function show(CorpBranch $branch)
    {
        $branch->load([
            'record',
            'certificate',
            'subscriptions',
            'monthlyQuarterlyUpdates',
            'registries',
            'employees'
        ])
        ->loadCount('employees');

        return view('admin.branches.show', compact('branch'));
    }
}
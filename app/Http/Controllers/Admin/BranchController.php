<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Corp;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Corp $corp)
    {
        return view('admin.branches.index', compact('corp'));
    }
}
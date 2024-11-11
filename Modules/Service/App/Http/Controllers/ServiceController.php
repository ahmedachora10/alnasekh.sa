<?php

namespace Modules\Service\App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function request(Service $service)
    {
        return view('service::index', compact('service'));
    }
}
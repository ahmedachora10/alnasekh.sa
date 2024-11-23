<?php

namespace Modules\Service\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\Service\App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Service\App\Services\Service as ServicesService;

class ServiceController extends Controller
{
    public function __construct(private ServicesService $service) {}
    /**
     * Display a listing of the resource.
     */
    public function request(Service $service)
    {
        return view('service::request', compact('service'));
    }

    public function services()
    {
        $services = $this->service->all();
        return view('service::services', compact('services'));
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\HeadlineTranslation;
use App\Models\OurClient;
use App\Models\OurService;
use App\Models\Package;
use App\Models\Review;
use Modules\Service\App\Models\Service;
use App\Models\Slider;
use App\Models\Statistic;
use Modules\Service\App\Services\Service as ServicesService;

class HomeController extends Controller
{
    public function __construct( private ServicesService $service ) {}
    public function index() {
        $sliders = Slider::all();
        $ourServices = OurService::all();
        $packages = Package::all();
        $clients = OurClient::all();
        $headlines = collect(HeadlineTranslation::all());

        view()->share('title', '');

        $statistics = Statistic::all();
        $reviews = Review::all();
        $services = $this->service->paginate(8);

        return view('home', compact('sliders', 'ourServices', 'services', 'packages', 'clients', 'statistics', 'headlines', 'reviews'));
    }
}
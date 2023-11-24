<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\UploadFileService;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class SettingController extends Controller
{
    public function __construct(protected UploadFileService $uploadFileService) {}

    public function index()
    {
        return view('admin.common.settings.index');
    }

    public function store(Request $request)
    {
        $rules = Setting::getValidationRules();
        $data = $this->validate($request, $rules);

        $validSettings = array_keys($rules);

        foreach ($data as $key => $val) {
            if (in_array($key, $validSettings)) {
                if($val instanceof UploadedFile) {
                    $fullPath = 'storage/'. $this->uploadFileService->update($val, '', 'images/logo');
                    $val = $fullPath;
                }
                Setting::add($key, $val, Setting::getDataType($key));
            }
        }

        return redirect()->back()->with('status', 'Settings has been saved.');
    }
}
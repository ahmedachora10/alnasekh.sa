<?php

namespace App\Http\Controllers;

use App\Enums\MediaValidation;
use App\Services\UploadFileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UploadMediaController extends Controller
{
    public function __construct(protected UploadFileService $uploadFileService) {}
    public function store(Request $request) {
        $validation = MediaValidation::tryFrom($request->input('model'));

        if(!$validation)
            return response()->json([
                'status' => false,
                'message' => __('Something went wrong'),
            ], 400);

        $valid = Validator::make($request->all(), ['attachment' => $validation->rules(), 'model' => 'required']);

        if($valid->fails())
            return response()->json([
                'status' => false,
                'message' => $valid->errors()->messages()['attachment'],
            ], 200);

        $file = $this->uploadFileService->store(
            file: $request->attachment,
            destination: $validation->destination()
        );

        return response()->json([
            'status' => $file ? true : false,
            'file' => $file
        ]);
    }
}

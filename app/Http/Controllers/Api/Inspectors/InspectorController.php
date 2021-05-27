<?php

namespace App\Http\Controllers\Api\Inspectors;

use App\Http\Resources\InspectorResources;
use App\Services\ProfileService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class InspectorController extends Controller
{

    public function getProfile(): JsonResponse
    {
        $inspector = auth('inspector')->user();

        return response()->json(new InspectorResources($inspector));
    }


    public function editProfile(Request $request): JsonResponse
    {
        $editData = $request->only(
            'first_name',
            'last_name',
            'email',
            'phone',
            'status',
            'region',
            'avatar',
            'company',
            'membership',
            'address',);

        $profile = Auth::user();

        $avatarPath = $request->file('avatar') ? $request->file('avatar')->store('uploads') : null;

        if ($profile->avatar) {
            Storage::delete($profile->avatar);
        }

        $inspector = ProfileService::editInspectorProfile($editData, $profile, $avatarPath);

        return response()->json(new InspectorResources($inspector));
    }
}

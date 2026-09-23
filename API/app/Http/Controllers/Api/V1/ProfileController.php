<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\StudentProfile;

class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Fetch profile with eager loaded achievements and bookmarks
        $profile = StudentProfile::firstOrCreate(
            ['user_id' => $user->id],
            [
                'total_points' => 0,
                'grade' => null,
                'school' => null,
                'city' => null
            ]
        );

        $profile->load('user.achievements');
        
        // Format response
        return response()->json([
            'id' => $profile->id,
            'grade' => $profile->grade,
            'school' => $profile->school,
            'city' => $profile->city,
            'total_points' => $profile->total_points,
            'achievements' => $user->achievements
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $validated = $request->validate([
            'grade' => 'nullable|integer|min:1|max:12',
            'school' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
        ]);

        $profile = StudentProfile::where('user_id', $user->id)->first();
        if ($profile) {
            $profile->update($validated);
        }

        return response()->json(['message' => 'Profile updated successfully', 'profile' => $profile]);
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\StudentProfile;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->stateless()
            ->redirect();
    }

    /**
     * Obtain the user information from Google.
     * Create or find the user, then return a Sanctum token.
     */
    public function handleGoogleCallback()
    {
        $rawFrontendUrl = config('app.frontend_url', env('FRONTEND_URL', 'https://apaarsambhavana.in'));
        $frontendUrls = array_values(array_filter(array_map('trim', explode(',', $rawFrontendUrl))));
        $frontendUrl = !empty($frontendUrls) ? $frontendUrls[0] : 'https://apaarsambhavana.in';

        // In production, ensure we use https production frontend url if available in the list
        if (app()->isProduction()) {
            foreach ($frontendUrls as $url) {
                if (str_starts_with($url, 'https://')) {
                    $frontendUrl = $url;
                    break;
                }
            }
        }

        try {
            $googleUser = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect($frontendUrl . '/auth/login?error=google_failed');
        }

        // Find existing user by google_id or email
        $user = User::where('google_id', $googleUser->getId())
            ->orWhere('email', $googleUser->getEmail())
            ->first();

        if ($user) {
            // Update google_id if they previously registered with email/password
            if (!$user->google_id) {
                $user->update(['google_id' => $googleUser->getId()]);
            }
        } else {
            // Create new user
            $user = User::create([
                'name' => $googleUser->getName(),
                'email' => $googleUser->getEmail(),
                'google_id' => $googleUser->getId(),
                'avatar' => $googleUser->getAvatar(),
                'email_verified_at' => now(), // Google accounts are pre-verified
                'password' => bcrypt(Str::random(32)), // Random unusable password
            ]);

            // Auto-create student profile for new social users
            StudentProfile::firstOrCreate(['user_id' => $user->id], [
                'total_points' => 0,
            ]);
        }

        // Issue Sanctum token
        $token = $user->createToken('google-auth')->plainTextToken;

        // Redirect to frontend with token in URL fragment
        // Frontend will pick this up and store it in Pinia
        return redirect($frontendUrl . '/auth/social-callback?token=' . $token . '&name=' . urlencode($user->name));
    }
}

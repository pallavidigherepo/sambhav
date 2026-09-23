<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookmark;
use App\Models\Competition;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class BookmarkController extends Controller
{
    public function toggle(Request $request)
    {
        $request->validate([
            'type' => 'required|in:competition,event',
            'id' => 'required|integer'
        ]);

        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $typeClass = $request->type === 'competition' ? Competition::class : Event::class;
        $id = $request->id;

        // Check if bookmark exists
        $bookmark = Bookmark::where('user_id', $user->id)
            ->where('bookmarkable_id', $id)
            ->where('bookmarkable_type', $typeClass)
            ->first();

        if ($bookmark) {
            $bookmark->delete();
            return response()->json(['message' => 'Bookmark removed', 'is_bookmarked' => false]);
        } else {
            Bookmark::create([
                'user_id' => $user->id,
                'bookmarkable_id' => $id,
                'bookmarkable_type' => $typeClass,
            ]);
            return response()->json(['message' => 'Bookmark added', 'is_bookmarked' => true]);
        }
    }
}

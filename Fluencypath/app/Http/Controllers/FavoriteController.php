<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Text;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggleFavorite($textId)
    {
        $user = Auth::user();
        $text = Text::findOrFail($textId);

        if ($user->favorites()->wherePivot('text_id', $textId)->exists()) {
            $user->favorites()->detach($textId);
            $text->decrement('favorites_count');
            return response()->json(['favorited' => false, 'favorites_count' => $text->favorites_count]);
        } else {
            $user->favorites()->attach($textId);
            $text->increment('favorites_count');
            return response()->json(['favorited' => true, 'favorites_count' => $text->favorites_count]);
        }
    }

    public function getFavoritesCount($textId)
    {
        $text = Text::findOrFail($textId);
        return response()->json(['favorites_count' => $text->favorites_count]);
    }

    public function index()
{
    $user = Auth::user();
    $favoriteTexts = $user->favorites()->with('favorites')->get();

    return view('favorites.index', compact('favoriteTexts'));
}
}

<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PopularPageController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
            'sort_by' => 'nullable|string',
            'order_by' =>'nullable|string',
        ]);

        $order = $request->order_by ?? 'desc';

        $postsBuilder = Post::query()
            ->withCount([
                'votes as upvotes_count' => fn ($q) => $q->where('is_upvote', 1),
                'votes as downvotes_count' => fn ($q) => $q->where('is_upvote', 0),
            ])
            ->when($request->search, function (\Illuminate\Database\Eloquent\Builder $query, string $search) {
                $query->where('title', 'like', '%'.$search.'%')
                    ->orWhereHas('topic', function (\Illuminate\Database\Eloquent\Builder $query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    });
            });

        if (Auth::check()) {
            $genres = $request->user()->genres()->pluck('genres.id');

            $postsBuilder->whereHas('topic', function ($query) use ($genres) {
                $query->whereIn('genre_id', $genres);
            });
        }

        switch ($request->sort_by) {
            // Popular = upvote
            case 'Popular':
                $postsBuilder->orderBy('upvotes_count', $order);
                break;

            // Date = created_at
            case 'Date':
                $postsBuilder->orderBy('created_at', $order);
                break;

            // Default (Best) = ratio (handle ÷0 safely, cast to DECIMAL)
            default: // ‘Ratio’ or blank
                $postsBuilder->orderByRaw(
                    'COALESCE(
                            CASE
                                WHEN downvotes_count = 0 THEN upvotes_count
                                ELSE upvotes_count / downvotes_count
                            END, 0
                    ) ' . $order
                );
                break;
        };

        $posts = $postsBuilder->with(['topic', 'author'])->paginate(20);

        $recentPosts = Post::query()
            ->latest()
            ->limit(20)
            ->with(['topic', 'votes'])
            ->get();

        return view('homepage', [
            'search' => $request->search,
            'sortBy' => $request->sort_by,
            'orderBy' => $request->order_by,
            'posts' => $posts,
            'recentPosts' => $recentPosts,
        ]);
    }

}

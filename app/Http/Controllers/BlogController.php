<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index(BlogRequest $request)
    {
        $order_by = $request->sort_by ?? 'asc';
        $blog = auth()->user()->blogs()->orderBy( 'id', $order_by )->get();

        return view( 'blog.myblog', compact( 'blog' ) );
    }

    public function create()
    {
        return view( 'blog.new' );;
    }

    public function store(BlogRequest $request)
    {
        Blog::create( [
            'title' => $request->title,
            'slug' => Str::slug( $request->title ),
            'user_id' => auth()->user()->getAuthIdentifier(),
            'desc' => $request->desc,
        ] );

        session()->flash( 'mssg', [ 'status' => 'success', 'data' => 'Insert Data Successfully' ] );

        return redirect()->route( 'my_blog' );
    }

    public function autoImport()
    {
        $response = Http::get( 'https://sq1-api-test.herokuapp.com/posts' );
        foreach ($response->json()['data'] as $value) {
            Blog::create( [
                'title' => $value['title'],
                'slug' => Str::slug( $value['title'] ),
                'desc' => $value['description'],
                'user_id' => auth()->user()->getAuthIdentifier(),
                'created_at' => $value['publication_date'],
            ] );
        }

        session()->flash( 'mssg', [ 'status' => 'success', 'data' => 'Insert Data Successfully' ] );

        return redirect()->route( 'my_blog' );
    }

}

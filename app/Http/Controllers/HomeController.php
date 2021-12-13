<?php

namespace App\Http\Controllers;


use App\Http\Requests\HomeRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @param Request  $request
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(HomeRequest $request)
    {
        $order_by = $request->sort_by ?? 'asc';
        $blog = Blog::with( 'user:id,name' )->orderBy( 'id', $order_by )->get();

        return view( 'home', compact( 'blog' ) );
    }

}

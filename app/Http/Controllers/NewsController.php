<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $news = DB::table('news')->select(['user_id', 'created_at', 'title', 'id'])->where('user_id', Auth::id())->get();
        return view('news.index', ['data' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user_id = Auth::id();
        $title = $request->input('title');
        $content = $request->input('content');

        $news = News::create([
            'user_id' => $user_id,
            'title' => $title,
            'content' => $content,
        ]);
        return redirect()->route('news.create', ['success' => 1]);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $newsModel, int $news)
    {
        $newsRes = DB::table('news')->select(['user_id', 'created_at', 'title', 'content', 'id'])->where('id', $news)->first();
        return view('news.show', ['data' => $newsRes]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {

        return view('news.update', ['data' => $news]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $UpdateNews = News::where('id', $news->id)->update([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
        ]);
        return view('news.update', ['data' => $news, 'success' => 1]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $removed = News::where('id', $news->id)->delete();

        return redirect()->route('news.index');
    }

    public function home()
    {
        $news = News::all();
        return view('list', ['data' => $news]);
    }

    public function details(News $news)
    {
        $newsRes = DB::table('news')->join('users', 'news.user_id', '=', 'users.id')->select(['users.name', 'news.created_at', 'news.title', 'news.content', 'news.id'])->where('news.id', $news->id)->first();
        return view('details', ['data' => $newsRes]);
    }
}

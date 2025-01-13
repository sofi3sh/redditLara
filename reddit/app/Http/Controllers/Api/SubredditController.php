<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Subreddit;
use Illuminate\Http\Request;

class SubredditController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $subreddits= Subreddit::all();

        return response()->json($subreddits);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:800'
            ]
        );
        $subreddit = Subreddit::create($request->all());

        if ( $subreddit )
            return response()->json(['subreddit'=>$subreddit, 'Message' =>'Subreddit created successfully']);
        else
            return response()->json([null, 'Message' =>'Subreddit not created']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:800'
            ]
        );

        $subreddit = Subreddit::find($id);
        $subreddit->update($request->all());
        return response()->json($subreddit, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subreddit = Subreddit::find($id);
        $subreddit->delete();
        return response()->json($subreddit, 200);
    }
}

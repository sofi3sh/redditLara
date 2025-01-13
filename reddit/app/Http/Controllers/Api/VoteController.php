<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $votes = Vote::all();

        return response()->json($votes);
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
                'vote_type' => ['required', 'string', Rule::in(['upvote', 'downvote'])]
            ]
        );
        $vote = Vote::create($request->all());
        return response()->json($vote);
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
                'vote_type' => ['required', 'string', Rule::in(['upvote', 'downvote'])]
            ]
        );

        $vote = Vote::find($id);
        $vote->update($request->all());
        return response()->json($vote, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vote = Vote::find($id);
        $vote->delete();
        return response()->json($vote, 200);
    }
}

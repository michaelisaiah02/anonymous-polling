<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Vote;
use App\Http\Requests\StoreVoteRequest;
use App\Http\Requests\UpdateVoteRequest;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //      
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
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,id',
            'pilihan' => 'required|exists:options,id',
            'id_poll' => 'required|exists:polls,id_poll',
        ]);
        $validatedData['option_id'] = $validatedData['pilihan'];
        unset($validatedData['pilihan']);
        Vote::create($validatedData);
        return view('vote.voted', [
            'poll' => Poll::where('id_poll', $request->id_poll)->first(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $request->validate([
            'id_poll' => 'required|min:5|exists:polls,id_poll',
        ], [
            'id_poll.required' => 'ID Poll tidak boleh kosong!',
            'id_poll.min' => 'Masukan ID Poll 5 digit!',
            'id_poll.exists' => 'Poll yang dicari tidak terdaftar!',
        ]);
        Poll::where('id_poll', $request->id_poll)->first();
        return redirect()->route('poll.show', [
            'poll' => Poll::where('id_poll', $request->id_poll)->first(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoteRequest $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }
}

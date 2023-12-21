<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Http\Requests\StorePollRequest;
use App\Http\Requests\UpdatePollRequest;
use App\Models\Option;
use App\Models\Vote;
use Illuminate\Http\Request;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('poll.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        do {
            $angka = fake()->randomNumber(5, true);
        } while (Poll::where('id', $angka)->exists());
        return view('poll.create', [
            'id_poll' => $angka,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_poll' => 'required|unique:polls,id_poll',
            'statement' => 'required',
            'options' => 'required|array|min:2',
            'options.*' => 'required',
        ]);

        $poll = Poll::create([
            'id_poll' => $request->id_poll,
            'created_by' => auth()->user()->id,
            'statement' => $request->statement,
            'waktu_selesai' => now()->addSeconds($request->input('waktu')),
        ]);

        foreach ($request->options as $option) {
            Option::create([
                'id_poll' => $request->id_poll,
                'option' => $option,
            ]);
        }
        return redirect()->route('poll.show', ['poll' => $poll]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Poll $poll)
    {
        if ($poll->waktu_selesai > now() && !Vote::where('id_poll', $poll->id_poll)->where('user_id', auth()->user()->id)->exists()) {
            return view('vote.index', [
                'poll' => $poll,
            ]);
        } elseif ($poll->waktu_selesai < now()) {
            return view('vote.selesai', [
                'poll' => $poll,
                'options' => '$option',
            ]);
        } elseif ($poll->waktu_selesai > now() || Vote::where('id_poll', $poll->id_poll)->where('user_id', auth()->user()->id)->exists()) {
            return view('vote.voted', [
                'poll' => $poll,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Poll $poll)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePollRequest $request, Poll $poll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Poll $poll)
    {
        //
    }
}

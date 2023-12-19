<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Http\Requests\StorePollRequest;
use App\Http\Requests\UpdatePollRequest;
use App\Models\Option;
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
            $angka = fake()->randomNumber(5);
        } while (Poll::where('id_poll', $angka)->exists());
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
            'statement' => 'required',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string',
        ]);

        $poll = Poll::create([
            'statement' => $request->input('statement'),
            'waktu' => now(),
        ]);

        foreach ($request->input('options') as $option) {
            Option::create([
                'poll_id' => $poll->id,
                'option' => $option,
            ]);
        }

        return redirect()->route('poll.index')->with('success', 'Poll created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Poll $poll)
    {
        //
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

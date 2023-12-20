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
        dd($request);
        $request->validate([
            'id_poll' => 'required|unique:polls,id_poll',
            'statement' => 'required',
            'option' => 'required|array|min:2',
            'option.*' => 'required',
        ]);

        $poll = Poll::create([
            'id_poll' => $request->id_poll,
            'statement' => $request->statement,
            'waktu_selesai' => now()->addSeconds($request->input('waktu')),
        ]);

        foreach ($request->input('options') as $option) {
            Option::create([
                'poll_id' => $poll->id,
                'option' => $option,
            ]);
        }

        return redirect()->route('vote.index')->with('success', 'Poll created successfully.');
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

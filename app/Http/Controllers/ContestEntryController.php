<?php

namespace App\Http\Controllers;

use App\Events\NewEntryReceivedEvent;
use App\Models\ContestEntry;
use Illuminate\Http\Request;

class ContestEntryController extends Controller
{
    public function index()
    {
        return view('components.contest');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
        ]);

        $contestEntry = ContestEntry::create($data);

        // event(NewEntryReceivedEvent::class);
        NewEntryReceivedEvent::dispatch($contestEntry);
    }
}

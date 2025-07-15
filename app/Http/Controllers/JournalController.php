<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function ledger()
    {
        $start_date = (request()->start_date ?? now()->subDays(30)->toDateString()) . ' 00:00:00';
        $end_date = (request()->end_date ?? now()->toDateString()) . ' 23:59:59';
        
        $journals = Journal::with('order')->whereBetween('created_at', [$start_date, $end_date])
        ->orderBy('order_id')
        ->get()
        ->groupBy('order_id');

        return view('admin.journal.ledger', compact('journals','start_date', 'end_date'));
    }
}

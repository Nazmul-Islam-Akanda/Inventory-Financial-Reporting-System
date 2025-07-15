<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function generateReport()
    {
        $start_date = (request()->start_date ?? now()->subDays(30)->toDateString()) . ' 00:00:00';
        $end_date = (request()->end_date ?? now()->toDateString()) . ' 23:59:59';

        $journals = Journal::whereBetween('created_at', [$start_date, $end_date])->get();

        $total_sales = $journals->where('type', 'sales')->sum('amount');
        $total_discount = $journals->where('type', 'discount')->sum('amount');
        $total_vat = $journals->where('type', 'vat')->sum('amount');

        $total_expenses = $total_discount + $total_vat;
        $profit = $total_sales - $total_expenses;

        
        return view('admin.reports.generate', compact( 'total_sales','total_expenses', 'profit'));
    }
}

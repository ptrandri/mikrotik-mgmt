<?php

namespace App\Http\Controllers;

use App\Exports\TicketExport;
use Carbon\Carbon;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
{
    public function index()
    {
        $query = Ticket::all();
        return view('report.index', compact('query'));        
    }

    public function export(Request $request)
    {
        $Assigned_to = $request->input('Assigned_to');

        $start_date = $request->input('start_date');
        $newSdate = Carbon::parse($start_date)->format('Y:m:d 00:00:00');

        $end_date = $request->input('end_date');   
        $newEdate = Carbon::parse($end_date)->format('Y:m:d 23:59:00');

        return Excel::download(new TicketExport($Assigned_to, $newSdate, $newEdate), 'siswas.xls');
    }
}

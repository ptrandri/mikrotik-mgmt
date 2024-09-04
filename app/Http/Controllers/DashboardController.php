<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $assigned_to = auth()->user()->username;
        $status = 'Open' ; 
        $filter = Ticket::where('Assigned_to','like', '%'.$assigned_to.'%')
                        ->orWhere('SubjectCase' , 'like', '%'.$status.'%')->paginate(5);
        $dashboard = Ticket::all();
        return view ('dashboard.index',compact('dashboard', 'filter'));
    }
}

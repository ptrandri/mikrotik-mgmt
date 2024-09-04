<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::paginate(5);
        return view ('tickets.index',compact('tickets'))->with('i', (request()->input('page', 1) -1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'AgentName' => 'required',
            'SubjectCase' => 'required',
            'SubjectDesc' => 'required',
            'CallerName' => 'required',
            'CallerEmail' => 'required|email:dns',
            'Status' => 'required',
            'Priority' => 'required',
            'Assigned_to' => 'required',
            'image' => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        if($request->file('image')){
            $validateData['image'] = $request->file('image')->store('image');
        }

        Ticket::create($validateData);

        return redirect()->route('tickets.index')->with('message','Tickets has been Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tickets = Ticket::findOrFail($id);
              return view('tickets.show',compact('tickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tickets = Ticket::findOrFail($id);
        return view('tickets.edit', compact('tickets'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tickets = Ticket::findOrFail($id);
        $updateData = $request->validate([
            'AgentName' => 'required',
            'SubjectCase' => 'required',
            'SubjectDesc' => 'required',
            'CallerName' => 'required',
            'CallerEmail' => 'required|email:dns',
            'Status' => 'required',
            'Priority' => 'required',
            'Assigned_to' => 'required',
            'image' => 'sometimes|nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);

        if($request->file('image')) {
            if($tickets->image) {
                Storage::delete($tickets->image);
            }
            $updateData['image'] = $request->file('image')->store('image');
        }
        Ticket::whereId($id)->update($updateData);
        return redirect()->route('tickets.index')->with('message','Tickets has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tickets = Ticket::findOrFail($id);
        if($tickets->image) {
            Storage::delete($tickets->image);
        }
        $tickets->delete();
        return redirect()->route('tickets.index')->with('message','Tickets has been deleted');
    }
}

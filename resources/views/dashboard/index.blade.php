@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-1 mb-3 border-bottom">
        <h1 class="h5">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3 col-sm-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="text-white fa-2xl">
                        <i class="float-end fa-solid fa-plus"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16 text-white">TICKET CREATED</h6>
                        <span class="badge bg-info"> </span>
                        <span class="ms-2">{{ $dashboard->count() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="text-white fa-2xl">
                        <i class="float-end fa-solid fa-folder-open"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16 text-white">OPEN</h6>
                        <span class="badge bg-info"> </span>
                        <span class="ms-2">{{ $dashboard->where('Status', 'Open')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="text-white fa-2xl">
                        <i class="float-end fa-solid fa-arrow-right-arrow-left"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-16 text-white">ESCALATED</h6>
                        <span class="badge bg-info"> </span>
                        <span class="ms-2">{{ $dashboard->where('Status', 'Escalated')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6">
            <div class="card mini-stat bg-primary">
                <div class="card-body mini-stat-img">
                    <div class="text-white fa-2xl">
                        <i class="float-end fa-sharp fa-solid fa-folder-closed"></i>
                    </div>
                    <div class="text-white">
                        <h6 class="text-uppercase mb-3 font-size-20 text-white">CLOSED</h6>
                        <span class="badge bg-info"> </span>
                        <span class="ms-2">{{ $dashboard->where('Status', 'Closed')->count() }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
        <h1 class="h5">Ticket Info</h1>
    </div>

    @if ($filter->where('Status', 'Open')->count())
        <div class="card">
            <table class="table bg-white text-black">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Agent Name</th>
                        <th scope="col">Subject Case</th>
                        <th scope="col">Description</th>
                        <th scope="col">Caller Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Assigned To</th>
                        <th scope="col">Created Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($filter as $ticket)
                        @if ($ticket->Assigned_to === 'Admin')
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->AgentName }}</td>
                                <td><a href="/tickets/{{ $ticket->id }}">{{ $ticket->SubjectCase }}</a></td>
                                <td>{{ $ticket->SubjectDesc }}</td>
                                <td>{{ $ticket->CallerName }}</td>
                                <td>
                                    @if ($ticket->Status === 'Open')
                                        <span class="badge rounded-pill bg-success text-white">
                                            Open
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    @if ($ticket->Priority === 'Low')
                                        <span class="badge rounded-pill bg-success text-white">
                                            Low
                                        </span>
                                    @elseif ($ticket->Priority === 'Normal')
                                        <span class="badge rounded-pill bg-primary text-white">
                                            Normal
                                        </span>
                                    @elseif ($ticket->Priority === 'High')
                                        <span class="badge rounded-pill bg-warning text-white">
                                            High
                                        </span>
                                    @elseif ($ticket->Priority === 'Critical')
                                        <span class="badge rounded-pill bg-danger text-white">
                                            Critical
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $ticket->Assigned_to }}</td>
                                <td>{{ $ticket->created_at }}</td>
                            </tr>
                        @elseif ($ticket->Assigned_to === 'Agent')
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->AgentName }}</td>
                                <td><a href="/tickets/{{ $ticket->id }}">{{ $ticket->SubjectCase }}</a></td>
                                <td>{{ $ticket->SubjectDesc }}</td>
                                <td>{{ $ticket->CallerName }}</td>
                                <td>
                                    @if ($ticket->Status === 'Open')
                                        <span class="badge rounded-pill bg-success text-white">
                                            Open
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($ticket->Priority === 'Low')
                                        <span class="badge rounded-pill bg-success text-white">
                                            Low
                                        </span>
                                    @elseif ($ticket->Priority === 'Normal')
                                        <span class="badge rounded-pill bg-primary text-white">
                                            Normal
                                        </span>
                                    @elseif ($ticket->Priority === 'High')
                                        <span class="badge rounded-pill bg-warning text-white">
                                            High
                                        </span>
                                    @elseif ($ticket->Priority === 'Critical')
                                        <span class="badge rounded-pill bg-danger text-white">
                                            Critical
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $ticket->Assigned_to }}</td>
                                <td>{{ $ticket->created_at }}</td>
                            </tr>
                        @elseif ($ticket->Assigned_to === 'Engineer')
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->AgentName }}</td>
                                <td><a href="/tickets/{{ $ticket->id }}">{{ $ticket->SubjectCase }}</a></td>
                                <td>{{ $ticket->SubjectDesc }}</td>
                                <td>{{ $ticket->CallerName }}</td>
                                <td>
                                    @if ($ticket->Status === 'Open')
                                        <span class="badge rounded-pill bg-success text-white">
                                            Open
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if ($ticket->Priority === 'Low')
                                        <span class="badge rounded-pill bg-success text-white">
                                            Low
                                        </span>
                                    @elseif ($ticket->Priority === 'Normal')
                                        <span class="badge rounded-pill bg-primary text-white">
                                            Normal
                                        </span>
                                    @elseif ($ticket->Priority === 'High')
                                        <span class="badge rounded-pill bg-warning text-white">
                                            High
                                        </span>
                                    @elseif ($ticket->Priority === 'Critical')
                                        <span class="badge rounded-pill bg-danger text-white">
                                            Critical
                                        </span>
                                    @endif
                                </td>
                                <td>{{ $ticket->Assigned_to }}</td>
                                <td>{{ $ticket->created_at }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
            {{-- Pagination --}}
            <div class="d-flex justify-content-end m-1">{!! $filter->links() !!}</div>
            {{-- end Pagination --}}
        </div>
    @else
        <div class="card">
            <div class="mt-1 mb-1">
                <h5 class="text-start ms-1">No ticket available assigned to you!</h5>
            </div>
        </div>
    @endif

@endsection

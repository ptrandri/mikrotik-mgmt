@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-1 mb-3 border-bottom">
        <h1 class="h5">Report</h1>
    </div>
    <div class="container-fluid card card-body">
        <form class="needs-validation" action="/report/export" method="POST">
            @csrf
            <div class="row">
                <div class="col-12">
                    <h4 class="card-title">Create Report</h4>
                    <div class="row ">
                        <div class="col-md-5 mb-3 ">
                            <label for="" class="form-label">Report For</label>
                            <select name="Assigned_to" class="form-select">
                                <option value="Agent"
                                    selected="{{ isset($_GET['Assigned_to']) && $_GET['Assigned_to'] == 'Agent' }}">
                                    Agent
                                </option>
                                <option value="Engineer"
                                    selected="{{ isset($_GET['Assigned_to']) && $_GET['Assigned_to'] == 'Engineer' }}">
                                    Engineer
                                </option>
                            </select>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="from">Start Date</label>
                                <input type="date" class="form-control" id="from" name="start_date"
                                    value="{{ isset($_GET['start_date']) ? $_GET['start_date'] : '' }}">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label" for="to">End Date</label>
                                <input type="date" class="form-control" id="to" name="end_date"
                                    placeholder="Caller name"
                                    value="{{ isset($_GET['end_date']) ? $_GET['end_date'] : '' }}">
                            </div>
                        </div>

                        <div class="col-md-1">
                            <div class="mb-1">
                                <label class="form-label" for="to"></label>
                            </div>
                            <button class="btn btn-success" type="submit" name='search' title='search'>Generate</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        {{-- <div class="container-fluid">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Agent Name</th>
                        <th scope="col">Subject Case</th>
                        <th scope="col">Description</th>
                        <th scope="col">Caller Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Priority</th>
                        <th scope="col">Assigned To</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Updated Date</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($query as $key => $ticket)
                        <tr>
                            <th scope="row">{{ ++$key }}</th>
                            <td>{{ $ticket->AgentName }}</td>
                            <td>{{ $ticket->SubjectCase }}</td>
                            <td>{{ $ticket->SubjectDesc }}</td>
                            <td>{{ $ticket->CallerName }}</td>
                            <td>{{ $ticket->Status }}</td>
                            <td>{{ $ticket->Priority }}</td>
                            <td>{{ $ticket->Assigned_to }}</td>
                            <td>{{ $ticket->created_at }}</td>
                            <td>{{ $ticket->updated_at }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-start">No Data found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div> --}}
    </div>
@endsection

@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 mb-2 container-fluid">
        <h1 class="h5">Show Ticket</h1>
        <a href="{{ route('tickets.edit', $tickets->id) }}">
            <button type="button" class="btn btn-success btn-sm">Edit Ticket</button>
            <td class="text-center">
                <form action="{{ route('tickets.destroy', $tickets->id) }}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit"
                        onclick="return confirm ('Are your sure to delete?')">Delete</button>
                </form>
            </td>
        </a>
    </div>

    <div class="tab-content">
        <div class="tab-pane active" id="ticket" role="tabpanel">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Case Information</h4>
                            <table width="100%" class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td width="15%">Agent Name</td>
                                        <td width="0%">{{ $tickets->AgentName }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table width="100%" class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td width="15%">Subject Case</td>
                                        <td width="0%">{{ $tickets->SubjectCase }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <table width="100%" class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td width="15%">Description</td>
                                        <td width="0%">{{ $tickets->SubjectDesc }}</td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mt-3">Tickets Details</h4>
                            <table width="100%" class="table table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td width="15%">Caller Name</td>
                                        <td width="85%" colspan="2">{{ $tickets->CallerName }}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Caller Email</td>
                                        <td width="85%" colspan="2">{{ $tickets->CallerEmail }}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Ticket Status</td>
                                        <td width="85%" colspan="2">{{ $tickets->Status }}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Ticket Priority</td>
                                        <td width="85%" colspan="2">{{ $tickets->Priority }}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%">Assigned To</td>
                                        <td width="85%" colspan="2">{{ $tickets->Assigned_to }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- image --}}
    <div class="accordion" id="accordionExample">
        <div class="card mb-0">
            <div class="card-header" id="headingOne">
                <h5 class="m-0">
                    <a class="custom-accordion-title d-block pt-2 pb-2" data-bs-toggle="collapse" href="#collapseOne"
                        aria-expanded="true" aria-controls="collapseOne">
                        Ticket Image
                    </a>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                <div class="card-body">
                    @if ($tickets->image)
                        <img src="/storage/{{ $tickets->image }}" class="w-100 shadow-1-strong rounded mb-4"
                            alt="Ticket-image" />
                    @else
                        <h5>No Image Available</h5>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
    {{-- image --}}
@endsection

@extends('dashboard.layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h5">Edit Ticket</h1>
            <a href="/tickets/">
                <button type="button" class="btn btn-primary">Back</button>
            </a>
        </div>

        <div class="card push-top">
            <form class="needs-validation" method="post" action="{{ route('tickets.update', $tickets->id) }} "
                enctype="multipart/form-data">
                <div class="form-group">
                    @csrf
                    @method('PATCH')
                    <div class="card-body">
                        {{-- @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif --}}
                        <h4 class="card-title">Case Summary</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="AgentName">Agent Name</label>
                                    <input type="text" class="form-control @error('AgentName') is-invalid @enderror"
                                        id="AgentName" name="AgentName" placeholder="Agent Name Working on Shift"
                                        value="{{ $tickets->AgentName }}" required="">
                                </div>
                                @error('AgentName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="SubjectCase">Subject Case</label>
                                    <textarea type="text" class="form-control @error('SubjectCase') is-invalid @enderror" id="SubjectCase"
                                        name="SubjectCase" placeholder="Enter your subject Problem">{{ $tickets->SubjectCase }}</textarea>
                                </div>
                                @error('SubjectCase')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="form-label" for="SubjectDesc">Description</label>
                                    <textarea type="text" class="form-control @error('SubjectDesc') is-invalid @enderror" id="SubjectDesc"
                                        name="SubjectDesc" placeholder="Please Give Your Problem Description">{{ $tickets->SubjectDesc }}</textarea>
                                </div>
                                @error('SubjectDesc')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <h4 class="card-title mt-3">Customer Details</h4>
                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="CallerName">Caller Name</label>
                                <input type="text" class="form-control @error('CallerName') is-invalid @enderror"
                                    id="CallerName" name="CallerName" placeholder="Please Enter the Caller Name"
                                    value="{{ $tickets->CallerName }}" required="">
                                @error('CallerName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label" for="CallerEmail">Caller Email</label>
                                <input type="email" class="form-control @error('CallerEmail') is-invalid @enderror"
                                    id="CallerEmail" name="CallerEmail" placeholder="Please Enter the Caller Email"
                                    value="{{ $tickets->CallerEmail }}" required>
                                @error('CallerEmail')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <h4 class="card-title mt-3">Tickets Details</h4>
                            <div class="col-12">
                                <label class="form-label" for="Status">Status</label>
                                <select class="form-select mb-3" id="Status" name="Status">
                                    <option value="Open" {{ $tickets->Status == 'Open' ? 'selected' : '' }}>Open
                                    </option>
                                    <option value="Escalated" {{ $tickets->Status == 'Escalated' ? 'selected' : '' }}>
                                        Escalated </option>
                                    <option value="Closed" {{ $tickets->Status == 'Closed' ? 'selected' : '' }}>Closed
                                    </option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="Priority">Priority</label>
                                <select class="form-select mb-3" id="Priority" name="Priority">
                                    <option value="Low" {{ $tickets->Priority == 'Low' ? 'selected' : '' }}>Low
                                    </option>
                                    <option value="Normal" {{ $tickets->Priority == 'Normal' ? 'selected' : '' }}>Normal
                                    </option>
                                    <option value="High" {{ $tickets->Priority == 'High' ? 'selected' : '' }}>High
                                    </option>
                                    <option value="Critical" {{ $tickets->Priority == 'Critical' ? 'selected' : '' }}>
                                        Critical
                                    </option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="Assigned_to">Assigned To</label>
                                <select class="form-select mb-3" id="Assigned_to" name="Assigned_to">
                                    <option value="Agent" {{ $tickets->Assigned_to == 'Agent' ? 'selected' : '' }}>
                                        Agent
                                    </option>
                                    <option value="Engineer" {{ $tickets->Assigned_to == 'Engineer' ? 'selected' : '' }}>
                                        Engineer
                                    </option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Please Upload your file</label>
                                @if ($tickets->image)
                                    <img src="{{ asset('storage/' . $tickets->image) }}"
                                        class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                @endif
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    id="image" name="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        </div>
                        <button type="submit" class="btn btn-block btn-danger">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

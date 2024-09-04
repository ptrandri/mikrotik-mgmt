@extends('dashboard.layouts.main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 mb-2 container-fluid">
        <h1 class="h5">Create Ticket</h1>
    </div>
    <div class="container-fluid">
        <form class="needs-validation" action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Case Summary</h4>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="AgentName">Agent Name</label>
                                        <input type="text" class="form-control @error('AgentName') is-invalid @enderror"
                                            id="AgentName" name="AgentName" placeholder="Agent Name Working on Shift"
                                            value="" required="">
                                    </div>
                                    @error('AgentName')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label class="form-label" for="SubjectCase">Subject</label>
                                        <textarea type="text" class="form-control @error('SubjectCase') is-invalid @enderror" id="SubjectCase"
                                            name="SubjectCase" placeholder="Enter your subject Problem" required=""></textarea>
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
                                            name="SubjectDesc" placeholder="Please Give Your Problem Description"></textarea>
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
                                        value="" required="">
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
                                        value="">
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
                                        <option value="Open">Open</option>
                                        <option value="Escalated">Escalated</option>
                                        <option value="Closed">Closed</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="Priority">Priority</label>
                                    <select class="form-select mb-3" id="Priority" name="Priority">
                                        <option value="Low">Low</option>
                                        <option value="Normal">Normal</option>
                                        <option value="High">High</option>
                                        <option value="Critical">Critical</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label" for="Assigned_to">Assigned To</label>
                                    <select class="form-select mb-3" id="Assigned_to" name="Assigned_to">
                                        <option value="Agent">Agent</option>
                                        <option value="Engineer">Engineer</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="image" class="form-label">Please Upload your file</label>
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 text-start">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

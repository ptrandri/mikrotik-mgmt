@extends('dashboard.layouts.main')
@section('container')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 border-bottom">
            <h1 class="h5">Queue Management</h1>
            <div class="mb-3 text-end">
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <strong>{{ session('message') }}</strong>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="mt-3 ms-3">
                <h1 class="h4">List of Queues</h1>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Target</th>
                                <th>Max Limit</th>
                                <th>Burst Limit</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($queues as $index => $queue)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $queue['name'] ?? 'N/A' }}</td>
                                    <td>{{ $queue['target'] ?? 'N/A' }}</td>
                                    <td>{{ $queue['max-limit'] ?? 'N/A' }}</td>
                                    <td>{{ $queue['burst-limit'] ?? 'N/A' }}</td>
                                    <td>{{ $queue['comment'] ?? 'N/A' }}</td>
                                    <td>
                                        @php
                                            $ipAddress = explode('/', $queue['target'])[0];
                                        @endphp
                                        <a href="{{ route('block.client', $ipAddress) }}" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure you want to block this client?')">Ban</a>
                                        {{-- <a href="{{ route('unblock.client', $ipAddress) }}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to unblock this client?')">Unban</a> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Firewall --}}
        <div class="card shadow mb-4">
            <div class="mt-3 ms-3">
                <h1 class="h4">List of Firewall Filter</h1>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Chain</th>
                                <th>Action</th>
                                <th>IP Address</th>
                                <th>Comment</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($firewallFilters as $index => $firewallFilter)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $firewallFilter['chain'] ?? 'N/A' }}</td>
                                    <td>{{ $firewallFilter['action'] ?? 'N/A' }}</td>
                                    <td>{{ $firewallFilter['src-address'] ?? 'N/A' }}</td>
                                    <td>{{ $firewallFilter['comment'] ?? 'N/A' }}</td>
                                    <td>
                                        @php
                                            $ipAddress = explode('/', $firewallFilter['src-address'])[0];
                                        @endphp
                                  <a href="{{ route('unblock.client', $ipAddress) }}" class="btn btn-success btn-sm" onclick="return confirm('Are you sure you want to unblock this client?')">Unban</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- Firewall --}}
    </div>
@endsection

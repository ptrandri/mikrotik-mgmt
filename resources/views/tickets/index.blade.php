@extends('dashboard.layouts.main')
@push('styles')
    @livewireStyles
@endpush

@push('scripts')
    @livewireScripts()
@endpush

@section('container')
    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3">
            <h1 class="h5">Ticket List</h1>
            <a href="/tickets/create">
                <button type="button" class="btn btn-primary mb-2">Add Ticket</button>
            </a>
        </div>

        <div class="table-responsive">
            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    <strong>{{ session('message') }}</strong>
                </div>
            @endif
            @livewire('search-pagination')
        </div>

    </div>
@endsection

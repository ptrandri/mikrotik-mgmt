<div class="row">
    <div class="col-md-12">
        <input type="text" class="form-control" placeholder="Search" wire:model="search" />
        <table class="table table-bordered" style="margin: 10px 0 10px 0">
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
                <th scope="col">Updated Date</th>
            </tr>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>{{ $ticket->AgentName }}</td>
                    <td>
                        <a href="/tickets/{{ $ticket->id }}">{{ $ticket->SubjectCase }}</a>
                    </td>
                    <td>{{ $ticket->SubjectDesc }}</td>
                    <td>{{ $ticket->CallerName }}</td>
                    <td>{{ $ticket->Status }}</td>
                    <td>{{ $ticket->Priority }}</td>
                    <td>{{ $ticket->Assigned_to }}</td>
                    <td>{{ $ticket->created_at }}</td>
                    <td>{{ $ticket->updated_at }}</td>
                </tr>
            @endforeach
        </table>
        {{-- Pagination --}}
        <div class="d-flex justify-content-end m-1">{!! $tickets->links() !!}</div>
        {{-- end Pagination --}}
    </div>
</div>

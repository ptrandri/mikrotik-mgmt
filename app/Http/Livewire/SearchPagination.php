<?php

namespace App\Http\Livewire;

use App\Models\Ticket;
use Livewire\Component;
use Livewire\WithPagination;

class SearchPagination extends Component
{
    public $search= '';
    public $perPage = 2;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.search-pagination',[
            'tickets' => Ticket::where('AgentName','like', '%'.$this->search.'%')
            ->orWhere('SubjectCase' , 'like', '%'.$this->search.'%')
            ->orwhere('SubjectDesc', 'like', '%'.$this->search.'%')
            ->orWhere('CallerName' , 'like', '%'.$this->search.'%')
            ->orwhere('CallerEmail', 'like', '%'.$this->search.'%')
            ->orwhere('Status', 'like', '%'.$this->search.'%')
            ->orwhere('Priority', 'like', '%'.$this->search.'%')
            ->orwhere('Assigned_to', 'like', '%'.$this->search.'%')->paginate(2)
        ]);
    }
}

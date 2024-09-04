<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;


class TicketExport implements FromQuery, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function __construct(string $keyword, $start_date, $end_date)
    {
        $this->Assigned_to = $keyword;
        $this->start_date = $start_date;
        $this->end_date = $end_date;
    }
    public function query()
    {
        return Ticket::query()->where('Assigned_to', 'like', '%' . $this->Assigned_to . '%')
                              ->where('created_at', '>=', $this->start_date)
                              ->where('created_at', '<=', $this->end_date);
    }

    public function headings(): array
    {
        return [
            '#',
            'AgentName',
            'SubjectCase',
            'SubjectDesc',
            'CallerName',
            'CallerEmail',
            'Status',
            'Priority',
            'Assigned_to',
            'Image',
            'created_at',
            'updated_at'
        ];
    }
}
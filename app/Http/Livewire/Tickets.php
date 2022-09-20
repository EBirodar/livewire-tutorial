<?php

namespace App\Http\Livewire;

use App\Models\SupportTicket;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Tickets extends Component
{
    use WithPagination;
    use withFileUploads;
    public function render()
    {
        return view('livewire.tickets',[
            'tickets'=>SupportTicket::latest()->paginate(3)
        ]);
    }
}

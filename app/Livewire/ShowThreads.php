<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Thread;
use Livewire\Component;

class ShowThreads extends Component
{
    public $categorias;
    public $threads;
    public function render()
    {
        $this->categorias = Category::all();
        $this->threads = Thread::all();

        return view('livewire.show-threads');
    }
}

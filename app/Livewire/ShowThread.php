<?php

namespace App\Livewire;

use App\Models\Thread;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ShowThread extends Component
{
    public Thread $thread;
    public $body = '';

    public function render()
    {
        return view('livewire.show-thread',[
            'replies' => $this->thread
                ->replies()
                ->whereNull('reply_id')
                ->get()
        ]);
    }

    public function postReply(){
        
        // validar
        $this->validate([
            'body' => 'required'
        ]);
        // crear
        Auth::user()->replies()->create([
            'thread_id' => $this->thread->id,
            'body' => $this->body,
        ]);
        // refrescar
        $this->reset('body');
    }
}

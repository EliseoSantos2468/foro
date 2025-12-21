<?php

namespace App\Livewire;

use App\Models\Reply;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; #para usar las politicas
use Livewire\Component;

class ShowReply extends Component
{
    use AuthorizesRequests; #para usar las politicas
    public Reply $reply;
    public $body = '';
    public $is_creating = false;
    public $is_editing = false;

    public function updatedIsCreating(){
        $this->reset('body');
    }

    public function updatedIsEditing(){
        $this->body = $this->reply->body;
    }
    
    public function render()
    {
        return view('livewire.show-reply');
    }

    public function postChild(){
        if(! is_null($this->reply->reply_id)) return;
        // validar
        $this->validate([
            'body' => 'required'
        ]);
        // crear
        Auth::user()->replies()->create([
            'reply_id' => $this->reply->id,
            'thread_id' => $this->reply->thread->id,
            'body' => $this->body,
        ]);
        // refrescar
        $this->reset(['body', 'is_creating']);
    }

    public function updateReply(){

        $this->authorize('update', $this->reply);
        // validar
        $this->validate([
            'body' => 'required'
        ]);

        // actualizar
        $this->reply->update([
            'body' => $this->body,
        ]);

        // refrescar
        $this->reset(['body', 'is_editing']);
    }
}

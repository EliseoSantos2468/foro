<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Thread;
use Livewire\Attributes\Layout;
use Livewire\Component;


#[Layout('layouts.app')]
class ShowThreads extends Component
{
    public $search = '';
    public $category = '';
    public function render()
    {
        $categorias = Category::all();

        $query = Thread::query();
        $query->where('title', 'like', "%$this->search%");
            
        if($this->category){
            $query->where('category_id', $this->category);
        }

        $threads=$query->withCount('replies')->get();

        return view('livewire.show-threads',[
            'categorias' => $categorias,
            'threads' => $threads
        ]);
    }

    public function filterByCategory($category){
        $this->category = $category;
    }

}

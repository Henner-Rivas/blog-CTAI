<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Tag;
use Livewire\Component;
use App\Models\Counter as Counters;

class Counter extends Component
{
    public function render()
    {
        $counters = Counters::latest()->paginate(1);
        return view('livewire.counter', compact('counters'));
    }
}

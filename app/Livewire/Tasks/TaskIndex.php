<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TaskIndex extends Component
{

    public function render()
    {
        return view('livewire.tasks.task-index')
        ->layout('layouts.app');
    }
}

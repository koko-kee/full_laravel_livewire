<?php

namespace App\Livewire\Tasks;

use Livewire\Attributes\Reactive;
use Livewire\Component;

class TasksCount extends Component
{
    #[reactive]
    public $count;
    #[reactive]
    public $tasksByStatut;

    public function render()
    {
        return view('livewire.tasks.tasks-count');
    }
}

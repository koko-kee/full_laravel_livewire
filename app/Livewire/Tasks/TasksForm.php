<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use Illuminate\Support\Str;
use Livewire\Component;

class TasksForm extends Component
{
    public TaskForm $form;

    public function updatedFormTitle($value)
    {
        $this->form->slug = Str::slug($value);
    }

    public function save()
    {
        $this->validate();
        //auth()->user()->tasks()->create($this->only(['title','slug','description','status','priority','deadline']));
        $this->form->createTask();
        $this->dispatch('task-created');
    }

    public function render()
    {
        return view('livewire.tasks.tasks-form');
    }
}

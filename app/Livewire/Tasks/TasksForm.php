<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use App\Models\Task;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
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
        $this->form->createTask();
        $this->dispatch('task-created');
    }


    #[On('edit-task')]
    public function editTask($id)
    {
        $task = Task::find($id);
        $this->form->setTask($task);
    }


    public function render()
    {
        return view('livewire.tasks.tasks-form');
    }
}

<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    public ?Task $task;

    public $editMode = false;

    #[Validate('required')]
    public  $title;

    #[Validate('required')]
    public  $slug;

    #[Validate('required')]
    public  $description;

    public  $status;

    public  $priority;

    #[Validate('required')]
    public  $deadline;

    public function setTask(Task $task)
    {

        $this->task = $task;
        $this->editMode = true;

        $this->title = $task->title;
        $this->slug = $task->slug;

        $this->description = $task->description;

        $this->status = $task->status;

        $this->priority = $task->priority;

        $this->deadline = $task->deadline->format('Y-m-d');
    }

    public  function createTask()
    {
        if ($this->editMode) {

            $this->task->update($this->only(['title', 'slug', 'description', 'status', 'priority', 'deadline']));
            $this->reset();
            request()->session()->flash('success', 'Task updated successfully');
        } else {

            auth()->user()->tasks()->create(
                $this->only(['title', 'slug', 'description', 'status', 'priority', 'deadline'])
            );
            $this->reset();
            request()->session()->flash('success', 'Task create successfully');
        }
    }
}

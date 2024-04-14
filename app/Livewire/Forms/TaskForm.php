<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    #[Validate('required|min:5')]
    public  $title;

    #[Validate('required|min:5')]
    public  $slug;

    #[Validate('required')]
    public  $description;

    public  $status;

    public  $priority;

    #[Validate('required')]
    public  $deadline;

    public  function createTask()
    {
        auth()->user()->tasks()->create(
            $this->all()
        );
        $this->reset();
        request()->session()->flash('success','Task create successfully');
    }

}

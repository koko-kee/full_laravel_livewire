<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Attributes\Reactive;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use withPagination;

    public function changeStatut($id,$statut)
    {
        $task = Task::find($id);
        $task->status = $statut;
        $task->save();
    }
    public function placeholder()
    {
        return view('skeleton');
    }

    #[on('task-created')]
    public function render()
    {
        return view('livewire.tasks.tasks-list',[
            'tasks' => auth()->user()->tasks()->paginate(4),
            'count' => auth()->user()->tasks()->count(),
            'tasksByStatut' => auth()->user()->tasks()->select('status',DB::raw('COUNT(*) as count'))
            ->groupBy('status')
                ->orderBy('status','desc')
            ->get()
        ]);
    }

}

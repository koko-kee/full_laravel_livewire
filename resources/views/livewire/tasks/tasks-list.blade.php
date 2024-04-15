<div class="w-6/12 px-2">
    <livewire:tasks.tasks-count
        :count="$count"
        :tasksByStatut="$tasksByStatut"
    />
    @foreach($tasks as $task)
        <div  class="flex flex-col p-2 mb-3 mr-3 border rounded-lg shadow-md border-gray-50 bg-gray-50">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <div class="flex gap-4 mb-4">
                    <h5 class="text-2xl font-bold tracking-tight text-gray-900">{{$task->title}}</h5>
                    <span class="px-2 py-1 border rounded-md border-slate-200">{{$task->deadline->diffForHumans()}}</span>
                </div>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{$task->description}}
                </p>
                  <div class="flex justify-between">
                        <div class="flex gap-2">
                            @foreach (\App\Enums\StatutType::cases() as $case)
                            <button wire:click="changeStatut({{$task->id}},'{{$case->value}}')" type="button"
                                    @class([
                                    'px-4 py-2 bg-white rounded-lg shadow-md  focus:outline-none focus:ring focus:ring-indigo-500 font-bold text-xs border',
                                    $case->color() => $task->status
                                    ])
                                    {{$case->value == $task->status->value ? 'disabled' : ''}}>
                                    {{\Illuminate\Support\Str::of($case->value)->headline()}}
                            </button>
                            @endforeach
                        </div>
                        <div>
                            <x-primary-button class="bg-green-500 hover:bg-green-700" wire:click="$dispatch('edit-task', { id: {{$task->id}} })" >Edit</x-primary-button>
                            <x-primary-button wire:confirm='etes-vous sur de vouloir supprimer ?' class="bg-red-500 hover:bg-red-700" wire:click="delete({{$task->id}})" >Delete</x-primary-button>
                        </div>
                  </div>
            </div>
        </div>
    @endforeach
    <div class="p-3 mt-2">
       {{$tasks->links()}}
    </div>
</div>

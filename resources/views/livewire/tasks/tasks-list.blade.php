<div class="w-6/12 px-2">
    <livewire:tasks.tasks-count
        :count="$count"
        :tasksByStatut="$tasksByStatut"
    />
    @foreach($tasks as $task)
        <a href="" class="flex flex-col border border-gray-50 bg-gray-50 shadow-md rounded-lg p-2 mr-3 mb-3">
            <div class="flex flex-col justify-between p-4 leading-normal">
                <div class="flex gap-4 mb-4">
                    <h5 class="font-bold tracking-tight text-2xl text-gray-900">{{$task->title}}</h5>
                    <span class="px-2 py-1  border border-slate-200 rounded-md">{{$task->deadline->diffForHumans()}}</span>
                </div>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{$task->description}}
                </p>
                   <div class="flex gap-2">
                       @foreach (\App\Enums\StatutType::cases() as $case)
                       <button wire:click="changeStatut({{$task->id}},'{{$case->value}}')" type="button" class="px-2 py-1 bg-white rounded-lg shadow-md focus:ring-indigo-600">{{\Illuminate\Support\Str::of($case->value)->headline()}}</button>
                       @endforeach
                   </div>
            </div>
        </a>
    @endforeach
    <div class="mt-2 p-3">
       {{$tasks->links()}}
    </div>
</div>

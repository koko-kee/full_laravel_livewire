<div class="relative max-w-lg px-1 pt-1 w-96">
    <input wire:model.live="search" type="text"
           class="flex-1 block w-full px-3 py-2 mt-2 border-none rounded-md outline-none bg-slate-100"
           placeholder="Start Typing..." />
    <div class="absolute w-full mt-2 overflow-hidden bg-white rounded-md">
        @if(count($results) == 0 && strlen($search) > 2)
            <div class="px-3 py-2 cursor-pointer hover:bg-slate-100">
                <p class="text-sm font-medium text-gray-600">Aucun resultat trouver</p>
            </div>
        @else
            @foreach($results as $result)
                <div class="px-3 py-2 cursor-pointer hover:bg-slate-100">
                    <p class="text-sm font-medium text-gray-600">{{$result->title}}</p>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="w-5/12">
    @if (session('success'))
        <div class="w-full px-2 py-3 mb-4 text-center bg-green-300 rounded-md">
            {{session('success')}}
        </div>
    @endif
    <div class="p-4 rounded-md shadow-md bg-gray-50">
        <h2 class="text-3xl font-bold text-center">Bienvenue, <span class="text-indigo-500">{{auth()->user()->name}}</span> </h2>
        <p class="text-sm text-center text-gray-900">ceci est votre gestionnaire de tâches personnel</p>
        <form wire:submit='save'>
            <div class="mb-3">
                <label class="block mb-3 " for="title">title</label>
                <input wire:model="form.title" class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue" type="text" name="" id="">
                <div>
                    @error('form.title') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="block mb-3 " for="title">Slug</label>
                <input wire:model="form.slug" disabled class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue" type="text" name="" id="">
                <div>
                    @error('form.slug') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="mb-3">
                <label class="block mb-3 " for="title">Description</label>
                <textarea wire:model="form.description"  class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue" name="" id="" name="" id="" cols="10" rows="2"></textarea>
                <div>
                    @error('form.description') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mb-3">
                <label class="block mb-3 " for="title">Status</label>
                <select wire:model="form.status" class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50">
                    @foreach (\App\Enums\StatutType::cases() as $statut)
                        <option value="{{$statut->value}}">{{$statut->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="block mb-3 " for="title">Priority</label>
                <select wire:model="form.priority"  class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50">
                    @foreach (\App\Enums\PriorityType::cases() as $priority)
                        <option value="{{$priority->value}}">{{$priority->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="block mb-3 " for="title">Deadline</label>
                <input wire:model="form.deadline" class="w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue" type="date" name="" id="">
                <div>
                    @error('form.deadline') <span class="text-sm text-red-500">{{ $message }}</span> @enderror
                </div>
            </div>
            <button class="flex gap-1 px-3 py-2 font-bold bg-indigo-500 rounded-lg text-gray-50" type="submit">
                soumettre
                <div wire:loading role="status">
                    <svg aria-hidden="true" class="inline w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-gray-600 dark:fill-gray-300" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </form>
    </div>
</div>

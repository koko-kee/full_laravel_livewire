<div>
    <div class="flex py-12 mx-auto max-w-7xl">
            <div class="flex flex-wrap w-7/12 gap-2 mr-3">
                @foreach ($this->images as $image)
                    <div class="flex flex-col items-center justify-between w-56 p-4 rounded-md shadow-md bg-gray-50">
                        <img  class="w-full rounded-md" src="{{ Storage::url($image->path) }}" alt="" srcset="">
                        <x-primary-button wire:click='dowload({{$image->id}})'>Dowload</x-primary-button>
                    </div>
                @endforeach
            </div>
        <div class="w-4/12">
            <div class="p-4 rounded-md shadow-md bg-gray-50">
                <form wire:submit="save" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label class="block mb-3 " for="title">Upload Image</label>
                        <input wire:model="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue" type="file" name="" id="">
                        {{-- @if($image)
                            <img class="mt-3 rounded-md w-18 h-18" src="{{$image->temporaryUrl()}}" alt="">
                        @endif --}}
                    </div>
                    <x-primary-button>Upload</x-primary-button>
                </form>
            </div>
        </div>

   </div>
</div>

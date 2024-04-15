<?php

namespace App\Livewire;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;

class ImageIndex extends Component
{

    use WithFileUploads;
    public $image;

    public function save()
    {
        $name = $this->image->getClientOriginalName();
        $path = $this->image->storeAs('images', $name, 'public');
        Image::create([
            'name' => $name,
            'path' => $path
        ]);
    }

    #[Computed()]
    public function images()
    {
        return Image::all();
    }

    public function dowload($id)
    {
        $image = Image::find($id);
        return Storage::disk('public')->download($image->path, $image->name);
    }

    public function render()
    {
        return view('livewire.image-index')
            ->layout('layouts.app');
    }
}

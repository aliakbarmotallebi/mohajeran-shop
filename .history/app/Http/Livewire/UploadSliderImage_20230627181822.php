<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Slider;
use Livewire\WithFileUploads;
use Image;
use Illuminate\Support\Facades\Storage;


class UploadSliderImage extends Component
{
    use WithFileUploads;

    public $sliders;

    public $photo;

    public $updateMode = false;

    protected $listeners = [
        'changeImagesOrRemove' => 'updateSliders',
    ];

    public function mount()
    {
        $this->updateSliders();
    }

    public function updatedPhoto()
    {
        $this->validate([
            'photo' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        ]);

        $name = $this->photo->store('/','public');

        $rename = "images/sliders/{$name}";
        $crop = public_path($rename);

        $img = Image::make(storage_path("app/public/{$name}"))
            ->resize(600, 600, function ($constraint){
            $constraint->aspectRatio();
        })->save($crop);
    
        Slider::create([
            'image' => $rename
        ]);
        $this->updateSliders();
    }


    public function updateSliders()
    {
        $this->sliders = Slider::latest()->get() ?? collect();
    }

    public function remove(int $id)
    {
        $slider = Slider::find($id);
        if($slider){
            $slider->delete();
        }
        $this->updateSliders();
    }

    public function render()
    {
        return view('livewire.upload-slider-image');
    }
}

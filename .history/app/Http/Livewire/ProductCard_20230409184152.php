<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\WithFileUploads;
use Image;

class ProductCard extends Component
{
    use WithFileUploads;

    public $product;

    public $photo;

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function updatedPhoto()
    {

        
        $this->validate([
            'photo' => 'required|image|mimes:jpeg,png,svg,jpg,gif|max:1024',
        ]);

        $name = $this->photo->store('/','public');

        $rename = "images/products/{$name}";
        $crop = public_path($rename);

        $img = Image::make(storage_path("app/public/{$name}"))
            ->resize(300, 300, function ($constraint){
            $constraint->aspectRatio();
        })->save($crop);


        $this->product->image = $rename;

        $this->product->save();

    }

    public function setFeatured()
    {
        $this->product->is_special = !$this->product->is_special;

        $this->product->save();
    }

    public function removeImage()
    {
        $this->product->image = null;

        $this->product->save();
    }

    public function render()
    {
        return view('dashboard.products._product-card');
    }
}

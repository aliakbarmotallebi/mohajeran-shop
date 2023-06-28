<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainGroup;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = MainGroup::orderBy('is_vendor', 'ASC')->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function edit(Request $request, MainGroup $mainGroup)
    {
        return view('dashboard.categories.edit', [
            'category' => $mainGroup
        ]);
    }

    public function update(Request $request, MainGroup $mainGroup)
    {
        $mainGroup->is_vendor = $request->get('vendor');
        $mainGroup->time = $request->get('time');
         if($request->has('image')) {
             $file = $this->upload($request->file('image'));
             $mainGroup->image = $file;
         }

        $mainGroup->save();
        return redirect()->route('dashboard.categories.index');
    }

    protected function upload(UploadedFile $file)
    {
        $name = md5(Str::random(25)) . "." . $file->getClientOriginalExtension();

        $fullImageName = "/uploads/sliders/". $name;

        $file->move(public_path("/uploads/sliders/") , $name);

        return $fullImageName;
    }
}

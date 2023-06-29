<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MainGroup;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = MainGroup::orderBy('is_vendor', 'DESC')->get();
        return view('dashboard.categories.index', compact('categories'));
    }

    public function edit(Request $request, MainGroup $mainGroup)
    {
        $users = User::whereRole('Vendor')->get();
        return view('dashboard.categories.edit', [
            'category' => $mainGroup,
            'users' => $users
        ]);
    }

    public function update(Request $request, MainGroup $mainGroup)
    {
        $mainGroup->owner_id = $request->get('owner_id');
        $mainGroup->is_vendor = $request->get('vendor', 0);
        $mainGroup->time = $request->get('time');
         if($request->has('image')) {
             $file = $this->upload($request->file('image'));
             $mainGroup->image = $file;
         }

        $mainGroup->save();
        alert()->success('اطلاعات سیستم با موفقیت تغییر یافت');
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

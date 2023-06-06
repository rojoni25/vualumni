<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Str;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['page_name'] = "All Sliders";
        $data['title'] = "All Sliders";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        $sliders = Slider::where(['status' => 1])->latest()->get();
        return view('admin.cms.sliders.list', $data, compact('sliders'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['page_name'] = "All Sliders";
        $data['title'] = "Add Sliders";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        return view('admin.cms.sliders.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validate = $request->validate(
            [
                'title' => 'string|required',
                'photo' => 'image|required|mimes:jpeg,png,jpg,gif|max:2048',
            ]
        );
        if (!$validate) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = $photo->getClientOriginalName();
            $extension = $photo->getClientOriginalExtension();
            $newName = fileNameSanitizer($extension, Str::uuid());
            // $path = $photo->store('photos'); // Store the file in the 'photos' directory
            $image = Image::make($photo);
            $width = $image->width();
            $height = $image->height();
            $size = $image->filesize();
            $image->resize(1920, 716, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('slider/large/'.$newName);
            $directory = 'public/images/slider/large';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());

            $image = Image::make($photo);
            $image->resize(480, 320, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('slider/large/'.$newName);
            $directory = 'public/images/slider/mobile';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());

            $image = Image::make($photo);
            $image->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('slider/large/'.$newName);
            $directory = 'public/images/slider/thumb';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());

        }

        $slider = new Slider();
        $slider->title = $request->title;
        $slider->url = urlSanitizer($request->url);
        $slider->group = $request->group;
        $slider->category = $request->category;
        $slider->pinned = $request->pinned ?? 0;
        $slider->photo = $newName;
        $slider->added_by = auth()->id();
        $slider->expiration = $request->expiration != '' ? date('Y-m-d H:i:s', strtotime($request->expiration)) : null;
        $slider->width = $width;
        $slider->height = $height;
        $slider->size = $size / 1024;
        $slider->save();

        return redirect()->route('admin.cms.slider.index')->with('success', 'Slider has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $slider = Slider::find($id);
        $data['page_name'] = "All Sliders";
        $data['title'] = "Edit Sliders";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        return view('admin.cms.sliders.form', compact('slider'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validate = $request->validate(
            [
                'title' => 'string|required',
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]
        );
        if (!$validate) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $slider = Slider::find($id);
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = $photo->getClientOriginalName();
            $extension = $photo->getClientOriginalExtension();
            $newName = fileNameSanitizer($extension, Str::uuid());
            // $path = $photo->store('photos'); // Store the file in the 'photos' directory
            $image = Image::make($photo);
            $width = $image->width();
            $height = $image->height();
            $size = $image->filesize();
            $image->resize(1920, 716, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('slider/large/'.$newName);
            $directory = 'public/images/slider/large';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());

            $image = Image::make($photo);
            $image->resize(480, 320, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('slider/large/'.$newName);
            $directory = 'public/images/slider/mobile';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());

            $image = Image::make($photo);
            $image->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('slider/large/'.$newName);
            $directory = 'public/images/slider/thumb';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());

            $slider->photo = $newName;
            $slider->width = $width;
            $slider->height = $height;
            $slider->size = $size / 1024;

        }


        $slider->title = $request->title;
        $slider->url = urlSanitizer($request->url);
        $slider->group = $request->group;
        $slider->category = $request->category;
        $slider->pinned = $request->pinned ?? 0;
        $slider->added_by = auth()->id();
        $slider->expiration = $request->expiration != '' ? date('Y-m-d H:i:s', strtotime($request->expiration)) : null;
        $slider->save();

        return redirect()->route('admin.cms.slider.index')->with('success', 'Slider has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $slider = Slider::find($id);
        $slider->delete();
        return redirect()->route('admin.cms.slider.index')->with('success', 'Slider has been deleted.');

    }
}

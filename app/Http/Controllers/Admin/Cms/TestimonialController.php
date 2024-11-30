<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Web\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Str;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['page_name'] = "All Testimonials";
        $data['title'] = "All Testimonials";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        $testimonials = Testimonial::where(['status' => 1])->latest()->get();
        return view('admin.cms.testimonials.list', $data, compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['page_name'] = "All Testimonials";
        $data['title'] = "Add Testimonial";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        $users = User::whereHas('membershipInfo')->get();
        return view('admin.cms.testimonials.form',$data,compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        if($request->user != 2){
            $user = User::find($request->user);
            $testimonial = new Testimonial();
            $testimonial->user_id = $user->id;
            $testimonial->user_name = $user->name;
            $testimonial->designation = $user->membershipInfo->ocupation->position.', '.$user->membershipInfo->ocupation->organization;
            $testimonial->user_avatar = $user->membershipInfo->photo;
            $testimonial->tagline  = $request->tagline;
            $testimonial->content  = $request->content;
            $testimonial->added_by  = auth()->id();
            $testimonial->save();
        }
        else{
            if ($request->hasFile('user_avatar')) {
                $photo = $request->file('user_avatar');
                $filename = $photo->getClientOriginalName();
                $extension = $photo->getClientOriginalExtension();
                $newName = fileNameSanitizer($extension, Str::uuid());
                // $path = $photo->store('photos'); // Store the file in the 'photos' directory
                $image = Image::make($photo);
                $width = $image->width();
                $height = $image->height();
                $size = $image->filesize();
                $image->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // $image->save('slider/large/'.$newName);
                $directory = 'public/images/testimonial/users';
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }
                Storage::put($directory . '/' . $newName, $image->stream()->__toString());


            $testimonial = new Testimonial();
            $testimonial->user_id = $request->user;
            $testimonial->user_name = $request->user_name;
            $testimonial->designation = $request->designation;
            $testimonial->user_avatar = 'storage/images/testimonial/users/'.$newName;
            $testimonial->tagline  = $request->tagline;
            $testimonial->content  = $request->content;
            $testimonial->added_by  = auth()->id();
            $testimonial->save();
        }}

        return redirect()->route('admin.cms.testimonial.index')->with('success','Testimonial has been added successfully');
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
        $users = User::whereHas('membershipInfo')->get();
        $testimonial = Testimonial::find($id);
        $data['page_name'] = "All Testimonials";
        $data['title'] = "Edit Testimonial";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        return view('admin.cms.testimonials.form', compact('testimonial','users'), $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $testimonial = Testimonial::find($id);
        if($request->user != 2){
            $user = User::find($request->user);
            $testimonial->user_id = $user->id;
            $testimonial->user_name = $user->name;
            $testimonial->designation = $user->membershipInfo->ocupation->position.', '.$user->membershipInfo->ocupation->organization;
            $testimonial->user_avatar = $user->membershipInfo->photo;
            $testimonial->tagline  = $request->tagline;
            $testimonial->content  = $request->content;
            $testimonial->added_by  = auth()->id();
            $testimonial->save();
        }
        else{
            if ($request->hasFile('user_avatar')) {
                $photo = $request->file('user_avatar');
                $filename = $photo->getClientOriginalName();
                $extension = $photo->getClientOriginalExtension();
                $newName = fileNameSanitizer($extension, Str::uuid());
                // $path = $photo->store('photos'); // Store the file in the 'photos' directory
                $image = Image::make($photo);
                $width = $image->width();
                $height = $image->height();
                $size = $image->filesize();
                $image->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // $image->save('slider/large/'.$newName);
                $directory = 'public/images/testimonial/users';
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }
                Storage::put($directory . '/' . $newName, $image->stream()->__toString());


                $testimonial->user_avatar = 'storage/images/testimonial/users/'.$newName;

            }
            $testimonial->user_id = $request->user;
            $testimonial->user_name = $request->user_name;
            $testimonial->designation = $request->designation;
            $testimonial->tagline  = $request->tagline;
            $testimonial->content  = $request->content;
            $testimonial->added_by  = auth()->id();
            $testimonial->save();
        return redirect()->route('admin.cms.testimonial.index')->with('success','Testimonial has been added successfully');
    }
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return redirect()->route('admin.cms.testimonial.index')->with('success', 'Testimonial has been deleted.');
    }
}

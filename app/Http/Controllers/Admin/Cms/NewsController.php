<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Web\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Str;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['page_name'] = "All News";
        $data['title'] = "All News";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        $newses = News::where(['status' => 1])->latest()->get();
        return view('admin.cms.news.list', $data, compact('newses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['page_name'] = "All News";
        $data['title'] = "Add News";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        $users = User::whereHas('membershipInfo')->get();
        return view('admin.cms.news.form',$data,compact('users'));
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
                'thumbnail' => 'image|required|mimes:jpeg,png,jpg,gif|max:2048',
            ]
        );
        if (!$validate) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        if ($request->hasFile('thumbnail')) {
            $photo = $request->file('thumbnail');
            $filename = $photo->getClientOriginalName();
            $extension = $photo->getClientOriginalExtension();
            $newName = fileNameSanitizer($extension, Str::uuid());
            // $path = $photo->store('photos'); // Store the file in the 'photos' directory
            $image = Image::make($photo);
            $width = $image->width();
            $height = $image->height();
            $size = $image->filesize();
            $image->resize(800, 600, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('news/large/'.$newName);
            $directory = 'public/images/news/large';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());

            $image = Image::make($photo);
            $image->resize(400, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('news/large/'.$newName);
            $directory = 'public/images/news/mobile';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());

            $image = Image::make($photo);
            $image->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('news/large/'.$newName);
            $directory = 'public/images/news/thumb';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());

        }
        $news = new News();
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->content = $request->content;
        $news->group = $request->group;
        $news->category = $request->category;
        $news->pinned = $request->pinned ?? 0;
        $news->thumbnail = $newName;
        $news->added_by = auth()->id();
        $news->news_date = $request->news_date != '' ? date('Y-m-d H:i:s', strtotime($request->news_date)) : date('Y-m-d H:i:s');
        $news->save();

        return redirect()->route('admin.cms.news.index')->with('success','News added successfully');
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
        $news = News::find($id);
        $data['page_name'] = "All News";
        $data['title'] = "Edit News";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        $users = User::whereHas('membershipInfo')->get();
        return view('admin.cms.news.form',$data,compact('users','news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $news = News::find($id);

        $validate = $request->validate(
            [
                'title' => 'string|required',
                // 'thumbnail' => 'image|required|mimes:jpeg,png,jpg,gif|max:2048',
            ]
        );
        if (!$validate) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        if ($request->hasFile('thumbnail')) {
            $photo = $request->file('thumbnail');
            $filename = $photo->getClientOriginalName();
            $extension = $photo->getClientOriginalExtension();
            $newName = fileNameSanitizer($extension, Str::uuid());
            // $path = $photo->store('photos'); // Store the file in the 'photos' directory
            $image = Image::make($photo);
            $width = $image->width();
            $height = $image->height();
            $size = $image->filesize();
            $image->resize(800, 600, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('news/large/'.$newName);
            $directory = 'public/images/news/large';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());

            $image = Image::make($photo);
            $image->resize(400, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('news/large/'.$newName);
            $directory = 'public/images/news/mobile';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());

            $image = Image::make($photo);
            $image->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('news/large/'.$newName);
            $directory = 'public/images/news/thumb';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());

            $news->thumbnail = $newName;
        }
        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->content = $request->content;
        $news->group = $request->group;
        $news->category = $request->category;
        $news->pinned = $request->pinned ?? 0;
        $news->added_by = auth()->id();
        $news->news_date = $request->news_date != '' ? date('Y-m-d H:i:s', strtotime($request->news_date)) : date('Y-m-d H:i:s');
        $news->save();

        return redirect()->route('admin.cms.news.index')->with('success','News added successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $news = News::find($id);
        $news->delete();
        return redirect()->route('admin.cms.news.index')->with('success','News deleted successfully');
    }
}

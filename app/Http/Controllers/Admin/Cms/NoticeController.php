<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Web\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Str;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['page_name'] = "All Notice";
        $data['title'] = "All Notice";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        $notices = Notice::where(['status' => 1])->latest()->get();
        return view('admin.cms.notice.list', $data, compact('notices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['page_name'] = "All Notice";
        $data['title'] = "Add Notice";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        return view('admin.cms.notice.form', $data);
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
                'file' => 'file|mimes:jpeg,png,jpg,gif,pdf,xls,xlsx,doc,docx|max:10240',
            ]
        );
        if (!$validate) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $newName = fileNameSanitizer($extension, Str::uuid());
            if( in_array($file->getMimeType(),['image/jpeg','image/png','image/gif','image/webp'])){
                $image = Image::make($file);
                $width = $image->width();
                $height = $image->height();
                $size = $image->filesize();
                $image->resize(800, 600, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // $image->save('notice/large/'.$newName);
                $directory = 'public/images/notice/'.date('Y').'/'.date('m').'/large';
                $filePath = 'storage/images/notice/'.date('Y').'/'.date('m').'/large/'.$newName;
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }
                Storage::put($directory . '/' . $newName, $image->stream()->__toString());

                $image = Image::make($file);
                $image->resize(400, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // $image->save('notice/large/'.$newName);
                $directory = 'public/images/notice/'.date('Y').'/'.date('m').'/mobile';
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }
                Storage::put($directory . '/' . $newName, $image->stream()->__toString());

                $image = Image::make($file);
                $image->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // $image->save('notice/large/'.$newName);
                $directory = 'public/images/notice/'.date('Y').'/'.date('m').'/thumb';
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }
                Storage::put($directory . '/' . $newName, $image->stream()->__toString());
            }else{
                $directory = 'public/files/notice/'.date('Y').'/'.date('m');
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }
                $path = $file->store($directory); // Store the file in the $directory directory
                $filePath = str_replace('public','storage',$path);
            }

        }
        $notice = new Notice();
        $notice->title = $request->title;
        $notice->content = $request->content;
        $notice->group = $request->group;
        $notice->category = $request->category;
        $notice->pinned = $request->pinned  ? 1 : 0;
        $notice->file = $filePath;
        $notice->added_by = auth()->id();
        $notice->expiration = $request->expiration != '' ? date('Y-m-d H:i:s', strtotime($request->expiration)) : date('Y-m-d H:i:s');
        $notice->save();

        return redirect()->route('admin.cms.notice.index')->with('success','Notice added successfully');
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
        $data['page_name'] = "All Notice";
        $data['title'] = "Edit Notice";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        $notice = Notice::find($id);
        return view('admin.cms.notice.form', $data, compact('notice'));
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
                'file' => 'file|mimes:jpeg,png,jpg,gif,pdf,xls,xlsx,doc,docx|max:10240',
                ]
            );
            $notice = Notice::find($id);
        if (!$validate) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $newName = fileNameSanitizer($extension, Str::uuid());
            if( in_array($file->getMimeType(),['image/jpeg','image/png','image/gif','image/webp'])){
                $image = Image::make($file);
                $width = $image->width();
                $height = $image->height();
                $size = $image->filesize();
                $image->resize(800, 600, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // $image->save('notice/large/'.$newName);
                $directory = 'public/images/notice/'.date('Y').'/'.date('m').'/large';
                $filePath = 'storage/images/notice/'.date('Y').'/'.date('m').'/large/'.$newName;
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }
                Storage::put($directory . '/' . $newName, $image->stream()->__toString());

                $image = Image::make($file);
                $image->resize(400, 300, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // $image->save('notice/large/'.$newName);
                $directory = 'public/images/notice/'.date('Y').'/'.date('m').'/mobile';
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }
                Storage::put($directory . '/' . $newName, $image->stream()->__toString());

                $image = Image::make($file);
                $image->resize(150, 150, function ($constraint) {
                    $constraint->aspectRatio();
                });
                // $image->save('notice/large/'.$newName);
                $directory = 'public/images/notice/'.date('Y').'/'.date('m').'/thumb';
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }
                Storage::put($directory . '/' . $newName, $image->stream()->__toString());
            }else{
                $directory = 'public/files/notice/'.date('Y').'/'.date('m');
                if (!Storage::exists($directory)) {
                    Storage::makeDirectory($directory);
                }
                $path = $file->store($directory); // Store the file in the $directory directory
                $filePath = str_replace('public','storage',$path);
            }

            $notice->file = $filePath;
        }
        $notice->title = $request->title;
        $notice->content = $request->content;
        $notice->group = $request->group;
        $notice->category = $request->category;
        $notice->pinned = $request->pinned  ? 1 : 0;
        $notice->added_by = auth()->id();
        $notice->expiration = $request->expiration != '' ? date('Y-m-d H:i:s', strtotime($request->expiration)) : date('Y-m-d H:i:s');
        $notice->save();

        return redirect()->route('admin.cms.notice.index')->with('success','Notice edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $notice = Notice::find($id);
        $notice->delete();
        return redirect()->route('admin.cms.notice.index')->with('success','Notice deleted successfully');

    }
}

<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Web\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Str;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['page_name'] = "All Event";
        $data['title'] = "All Event";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        $events = Event::where(['status' => 1])->latest()->get();
        return view('admin.cms.event.list', $data, compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['page_name'] = "All Event";
        $data['title'] = "Add Event";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        return view('admin.cms.event.form', $data);
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
                'event_date' => 'string|required',
                'venue' => 'string|required',
            ]
        );
        if (!$validate) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $start_date = date('Y-m-d H:i:s', strtotime(explode(' to ', $request->event_date)[0]));
        $end_date = date('Y-m-d H:i:s', strtotime(explode(' to ', $request->event_date)[1]));
        $registration_start_date = date('Y-m-d H:i:s', strtotime(explode(' to ', $request->registration_date)[0]));
        $registration_end_date = date('Y-m-d H:i:s', strtotime(explode(' to ', $request->registration_date)[1]));

        if ($request->hasFile('thumbnail')) {
            $photo = $request->file('thumbnail');
            $filename = $photo->getClientOriginalName();
            $extension = $photo->getClientOriginalExtension();
            $newThumbName = fileNameSanitizer($extension, Str::uuid());
            // $path = $photo->store('photos'); // Store the file in the 'photos' directory
            $image = Image::make($photo);
            $width = $image->width();
            $height = $image->height();
            $size = $image->filesize();
            $image->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('event/large/'.$newThumbName);
            $directory = 'public/images/event/thumbnail/large';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newThumbName, $image->stream()->__toString());
            $image = Image::make($photo);
            $image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('event/large/'.$newThumbName);
            $directory = 'public/images/event/thumbnail/mobile';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newThumbName, $image->stream()->__toString());
            $image = Image::make($photo);
            $image->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('event/large/'.$newThumbName);
            $directory = 'public/images/event/thumbnail/thumb';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newThumbName, $image->stream()->__toString());
        }
        if ($request->hasFile('banner')) {
            $photo = $request->file('banner');
            $filename = $photo->getClientOriginalName();
            $extension = $photo->getClientOriginalExtension();
            $newName = fileNameSanitizer($extension, Str::uuid());
            // $path = $photo->store('photos'); // Store the file in the 'photos' directory
            $image = Image::make($photo);
            $width = $image->width();
            $height = $image->height();
            $size = $image->filesize();
            $image->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('event/large/'.$newName);
            $directory = 'public/images/event/banner/large';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());
            $image = Image::make($photo);
            $image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('event/large/'.$newName);
            $directory = 'public/images/event/banner/mobile';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());
            $image = Image::make($photo);
            $image->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('event/large/'.$newName);
            $directory = 'public/images/event/banner/thumb';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());
        }

        $event = new Event();
        $event->title = $request->title;
        $event->url = $request->url;
        $event->registration_url = $request->registration_url;
        $event->venue = $request->venue;
        $event->group = $request->group;
        $event->category = $request->category;
        $event->content = $request->content;
        $event->registration_start = $registration_start_date;
        $event->registration_end = $registration_end_date;
        $event->event_start = $start_date;
        $event->event_end = $end_date;
        $event->thumbnail = $newThumbName;
        $event->banner = $newName;
        $event->pinned = $request->pinned ? 1 : 0;
        $event->added_by = auth()->id();
        $event->save();
        return redirect()->route('admin.cms.event.index')->with('success', 'Event added successfully');
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
        $data['page_name'] = "All Event";
        $data['title'] = "Add Event";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        $event = Event::find($id);
        return view('admin.cms.event.form', $data,compact('event'));
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
                'event_date' => 'string|required',
                'venue' => 'string|required',
            ]
        );
        if (!$validate) {
            return redirect()->back()->withErrors($validate)->withInput();
        }
        $event = Event::find($id);
        $start_date = date('Y-m-d H:i:s', strtotime(explode(' to ', $request->event_date)[0]));
        $end_date = date('Y-m-d H:i:s', strtotime(explode(' to ', $request->event_date)[1]));
        $registration_start_date = date('Y-m-d H:i:s', strtotime(explode(' to ', $request->registration_date)[0]));
        $registration_end_date = date('Y-m-d H:i:s', strtotime(explode(' to ', $request->registration_date)[1]));

        if ($request->hasFile('thumbnail')) {
            $photo = $request->file('thumbnail');
            $filename = $photo->getClientOriginalName();
            $extension = $photo->getClientOriginalExtension();
            $newThumbName = fileNameSanitizer($extension, Str::uuid());
            // $path = $photo->store('photos'); // Store the file in the 'photos' directory
            $image = Image::make($photo);
            $width = $image->width();
            $height = $image->height();
            $size = $image->filesize();
            $image->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('event/large/'.$newThumbName);
            $directory = 'public/images/event/thumbnail/large';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newThumbName, $image->stream()->__toString());
            $image = Image::make($photo);
            $image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('event/large/'.$newThumbName);
            $directory = 'public/images/event/thumbnail/mobile';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newThumbName, $image->stream()->__toString());
            $image = Image::make($photo);
            $image->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('event/large/'.$newThumbName);
            $directory = 'public/images/event/thumbnail/thumb';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newThumbName, $image->stream()->__toString());
            $event->thumbnail = $newThumbName;

        }
        if ($request->hasFile('banner')) {
            $photo = $request->file('banner');
            $filename = $photo->getClientOriginalName();
            $extension = $photo->getClientOriginalExtension();
            $newName = fileNameSanitizer($extension, Str::uuid());
            // $path = $photo->store('photos'); // Store the file in the 'photos' directory
            $image = Image::make($photo);
            $width = $image->width();
            $height = $image->height();
            $size = $image->filesize();
            $image->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('event/large/'.$newName);
            $directory = 'public/images/event/banner/large';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());
            $image = Image::make($photo);
            $image->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('event/large/'.$newName);
            $directory = 'public/images/event/banner/mobile';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());
            $image = Image::make($photo);
            $image->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $image->save('event/large/'.$newName);
            $directory = 'public/images/event/banner/thumb';
            if (!Storage::exists($directory)) {
                Storage::makeDirectory($directory);
            }
            Storage::put($directory . '/' . $newName, $image->stream()->__toString());
            $event->banner = $newName;

        }
        $event->title = $request->title;
        $event->url = $request->url;
        $event->registration_url = $request->registration_url;
        $event->venue = $request->venue;
        $event->group = $request->group;
        $event->category = $request->category;
        $event->content = $request->content;
        $event->registration_start = $registration_start_date;
        $event->registration_end = $registration_end_date;
        $event->event_start = $start_date;
        $event->event_end = $end_date;
        $event->pinned = $request->pinned ? 1 : 0;
        $event->added_by = auth()->id();
        $event->save();
        return redirect()->route('admin.cms.event.index')->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $event = Event::find($id);
        $event->delete();
        return redirect()->route('admin.cms.event.index')->with('success', 'Event deleted successfully');
    }
}

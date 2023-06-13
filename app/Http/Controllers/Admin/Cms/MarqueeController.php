<?php

namespace App\Http\Controllers\Admin\Cms;

use App\Http\Controllers\Controller;
use App\Models\Web\Marquee;
use Illuminate\Http\Request;

class MarqueeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['page_name'] = "All Marquee";
        $data['title'] = "All Marquee";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        $marquees = Marquee::where(['status' => 1])->latest()->get();
        return view('admin.cms.marquee.list', $data, compact('marquees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $data['page_name'] = "All Marquee";
        $data['title'] = "Add Marquee";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        return view('admin.cms.marquee.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $marquee = new Marquee();
        $marquee->title = $request->title;
        $marquee->content_url = $request->content_url;
        $marquee->category = $request->category;
        $marquee->group = $request->group;
        $marquee->expiration = $request->expiration != '' ? date('Y-m-d H:i:s', strtotime($request->expiration)) : null;
        $marquee->pinned = $request->pinned ? 1 : 0;
        $marquee->added_by = auth()->id();
        $marquee->status = 1;
        $marquee->save();

        return redirect()->route('admin.cms.marquee.index')->with('success','Marquee added successfully');
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
        $data['page_name'] = "All Marquee";
        $data['title'] = "Edit Marquee";
        $data['category_name'] = "cms";
        $data['has_scrollspy'] = 0;
        $marquee = Marquee::find($id);
        return view('admin.cms.marquee.form', $data,compact('marquee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $marquee = Marquee::find($id);
        $marquee->title = $request->title;
        $marquee->content_url = $request->content_url;
        $marquee->category = $request->category;
        $marquee->group = $request->group;
        $marquee->expiration = $request->expiration != '' ? date('Y-m-d H:i:s', strtotime($request->expiration)) : null;
        $marquee->pinned = $request->pinned ? 1 : 0;
        $marquee->added_by = auth()->id();
        $marquee->status = 1;
        $marquee->save();

        return redirect()->route('admin.cms.marquee.index')->with('success','Marquee updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $marquee = Marquee::find($id);
        $marquee->delete();
        return redirect()->route('admin.cms.marquee.index')->with('success','Marquee deleted successfully');
    }
}

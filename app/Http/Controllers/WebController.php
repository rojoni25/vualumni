<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Web\Event;
use App\Models\Web\Marquee;
use App\Models\Web\Notice;
use App\Models\Web\Testimonial;
use App\Models\Web\News;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinnedSliders = Slider::where(['group' => 'web', 'status' => 1, 'pinned' => 1])->orderBy('order', 'asc')->take(8)->get();
        $sliders = Slider::where(['group' => 'web', 'status' => 1, 'pinned' => 0])->orderBy('id', 'desc')->take(8)->get();
        $marquees = Marquee::where(['group' => 'web', 'status' => 1])->where('expiration', '>', date('y-m-d H:i:s'))->get();
        $notices = Notice::where(['group' => 'web', 'status' => 1])->latest()->take(10)->get();
        $events = Event::where(['group' => 'web', 'status' => 1])->latest()->take(10)->get();
        $testimonials = Testimonial::where(['video' => null, 'status' => 1])->orderBy('order','ASC')->take(10)->get();
        return view('web.home', compact('sliders', 'marquees', 'notices', 'testimonials', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

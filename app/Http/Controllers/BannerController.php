<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/banners', $imageName);
        $banner = new Banner();
        $banner->title = $request->title;
        $banner->image = $imageName;
        $banner->url = $request->url;
        if ($request->has('status')) {
            $banner->status = $request->status;
        }else{
            $banner->status = 0;
        }
        $banner->save();
        return redirect()->route('banners.index')->with('success', 'Banner created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function showDetailBanner(Request $request)
    {
        $banner_id = $request->banner_id;
        $banner = Banner::find($banner_id);
        return response()->json($banner);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $banner = Banner::find($id);
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp',
            ]);
        }
        catch (\Exception $e) {
            return redirect()->back()->with('success', $e->getMessage());
        }
        $banner = Banner::find($id);
        $banner->title = $request->title;
        if ($request->has('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/banners', $imageName);
            $banner->image = $imageName;
        }
        $banner->url = $request->url;
        if ($request->has('status')) {
            $banner->status = $request->status;
        }else{
            $banner->status = 0;
        }
        $banner->save();
        return redirect()->route('banners.index')->with('success', 'Banner updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        return redirect()->route('banners.index')->with('success', 'Banner deleted successfully!');
    }
}

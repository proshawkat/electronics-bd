<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate(10);
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'title' => 'string|max:255',
            'image_url' => 'required|image|max:2048',
        ]);

        $imageUrl = $this->uploadImage($request->file('image_url'));

        Slider::create([
            'title' => $request->title,
            'link' => $request->link,
            'image_url' => $imageUrl,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'title' => 'string|max:255',
            'image_url' => 'nullable|image|max:2048',
        ]);

        $imageUrl = $slider->image_url;
        if ($request->hasFile('image_url')) {
            if (file_exists(public_path($slider->image_url))) {
                unlink(public_path($slider->image_url));
            }
            $imageUrl = $this->uploadImage($request->file('image_url'));
        }

        $slider->update([
            'title' => $request->title,
            'link' => $request->link,
            'image_url' => $imageUrl,
            'status' => $request->status ?? 1,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully.');
    }

    private function uploadImage($file, $folder = 'sliders')
    {
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('uploads/' . $folder), $filename);

        return 'uploads/' . $folder . '/' . $filename;
    }
}

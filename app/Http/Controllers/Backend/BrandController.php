<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(10);
        return view('backend.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('backend.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:191',
        ]);

        try {
            Brand::create([
                'name'       => $request->name,
                'slug'       => Str::slug($request->name),
                'status'     => $request->status ?? false,
                'created_by' => Auth::id(),
            ]);

            return redirect()->route('admin.brands.index')->with('success', 'Brand created successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1] ?? null;
            if($errorCode == 1062){
                return redirect()->back()->withInput()->with('error', 'Brand with this name already exists.');
            }
            return redirect()->back()->withInput()->with('error', 'Database Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function edit(Brand $brand)
    {
        return view('backend.brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|string|max:191',
        ]);

        try {
            $brand->update([
                'name'   => $request->name,
                'slug'   => Str::slug($request->name),
                'status' => $request->status ?? false,
            ]);

            return redirect()->route('admin.brands.index')->with('success', 'Brand updated successfully.');
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1] ?? null;
            if($errorCode == 1062){
                return redirect()->back()->withInput()->with('error', 'Brand with this name already exists.');
            }
            return redirect()->back()->withInput()->with('error', 'Database Error: ' . $e->getMessage());
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Error: ' . $e->getMessage());
        }
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('admin.brands.index')->with('success', 'Brand deleted successfully.');
    }
}

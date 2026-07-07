<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::with('product')->latest()->paginate(20);
        return view('backend.offer.index', compact('offers'));
    }

    public function create()
    {
        $products = Product::where('no_sale_price', 0)->where('is_clearance_outlet', 0)->get();
        return view('backend.offer.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => [
                'required',
                'exists:products,id',
                Rule::unique('offers')->where(function ($query) use ($request) {
                    return $query->where('product_id', $request->product_id)
                                 ->where('min_qty', $request->min_qty);
                }),
            ],
            'min_qty' => 'required|integer|min:1',
            'discount_type' => 'required|in:percent,fixed',
            'discount_value' => 'required|numeric|min:0',
        ], [
            'product_id.unique' => 'An offer with the same minimum quantity already exists for this product.',
        ]);

        Offer::create($request->all());

        return redirect()->route('admin.offers.index')->with('success', 'Offer created successfully!');
    }

    public function edit(Offer $offer)
    {
        $products = Product::where('no_sale_price', 0)->where('is_clearance_outlet', 0)->get();
        return view('backend.offer.edit', compact('offer', 'products'));
    }

    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'product_id' => [
                'required',
                'exists:products,id',
                Rule::unique('offers')->where(function ($query) use ($request) {
                    return $query->where('product_id', $request->product_id)
                                 ->where('min_qty', $request->min_qty);
                })->ignore($offer->id),
            ],
            'min_qty' => 'required|integer|min:1',
            'discount_type' => 'required|in:percent,fixed',
            'discount_value' => 'required|numeric|min:0',
        ], [
            'product_id.unique' => 'An offer with the same minimum quantity already exists for this product.',
        ]);

        $offer->update($request->all());

        return redirect()->route('admin.offers.index')->with('success', 'Offer updated');
    }

    public function destroy(Offer $offer)
    {
        $offer->delete();
        return back()->with('success', 'Offer deleted');
    }
}

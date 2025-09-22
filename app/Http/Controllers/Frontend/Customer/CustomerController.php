<?php

namespace App\Http\Controllers\Frontend\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use App\Models\Region;

class CustomerController extends Controller
{
    public function dashboard(){
        $breadcrumbs = [
            ['title' => 'Account', 'url' => '#']
        ];
        return view('frontend.customer.dashboard', compact('breadcrumbs'));
    }

    public function getAddress(){
        $customerId = Auth::guard('customer')->id();
        $breadcrumbs = [
            ['title' => 'Account', 'url' => '#'],
            ['title' => 'Address', 'url' => '#'],
        ];
        $addresses = Address::where('customer_id', $customerId)->get();
        return view('frontend.customer.address', compact('breadcrumbs', 'addresses'));
    }

    public function newAddress(){
        $regions = Region::get(['name', 'id']);
        $breadcrumbs = [
            ['title' => 'Account', 'url' => '#'],
            ['title' => 'New Address', 'url' => '#'],
        ];
        return view('frontend.customer.new_address', compact('breadcrumbs', 'regions'));
    }

    public function editAddress($id)
    {
        $regions = Region::get(['name', 'id']);
        $address = Address::findOrFail($id);
        $breadcrumbs = [
            ['title' => 'Account', 'url' => '#'],
            ['title' => 'Address', 'url' => '#'],
        ];
        return view('frontend.customer.edit_address', compact('address', 'breadcrumbs', 'regions'));
    }

    public function storeAddress(Request $request){
        $request->validate([
            'firstname'  => 'required|string|max:255',
            'lastname'   => 'required|string|max:255',
            'address_1'  => 'required|string|max:255',
            'city'       => 'required|string|max:255',
            'zone_id'    => 'required|exists:regions,id',
        ]);

        Address::create([
            'customer_id' => auth('customer')->id(),
            'first_name'  => $request->firstname,
            'last_name'   => $request->lastname,
            'address_1'   => $request->address_1,
            'address_2'   => $request->address_2 ?? null,
            'city'        => $request->city,
            'zone_id'     => $request->zone_id,
            'telephone'   => $request->telephone,
            'email'       => $request->email,
        ]);

        return redirect()->route('customer.address')->with('success', 'Address added successfully.');
    }

    public function updateAddress(Request $request, $id)
    {
        $request->validate([
            'firstname'  => 'required|string|max:255',
            'lastname'   => 'required|string|max:255',
            'address_1'  => 'required|string|max:255',
            'city'       => 'required|string|max:255',
            'zone_id'    => 'required|exists:regions,id',
        ]);

        $address = Address::where('id', $id)
            ->where('customer_id', auth('customer')->id())
            ->firstOrFail();

        $address->update([
            'first_name'  => $request->firstname,
            'last_name'   => $request->lastname,
            'address_1'   => $request->address_1,
            'address_2'   => $request->address_2 ?? null,
            'city'        => $request->city,
            'zone_id'     => $request->zone_id,
            'telephone'   => $request->telephone,
            'email'       => $request->email,
        ]);

        return redirect()->route('customer.address')->with('success', 'Address updated successfully.');
    }

    public function deleteAddress($id)
    {
        $address = Address::findOrFail($id);
        $address->delete();

        return redirect()->back()->with('success', 'Address deleted successfully.');
    }

    public function editInfo()
    {
        $breadcrumbs = [
            ['title' => 'Account', 'url' => '#'],
            ['title' => 'Edit Info', 'url' => '#'],
        ];
         $user = auth('customer')->user();
        return view('frontend.customer.edit_info', compact('breadcrumbs', 'user'));
    }

    public function updateInfo(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:customers,email,' . auth('customer')->id(),
            'telephone'  => 'nullable|string|max:20',
        ]);

        $customer = auth('customer')->user();

        $customer->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'  => $request->telephone,
        ]);

        return redirect()->route('customer.dashboard')->with('success', 'Your information has been updated successfully.');
    }

}

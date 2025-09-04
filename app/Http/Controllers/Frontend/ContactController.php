<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactController extends Controller
{
    public function index(){
        $breadcrumbs = [
            ['title' => 'Contact Us', 'url' => '#']
        ];
        return view('frontend.contact', compact('breadcrumbs'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|string|max:50',
            'topic' => 'nullable|string|max:100',
            'message' => 'required|string|max:250',
        ]);

        ContactUs::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'topic'       => $request->topic,
            'message'     => $request->message,
        ]);

        return redirect()->route('contact.index')->with('success', 'Message successfully.');
    }
}

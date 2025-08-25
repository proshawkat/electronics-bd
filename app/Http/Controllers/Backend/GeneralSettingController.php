<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use Illuminate\Support\Facades\Cache;

class GeneralSettingController extends Controller
{
    public function edit()
    {
        $settings = GeneralSetting::first();
        if (!$settings) {
            $settings = GeneralSetting::create([]);
        }

        return view('backend.general_settings.edit', compact('settings'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'logo' => 'nullable|image|max:2048',
            'email' => 'nullable|email',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:11',
            'second_phone' => 'nullable|string|max:11',
            'facebook' => 'nullable|url',
            'youtube' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'whatsapp' => 'nullable|string',
            'google_map' => 'nullable|string',
        ]);

        $settings = GeneralSetting::first();

        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/settings'), $filename);
            $settings->logo = 'uploads/settings/'.$filename;
        }

        $settings->update($request->except(['logo','_token']));
        Cache::forget('general_settings');

        return redirect()->back()->with('success', 'Settings updated successfully!');
    }
}

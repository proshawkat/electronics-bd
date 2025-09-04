<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsletter;
use App\Models\Customer;
use App\Models\ContactUs;

class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function getNewsletter(){
        $newsletters = Newsletter::latest()->paginate(15);
        return view('backend.newsletter', compact('newsletters'));
    }

    public function getCustomer(){
        $customers = Customer::latest()->paginate(15);
        return view('backend.customer', compact('customers'));
    }

    public function getContactUs(){
        $contacts = ContactUs::latest()->paginate(15);
        return view('backend.contact', compact('contacts'));
    }
}

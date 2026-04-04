<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ParadiseController extends Controller
{
        public function store(Request $request){
        $request->validate([
            'name' => 'required|regex:/^[A-Za-z ]+$/',
            'email' => 'required|email|unique:contacts,email',
            'phone' => 'required|digits:10',
            'message' => 'required'
        ]);

        Contact::create($request->all());
        return back()->with('success','Contact information saved succesfully');
    }
    //admin code
    public function index()
{
    $contacts = Contact::latest()->get();

    return view('admin.admincontact', compact('contacts'));
}

}

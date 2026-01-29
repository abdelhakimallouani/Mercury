<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::with('group')->get();
        return view('contacts.contacts',compact('contacts'));
    }
    public function create()
    {
        $groups = Group::all();
        $contacts = Contact::all();
        return view('contacts.createcontact', compact('groups', 'contacts'));
    }

    public function store(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $group_id = $request->group_id;

        // valisation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email|max:255',
            'phone' => 'required|string|max:20|unique:contacts,phone',
            'group_id' => 'required|exists:groups,id',
        ]);
        //insertion
        Contact::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'group_id' => $group_id,
        ]);

        return redirect()->back();
    }
}

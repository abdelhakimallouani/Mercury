<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $groups = Group::all();
        $contacts = Contact::with('group')->get();
        return view('contacts.contacts',compact('contacts','groups'));
    }
    public function create()
    {
        $groups = Group::all();
        $contacts = Contact::all();
        return view('contacts.createcontact', compact(['groups', 'contacts']));
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

        return redirect()->route('contacts.index');
    }

    public function edit(Contact $contact)
    {
        $groups = Group::all();
        return view('contacts.edit', compact('contact', 'groups'));
    }

    public function update(Request $request, Contact $contact)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $group_id = $request->group_id;

        // valisation
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:contacts,email,' . $contact->id,
            'phone' => 'required|string|max:20|unique:contacts,phone,' . $contact->id,
            'group_id' => 'required|exists:groups,id',
        ]);

        // update
        $contact->update([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'group_id' => $group_id,
        ]);

        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact){
        
        $contact->delete();
        return to_route('contacts.index');
    }
}

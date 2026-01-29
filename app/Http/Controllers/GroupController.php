<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Group;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(Request $request)
    {
        $groups = Group::query();

        if($request->input('search')) {
            $groups = $groups->where('name', 'like', '%' . $request->search . '%');
        }
        $groups = $groups->get();
        return view('groups.groups', compact('groups'));
    }

    public function createGroup()
    {
        $contacts = Group::all();
        return view('groups.creategroup', compact('contacts'));
    }

    public function store(Request $request)
    {
        $name = $request->name;

        // valisation
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        //insertion
        Group::create([
            'name' => $name,
        ]);

        return redirect()->route('groups.index');
    }

    public function showOne(Request $request)
    {

        $id = $request->id;
        $groups = Group::findOrfail($id);
        $contacts = Contact::where('group_id', $id)->get();
        return view('groups.showone', compact('groups', 'contacts'));
    }

    public function edit(Group $group)
    {
        return view('groups.edit', compact('group'));
    }

    public function update(Request $request, Group $group)
    {
        $name = $request->name;

        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $group->update([
            'name' => $name,
        ]);
        return redirect()->route('groups.index');
    }

    public function destroy(Group $group)
    {
        $group->delete();
        return to_route('groups.index');
    }
}

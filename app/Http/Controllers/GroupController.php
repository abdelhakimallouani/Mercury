<?php

namespace App\Http\Controllers;
use App\Models\Group;

use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(){
        $groups = Group::all();
        return view('groups.groups',compact('groups'));
    }

    public function createGroup()
    {
        $contacts = Group::all();
        return view('groups.creategroup', compact('contacts'));
    }

    public function store(Request $request){
        $name = $request->name;

        // valisation
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        //insertion
        Group::create([
            'name' => $name,
        ]);

        return redirect()->back();
    }

}

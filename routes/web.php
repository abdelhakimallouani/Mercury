<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\Contact;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/groups/groups', [GroupController::class, 'index'])->name('groups.index');
Route::get('/groups/creategroup', [GroupController::class, 'createGroup'])->name('groups.createGroup');
Route::post('/groups/store', [GroupController::class, 'store'])->name('groups.store');
Route::get('/groups/showone/{id}', [GroupController::class, 'showOne'])->name('groups.showOne');


Route::get('/contacts/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/createcontact', [ContactController::class, 'create'])->name('contacts.createContact');
Route::post('/contacts/store', [ContactController::class, 'store'])->name('contacts.store');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
Route::put('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return Contact::all();
    }

    public function show($id)
    {
        return Contact::findOrFail($id);
    }

    public function store(ContactRequest $request)
    {
        $contact = Contact::create($request->all());
        return response()->json($contact, 201);
    }

    public function update(ContactRequest $request, $id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        return response()->json($contact, 200);
    }

    public function destroy($id)
    {
        Contact::destroy($id);
        return response()->json(null, 204);
    }
}

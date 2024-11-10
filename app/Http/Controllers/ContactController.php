<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        Contact::create($data);
        return back();
    }
    public function delete(Contact $contact) {
        $contact->delete();
        return back();
    }
}

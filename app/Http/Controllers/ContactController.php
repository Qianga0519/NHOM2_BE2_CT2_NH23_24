<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function index()
    {
        $contacts = Contact::orderBy('Created_at', 'DESC')->search()->paginate(10);
        return view('admin.contact.index', compact('contacts'));
    }
    public function destroy($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->back()->with('del_contact_1', 'Deleted!');
    }
}

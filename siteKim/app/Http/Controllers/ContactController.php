<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('admin.contact-us.index', compact('contacts'));
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|digits:10|numeric',
            'subject' => 'required',
            'message' => 'required'
        ]);
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->subject = $request->input('subject');
        $contact->message = $request->input('message');
        $contact->statut = 0;
        $contact->save();

        return back()->with(['status' => 'Merci de nous avoir contacter ! Nous vous répondrons au plus vite.']);
    }

    public function contact(){
        return view('contactForm');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'statut' => 'required',
        ]);

        $contact = Contact::find($id);
        $contact->statut = $request->input('statut');
        $contact->update();

        return back()->with('status','Message lu !');
    }
}

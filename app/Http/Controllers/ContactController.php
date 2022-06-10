<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\User;

class ContactController extends Controller
{
    public function index()
    {
        return view('userpanel.contact.index');
    }

    public function save(Request $request)
    {
        $validUser  = null;
        $validUser  = $request->validate([
            'title' => 'required',
            'contact_file' => 'required|image|mimes:jpeg,png,jpg,pdf|max:5000',
        ]);

        $title = $request->title;
        $user = User::where('role_id', 1)->first();
        $email = $user->email;

        $contact_file_path = '';

        if ($request->hasFile('contact_file')) {

            $contact_file_name = mt_rand(999999999, time()).'.'.$request->contact_file->extension();
            $contact_file_path = public_path('uploads/'.$contact_file_name);
            $request->contact_file->move(public_path('uploads/'), $contact_file_name);

            $data = ['title' => $title, 'email' => $email, 'attachment' => $contact_file_path];

            if (!file_exists($contact_file_path)) {
                dd('Attachment file not exists.');
            }

            Mail::send('emails.contactEmailTemplate', ['code' => ''], function($message) use($data){
                $message->to($data['email']);
                $message->subject('Contact Email');
                $message->attach($data['attachment']);
            });

            if( count(Mail::failures()) > 0 ) {
                $message = 'Email not send.';
                return redirect()->back()->with('errorMessage', 'Email not send.');   
                
            } else {

                if (file_exists($contact_file_path)) {
                    unlink($contact_file_path);
                }

                $message = 'Email send.';

            }

        }

        // if($user->save()) {
        //     return redirect()->back()->with('successMessage', 'user saved successfully'); 
        // } else {
        //     return redirect()->back()->with('errorMessage', 'something wrong to save user');   
        // }
    }
}

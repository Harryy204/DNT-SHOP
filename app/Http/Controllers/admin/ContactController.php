<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->input('name');
        $contacts = Contact::query();

        if ($name) {
            $contacts->where('name', 'like', '%' . $name . '%');
        }

        $newMessagesCount = Contact::where('status', 'new')->count();
        $contacts = $contacts->latest()->paginate(10);

        return view('admin.contact.contacts', compact('contacts', 'newMessagesCount'));
    }
    
    public function show($id)
    {
        $contacts = Contact::findOrFail($id);
        $contacts->status = 'read';
        $contacts->save();
        $newMessagesCount = Contact::where('status', 'new')->count();

        return view('admin.contact.show', compact('contacts', 'newMessagesCount'));
    }

    public function reply($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contact.reply', compact('contact'));
    }
    public function sendReply(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $request->validate([
            'reply_message' => 'required|string|max:1000',
        ], [
            'reply_message.required' => 'Vui lòng nhập phản hồi',
        ]);

        Mail::to($contact->email)->send(new ContactReplyMail($contact, $request->input('reply_message')));

        $contact->save();

        return redirect()->route('admin.contacts')->with('success', 'Phản hồi đã được gửi!');
    }

    public function destroy($id)
    {
        $contacts = Contact::findOrFail($id);
        $contacts->delete();

        return redirect()->route('admin.contacts')->with('success', 'Xóa tin nhắn thành công!');
    }
}

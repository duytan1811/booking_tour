<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function contact()
    {
        return view('client.contact.index');
    }

    public function contactHandle(Request $request)
    {
        $this->validateForm($request);

        Contact::create($request->all());
        return redirect()->route('contact');

        return redirect()->route('contact');
    }

    private function validateForm(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'comment' => 'required',
        ], [
            'first_name.required'       => 'Vui lòng nhập họ',
            'last_name.required'       => 'Vui lòng nhập tên',
            'email.required'       => 'Vui lòng nhập địa chỉ email',
            'email.email'        => 'Định dạng email chưa chính xác',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'comment.required' => 'Vui lòng nhập nội dung',
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;
use App\Mail\SendMail;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Slide;
use App\Models\ProductType;
use App\Models\Trademark;

class ContactController extends Controller
{
    public function create()
    {
        $slides = Slide::all();
        $productTypes = ProductType::all();
    
        $cartItems = collect(); // khởi tạo rỗng
        $total = 0;
        $trademarks = Trademark::all();
    
        if (Auth::check()) {
            $user = Auth::user();
            $cartItems = Cart::with('product')
                ->where('user_id', $user->id)
                ->get();
    
            $total = $cartItems->sum(function ($item) {
                return $item->quantity * $item->unit_price;
            });
        }
    
        return view('user.contact.form', compact('cartItems', 'total', 'productTypes', 'slides', 'trademarks'));
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Lưu vào DB
        $contact = Contact::create([
            'title' => 'Khách hàng gửi liên hệ từ website của bạn',
            'title1' => 'Chúng tôi đã nhận được một yêu cầu liên hệ từ khách hàng.',
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'status' => 0, // 0: chưa xử lý, 1: đã xử lý
        ]);

        // Gửi email đến admin
        $sentData = [
            'email' => $request->email,
            'name' => $request->name,
            'title' => 'Khách hàng gửi liên hệ:',
            'body' => $request->message,
        ];
        Mail::to('levanthanhdz001@gmail.com')->send(new SendMail($sentData));

        return redirect()->back()->with('success', 'Gửi liên hệ thành công! Chúng tôi sẽ phản hồi sớm.');
    }
    ///
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contacst.index', compact('contacts'));
    }

    public function destroy($id)
    {
        Contact::destroy($id);
        return redirect()->back()->with('success', 'Xóa phản hồi thành công');
    }

    public function replyForm($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacst.reply', compact('contact'));
    }

    public function sendReply(Request $request, $id)
    {
        
        $request->validate([
            'reply' => 'required|string',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->reply = $request->reply;
        $contact->status = 1;
        $contact->save();

        // Gửi email phản hồi đến khách hàng    
        Mail::send('emails.contact_reply', [
            'name' => $contact->name,
            'userMessage' => $contact->message,
            'reply' => $contact->reply
        ], function ($message) use ($contact) {
            $message->to($contact->email)
                    ->subject('Phản hồi từ quản trị viên');
        });
        

        return redirect()->route('admin.contacts.index')->with('success', 'Đã phản hồi và gửi email cho khách hàng.');
    }
}


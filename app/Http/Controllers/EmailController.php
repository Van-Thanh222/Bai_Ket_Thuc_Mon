<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;
class EmailController extends Controller
{
    public function getInputEmail()
    {
        return view('emails.input-email');
    }

    public function postInputEmail(Request $req)
    {
        $email = $req->txtEmail;
        $phone = $req->txtPhone;

        // Tìm user với email và số điện thoại khớp
        $user = User::where('email', $email)->where('phone', $phone)->first();

        if ($user) {
            // Tạo mật khẩu mới
            $newPassword = Str::random(8);

            // Gửi email
            $sentData = [
                'email' => $email,
                'name' => $user->name,
                'phone' => $phone,
                'title' => 'Mật khẩu mới của bạn là:',
                'title1' => 'Chúng tôi đã nhận được yêu cầu liên hệ từ bạn.:',
                'body' => $newPassword,
            ];
            Mail::to($email)->send(new \App\Mail\SendMail($sentData));

            // Cập nhật mật khẩu mới trong DB (đã mã hóa)
            $user->password = bcrypt($newPassword);
            $user->save();

            Session::flash('message', 'Mật khẩu mới đã được gửi đến email của bạn.');
            return redirect()->route('postInputEmail'); // quay về form đăng nhập
        } else {
            return redirect()->route('getInputEmail')->with('message', 'Email hoặc số điện thoại không đúng.');
        }
    }
}

<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    public function index(){
        return view('account.my-account');
    }

    public function store(Request $request){
        $user = Auth::user();

        $request->validate([
            'full_name' => ['string','max:255'],
            'email' => ['email','unique:users,email,'.$user->userID.',userID'],
            'phone' => ['string','digits:10'],
            'address' => ['string','max:500'],
            'avatar' => ['required','mimes:jpeg,jpg,png,webp','max:2048'],
        ],[
            'full_name.max' => 'Họ tên chỉ được phép tối da 255 kí tự',
            'email.email' => 'Sai định dạng email, vui lòng nhập lại',
            'email.unique' => 'Email đã được sử dụng',
            'phone.digits' => 'Số điện thoại phải có 10 số',
            'address.max' => 'Tối đa 500 kí tự',
            'avatar.required' => 'Ảnh đại diện không được để trống!',
            'avatar.mimes' => 'Ảnh đại diện phải có định dạng jpeg, jpg, webp hoặc png!',
            'avatar.max' => 'Ảnh đại diện không được vượt quá 2MB!',
        ]);

        $user->full_name = $request->full_name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->address = $request->address ;

       if($request->hasFile('avatar')){
            // xóa avatar cũ nếu có
            if(File::exists(public_path($user->avatar))){
                File::delete(public_path($user->avatar));
            }

            if($request->file('avatar')->isValid()){
                $user->avatar = saveImage($request->file('avatar'),'/uploads/avatars','');
            }
       }
       $user->save();

       return back()->with('success','Thay đổi thông tin thành công');
    }

    public function changePassword(Request $request){
        $user = Auth::user();

        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
            'new_password_confirmation' => 'required'
        ],[
            'old_password.required' => 'Nhập mật khẩu cũ',
            'new_password.required' => 'Nhập mật khẩu mới',
            'new_password_confirmation.required' => 'Nhập lại mật khẩu mới',
            'new_password.min' => 'Mật khẩu mới phải tối thiểu 8 kí tự',
            'new_password.confirmed' => 'Mật khẩu mới không trùng nhau',
        ]);

        if(!Hash::check($request->old_password,$user->password)){
            return back()->withInput($request->only('old_password'))->withErrors(['old_password' => 'Mật khẩu hiện tại không đúng.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();
        return back()->with('success', 'Đổi mật khẩu thành công!');
    }
}

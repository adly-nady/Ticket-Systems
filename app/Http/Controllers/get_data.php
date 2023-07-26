<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tickets;
use App\Models\User;
use App\Models\category;
use App\Models\reply_tickets;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class get_data extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function get_me()
    {
        return Auth::user();
    }
    public function do_login(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if (!$validator->fails()) {
            if (Auth::attempt(['email' => $R->email, 'password' => $R->password])) {
                $R->session()->regenerate();
                return redirect()->intended('Dashboard');
            } else {
                return back()->withErrors([
                    'email' => "error in your data",
                ]);
            }
        } else {
            return back()->withErrors([
                'email' => $validator->errors()->first('email'),
                'password' => $validator->errors()->first('password'),
            ]);
        }
    }
    public function get_all_category()
    {
        return category::get();
    }
    public function get_all_ticket()
    {
        $data = tickets::orderBy('id', 'DESC')->limit(50)->get();
        foreach ($data as $key => $value) {
            $data[$key]['name_user'] = User::find($value->owner_id)->name;
            $data[$key]['name_category'] = category::find($value->type_of_category)->name;
            if ($value->re_id)
                $data[$key]['name_assign'] = User::find($value->re_id)->name;
        }
        return response()->json($data);
    }
    public function get_my_ticket()
    {
        $data = tickets::where('owner_id', Auth::user()->id)->orderBy('id', 'DESC')->limit(50)->get();
        foreach ($data as $key => $value) {
            $data[$key]['name_user'] = User::find($value->owner_id)->name;
            $data[$key]['name_category'] = category::find($value->type_of_category)->name;
        }
        return response()->json($data);
    }
    public function get_this_ticket(Request $R)
    {
        $data = tickets::find($R->id);
        $data['name_user'] = User::find($data->owner_id)->name;
        $data['name_category'] = category::find($data->type_of_category)->name;
        return $data;
    }
    public function get_reply_this_ticket(Request $R)
    {
        $data = reply_tickets::where('id_ticket', $R->id)->orderBy('id', 'DESC')->limit(50)->get();
        foreach ($data as $key => $value) {
            $data[$key]['name_user'] = User::find($value->id_user)->name;
            $data[$key]['image_user'] = User::find($value->id_user)->image;
        }
        return $data;
    }
    public function get_all_user()
    {
        return User::limit(50)->get();
    }
}

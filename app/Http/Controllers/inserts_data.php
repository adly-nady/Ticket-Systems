<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\reply_tickets;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\tickets;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class inserts_data extends Controller
{
    /* public function __construct()
    {
        $this->middleware('auth');
    }*/
    public function save_new_person(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'phone' => 'required|max:11',
            'password' => 'required|max:255',
        ]);
        if (!$validator->fails()) {
            try {
                $files = "";
                $new_path = "";
                if ($R->file != null) {
                    $files = microtime(true) . '.' . $R->file->getClientOriginalExtension();
                    $R->file->move(public_path() . '/img/', $files);
                    $new_path = '/img/' . $files;
                }
                User::insert([
                    'image' => $new_path,
                    'name' => $R->name,
                    'email' => $R->email,
                    'phone' => $R->phone,
                    'password' => Hash::make($R->password),
                    'status' => $R->Layout ?? "User",
                ]);
                return response()->json(['done' => "done"]);
            } catch (\Exception $e) {
                return response()->json([
                    'other_error' => " Check your data "
                ]);
            }
        } else {
            return response()->json([
                'error_name' => $validator->errors()->first('name'),
                'error_email' => $validator->errors()->first('email'),
                'error_phone' => $validator->errors()->first('phone'),
                'error_password' => $validator->errors()->first('password'),
            ]);
        }
    }
    public function save_new_ticket(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'subject' => 'required|max:200',
            'type_of_category' => 'required|max:1',
            'content' => 'required|max:400',
            'case_ticket' => 'required|max:100',

        ]);
        if (!$validator->fails()) {
            try {
                $files = "";
                $new_path = "";
                if ($R->file != null) {
                    $files = microtime(true) . '.' . $R->file->getClientOriginalExtension();
                    $R->file->move(public_path() . '/img/', $files);
                    $new_path = '/img/' . $files;
                }
                tickets::insert([
                    'image' => $new_path,
                    'subject' => $R->subject,
                    'type_of_category' => $R->type_of_category,
                    'content' => $R->content,
                    'case_ticket' => $R->case_ticket,
                    'date' => date("Y/m/d"),
                    'owner_id' => Auth::user()->id
                ]);

                return response()->json(['Done' => "Done"]);
            } catch (\Exception $e) {
                return response()->json([
                    'other_error' => " Check your data "
                ]);
            }
        } else {
            return response()->json([
                'error_file' => $validator->errors()->first('file'),
                'error_subject' => $validator->errors()->first('subject'),
                'error_type_of_category' => $validator->errors()->first('type_of_category'),
                'error_content' => $validator->errors()->first('content'),
                'error_case_ticket' => $validator->errors()->first('case_ticket'),
            ]);
        }
    }
    public function delete_el_category(Request $R)
    {
        category::find($R->id)->delete();
    }
    public function new_category(Request $R)
    {
        category::insert(['name' => $R->name]);
    }
    public function delete_row(Request $R)
    {
        tickets::find($R->id)->delete();
    }
    public function Do_Aassign(Request $R)
    {
        tickets::find($R->ticket_id)->update([
            're_id' => $R->user_id
        ]);
    }
    public function Do_save_reply(Request $R)
    {
        if ($R->data) {
            reply_tickets::insert([
                'id_ticket' => $R->ticket_id,
                'id_user' => Auth::user()->id,
                'content' => $R->data,
                'date' => date("Y/m/d"),
            ]);
            return ["done" => "done"];
        } else {
            return "no data";
        }
    }
    public function save_new_name(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'data' => 'required|unique:users,name'
        ]);
        if (!$validator->fails()) {
            User::find(Auth::user()->id)->update(["name" => $R->data]);
            return ["done" => "done"];
        }
        return ['error' => $validator->errors()->first('data'),];
    }
    public function save_new_phone(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'data' => 'required|unique:users,phone'
        ]);
        if (!$validator->fails()) {
            User::find(Auth::user()->id)->update(["phone" => $R->data]);
            return ["done" => "done"];
        }
        return ['error' => $validator->errors()->first('data'),];
    }
    public function save_new_password(Request $R)
    {
        $validator = Validator::make($R->all(), [
            'old_password' => 'required',
            'new_password' => 'required'
        ]);
        if (!$validator->fails()) {
            if (Hash::check($R->old_password, Auth::user()->password))
                User::find(Auth::user()->id)->update(["password" => Hash::make($R->new_password)]);
            else
                return ["error1" => "wrong password"];
            return ["done" => "done"];
        }
        return ['error1' => $validator->errors()->first('old_password'), 'error2' => $validator->errors()->first('new_password')];
    }
    public function update_new_person(Request $R)
    {
        /*

        $error = [];save_new_password
        $user = Auth::user();
        if ($R->name != $user->name)

            if (Hash::check($R->old_password, $user->passowrd)) {
            } else {
                array_push($error, ["old_password" => "Not matching"]);
            }

        $validator = Validator::make($R->all(), [
            'name' => 'required|max:200|unique:users,name',
            'email' => 'required|unique:users,email',

        ]);
        */
    }
}

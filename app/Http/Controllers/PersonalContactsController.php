<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PersonalContacts;
use Auth;
class PersonalContactsController extends Controller
{
    public function add($id)
    {

        $user_id = Auth::user()->id;
        if ($id) {
            $pcInfo  = PersonalContacts::where('user_id', $user_id)->where('contact_id', $id)->first();
            

            if ($pcInfo) {
                return json_encode(['status' => false, 'msg' => 'Contact is already at your personal contacts']);
            } else {
                try {
                    $data = [
                        'user_id' => $user_id,
                        'contact_id' => $id
                    ];

                    PersonalContacts::insert($data);
                    return json_encode(['status' => true, 'msg' => 'Contact added to personal contacts']);
                } catch (\Throwable $th) {
                    return json_encode(['status' => false, 'msg' => 'Contact not added to personal contacts']);
                }
            }
        }
    }
}

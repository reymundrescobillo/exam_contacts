<?php

namespace App\Http\Controllers;
use App\Models\GeneralContacts;
use App\Models\PersonalContacts;
use Illuminate\Http\Request;
use Auth;

class GeneralContactsController extends Controller
{
    public function index()
    {

        $contacts = GeneralContacts::paginate(15);
        $pc = PersonalContacts::with('gc')->where('user_id' , Auth::user()->id)->get();

        $data['pc'] = $pc;
        $data['contacts'] = $contacts;
        
        return view('home' , $data);
    }
}

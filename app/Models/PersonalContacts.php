<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalContacts extends Model
{
    use HasFactory;

    public function gc()
    {
        return $this->belongsTo(GeneralContacts::class, 'contact_id', 'id');
    }

}

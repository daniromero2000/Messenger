<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversations extends Model
{
    protected $appends = ['contact_name'];

    public function getContactNameAttribute()
    {
        //Query Builder 
        return $this->contact()->first(['name'])->name;
    }

    public function contact()
    {
        return $this->belongsTo(User::class, 'contact_id');
    }
}

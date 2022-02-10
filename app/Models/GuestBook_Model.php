<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestBook_Model extends Model
{
    use HasFactory;

    protected $table = "guest_book";

    protected $fillable = ['firstname', 'lastname', 'organization', 'province_id', 'city_id', 'address'];

}

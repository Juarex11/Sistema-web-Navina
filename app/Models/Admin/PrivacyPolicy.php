<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PrivacyPolicy extends Model
{
    protected $fillable = ['title', 'description', 'image'];
}

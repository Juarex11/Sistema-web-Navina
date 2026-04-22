<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    public function index() {

        $questions = FAQ::all();
        return view('public.questions.index', compact('questions'));

    }
}

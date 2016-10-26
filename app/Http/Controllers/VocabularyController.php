<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use App\Models\Vocabulary;

class VocabularyController extends Controller
{
    public function lists() {
        $data = DB::table('vocabulary')->paginate(15);
        return view('lists', ['vocabulary' => $data]);
    }
}

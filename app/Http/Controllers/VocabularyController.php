<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class VocabularyController extends Controller
{
    public function index()
    {
        $data = DB::table('vocabulary')->paginate(15);
        return view('vocabulary.lists', ['vocabulary' => $data]);
    }

    public function hashView(Request $request)
    {

        $validator = $this->validate($request, [
            'words' => 'required',
            'hash' => 'required',
        ]);

        if ($validator) {
            return redirect()->back()->withErrors($validator);
        }

        $hashWords = [];

        foreach ($request->hash as $value) {
            if ($value === 'md5') {
                foreach ($request->words as $word) {
                    $hashWords[$word]['MD5'] = hash('MD5', $word);
                }
            }

            if ($value === 'sha256') {
                foreach ($request->words as $word) {
                    $hashWords[$word]['SHA-256'] = hash('sha256', $word);
                }
            }

            if ($value === 'sha512') {
                foreach ($request->words as $word) {
                    $hashWords[$word]['SHA-512'] = hash('sha512', $word);
                }
            }

            if ($value === 'sha1') {
                foreach ($request->words as $word) {
                    $hashWords[$word]['SHA-1'] = hash('sha1', $word);
                }
            }

            if ($value === 'blowfish') {
                foreach ($request->words as $word) {
                    $hashWords[$word]['Blowfish'] = crypt($word, 'CRYPT_BLOWFISH');
                }
            }
        }

        return view('vocabulary.result', ['data' => $hashWords]);
    }
}

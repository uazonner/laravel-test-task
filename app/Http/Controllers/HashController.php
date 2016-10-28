<?php

namespace App\Http\Controllers;

use App\Models\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hashes = Hash::where('user_id', '=', Auth::user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();

        $hashesArr = [];

        foreach ($hashes as $key => $value) {
            $hashesArr[$key]['id'] = $value->id;
            $hashesArr[$key]['origin'] = $value->vocabulary->word;
            $hashesArr[$key][$value->algorithm] = $value->hash;
            $hashesArr[$key]['created_at'] = $value->created_at->format('Y-m-d H:m');
        }

        if (!$hashesArr) {
            return abort(404);
        }

        return response()->json($hashesArr, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Hash $hash, Request $request)
    {

        $wordId = explode('-', $request->get('word_id'));
        $word_id = $wordId[0];

        $hash = new Hash();

        $hash->algorithm = ($request->algorithm);
        $hash->hash = ($request->hash);
        $hash->user_id = (Auth::user()->id);
        $hash->vocabulary_id = ($word_id);

        $hash->save();

        return $hash->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hashes = Hash::find($id);

        if (!$hashes) {
            return abort(404);
        }
        return response()->json($hashes, $status=200, $headers=[], $options=JSON_PRETTY_PRINT);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hash = Hash::find($id);
        $hash->delete();

        return redirect()->back()->with('succes', 'Hashe deleted');
    }
}

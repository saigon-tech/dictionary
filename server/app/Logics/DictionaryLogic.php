<?php


namespace App\Logics;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dictionary;

class DictionaryLogic
{
    public function getAllDataDictinary($keyword)
    {
        $search_dictionary_all = \App\Models\Dictionary::
        join('tbl_wordtype', 'tbl_wordtype.wordtype_id', '=', 'tbl_dictionary.wordtype_id')
            ->join('tbl_alphabet', 'tbl_alphabet.alphabet_id', '=', 'tbl_dictionary.alphabet_id')
            ->where('dictionary_name_eng', 'like', '%' . $keyword . '%')
            ->orderby('tbl_dictionary.dictionary_id', 'desc')->get();

        return view('admin.search_dictionary', compact('search_dictionary_all'));
    }
}
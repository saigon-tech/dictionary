<?php


namespace App\Logics;

use Illuminate\Http\Request;
use App\Models\Alphabet;
use Illuminate\Support\Facades\DB;

class AlphabetLogic
{
    public function getDataAllAlphabet()
    {
        return Alphabet::all();
    }

}
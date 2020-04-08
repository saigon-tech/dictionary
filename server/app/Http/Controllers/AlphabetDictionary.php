<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Alphabet;
use App\Logics\AlphabetLogic;


class AlphabetDictionary extends Controller
{
    private $alphabet_logic = null;

    public function __construct(AlphabetLogic $AlphabetLogic)
    {
        $this->alphabet_logic = $AlphabetLogic;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function add_alphabet_dictionary()
    {
        return view('Admin.Alphabet.add_alphabet_dictionary');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function all_alphabet_dictionary()
    {
        $alphabets= $this->alphabet_logic->getDataAllAlphabet();
        return view('Admin.Alphabet.all_alphabet_dictionary', [
            'all_alphabet_dictionary' => $alphabets,
        ]);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function save_alphabet_dictionary(Request $request)
    {
        $data                    = new Alphabet;
        $data['alphabet_name']   = $request->alphabet_dictionary_name;
        $data['alphabet_desc']   = $request->alphabet_dictionary_desc;
        $data['alphabet_status'] = $request->alphabet_dictionary_status;
        $data->save();

        return redirect()->route('list.alphabet');

    }

    /**
     * @param $alphabet_dictionary_id
     * @return mixed
     */
    public function unactive_alphabet_dictionary($alphabet_dictionary_id)
    {

        Alphabet::where('alphabet_id', $alphabet_dictionary_id)->update(['alphabet_status' => 1]);
        Session::flash('message', 'Failed to Activate Alphabet Successfully');
        return redirect()->route('list.alphabet');
    }

    /**
     * @param $alphabet_dictionary_id
     * @return mixed
     */
    public function active_alphabet_dictionary($alphabet_dictionary_id)
    {

        Alphabet::where('alphabet_id', $alphabet_dictionary_id)->update(['alphabet_status' => 0]);
        Session::flash("message", "Activate Alphabet Successfully");
        return redirect()->route('list.alphabet');
    }

    /**
     * @param $alphabet_dictionary_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit_alphabet_dictionary($alphabet_dictionary_id)
    {

        $edit_alphabet_dictionary = Alphabet::where('alphabet_id', $alphabet_dictionary_id)->get();

        $manager_alphabet_dictionary = view('Admin.Alphabet.edit_alphabet_dictionary')->with('edit_alphabet_dictionary',
            $edit_alphabet_dictionary);
        return view('admin_layout')->with('Admin.Alphabet.edit_alphabet_dictionary', $manager_alphabet_dictionary);
    }

    /**
     * @param Request $request
     * @param $alphabet_dictionary_id
     * @return mixed
     */
    public function update_alphabet_dictionary(Request $request, $alphabet_dictionary_id)
    {

        $data                  = [];
        $data['alphabet_name'] = $request->alphabet_dictionary_name;
        $data['alphabet_desc'] = $request->alphabet_dictionary_desc;
        Alphabet::where('alphabet_id', $alphabet_dictionary_id)->update($data);
        Session::put('message', 'Update Alphabet Successfully');
        return redirect()->route('list.alphabet');
    }

    /**
     * @param $alphabet_dictionary_id
     * @return mixed
     */
    public function delete_alphabet_dictionary($alphabet_dictionary_id)
    {

        Alphabet::where('alphabet_id', $alphabet_dictionary_id)->delete();
        Session::put('message', 'Delete Alphabet Successfully');
        return redirect()->route('list.alphabet');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $keywords        = $request->keywords_submit;
        $search_alphabet = Alphabet::where('alphabet_name', 'like', '%' . $keywords . '%')->get();
        return view('Admin.Alphabet.search_alphabet')->with('search_alphabet', $search_alphabet);
    }

}

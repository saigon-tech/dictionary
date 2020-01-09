<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Wordtype;
use App\Alphabet;
use App\Dictionary;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class DictionaryController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }

    public function add_dictionary()
    {
        $this->AuthLogin();
        $wordtype_dictionary = Wordtype::orderby('wordtype_id', 'desc')->get();
        $alphabet_dictionary = Alphabet::orderby('alphabet_id', 'desc')->get();
        return view('admin.add_dictionary')->with('wordtype_dictionary',
            $wordtype_dictionary)->with('alphabet_dictionary', $alphabet_dictionary);
    }

    public function all_dictionary()
    {
        $this->AuthLogin();
        $all_dictionary     = Dictionary::join('tbl_wordtype', 'tbl_wordtype.wordtype_id', '=',
            'tbl_dictionary.wordtype_id')
            ->join('tbl_alphabet', 'tbl_alphabet.alphabet_id', '=', 'tbl_dictionary.alphabet_id')
            ->orderby('tbl_dictionary.dictionary_id', 'desc')->get();

        $manager_dictionary = view('admin.all_dictionary')->with('all_dictionary', $all_dictionary);
        return view('admin_layout')->with('admin.all_dictionary', $manager_dictionary);
    }

    public function save_dictionary(Request $request)
    {
        $this->AuthLogin();
        $data = [];

        $data['dictionary_name_eng'] = $request->dictionary_name_eng;
        $data['dictionary_name_vn']  = $request->dictionary_name_vn;
        $data['dictionary_desc']     = $request->dictionary_desc;
        $data['wordtype_id']         = $request->dictionary_wordtype;
        $data['alphabet_id']         = $request->dictionary_alphabet;
        $data['dictionary_status']   = $request->dictionary_status;
        $data['dictionary_image']    = $request->dictionary_status;
        $get_image                   = $request->file('dictionary_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image     = current(explode('.', $get_name_image));
            $new_image      = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/dictionary', $new_image);
            $data['dictionary_image'] = $new_image;
            Dictionary::insert($data);
            Session::put('message', 'Thêm từ vựng thành công');
            return Redirect::to('add-dictionary');
        }
        $data['dictionary_image'] = '';
        Dictionary::insert($data);
        Session::put('message', 'Thêm  sản phầm thành công');
        return Redirect::to('/all-dictionary');
        // echo'<pre>';
        // print_r($data);
        // echo'</pre>';

    }

    public function unactive_dictionary($dictionary_id)
    {
        $this->AuthLogin();
        Dictionary::where('dictionary_id', $dictionary_id)->update(['dictionary_status' => 1]);
        Session::put("message", "Không kích hoạt danh mục sản phẩm thành công");
        return Redirect::to("all-dictionary");
    }

    public function active_dictionary($dictionary_id)
    {
        $this->AuthLogin();
        Dictionary::where('dictionary_id', $dictionary_id)->update(['dictionary_status' => 0]);
        Session::put("message", "Thành kích hoạt danh mục sản phẩm thành công");
        return Redirect::to("all-dictionary");
    }

    public function edit_dictionary($dictionary_id)
    {

        $this->AuthLogin();
        $wordtype_dictionary = DB::table('tbl_wordtype')->orderby('wordtype_id', 'desc')->get();
        $alphabet_dictionary = DB::table('tbl_alphabet')->orderby('alphabet_id', 'desc')->get();
        $edit_dictionary     = DB::table('tbl_dictionary')->where('dictionary_id', $dictionary_id)->get();
        $manager_dictionary  = view('admin.edit_dictionary')->with('edit_dictionary', $edit_dictionary)
            ->with('wordtype_dictionary', $wordtype_dictionary)->with('alphabet_dictionary', $alphabet_dictionary);

        return view('admin_layout')->with('admin.edit_dictionary', $manager_dictionary);
    }

    public function update_dictionary(Request $request, $dictionary_id)
    {
        $this->AuthLogin();
        $data                        = [];
        $data['dictionary_name_eng'] = $request->dictionary_name_eng;
        $data['dictionary_name_vn']  = $request->dictionary_name_vn;
        $data['dictionary_desc']     = $request->dictionary_desc;
        $data['wordtype_id']         = $request->dictionary_wordtype;
        $data['alphabet_id']         = $request->dictionary_alphabet;
        $data['dictionary_status']   = $request->dictionary_status;
        $get_image                   = $request->file('dictionary_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image     = current(explode('.', $get_name_image));
            $new_image      = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/dictionary', $new_image);
            $data['dictionary_image'] = $new_image;
            Dictionary::where('dictionary_id', $dictionary_id)->update($data);
            Session::put('message', 'Cập nhật sản phầm thành công');
            return Redirect::to('add-dictionary');
        }
        Dictionary::where('dictionary_id', $dictionary_id)->update($data);
        Session::put('message', 'Cập nhật danh mục sản phầm thành công');
        return Redirect::to("all-dictionary");
    }

    public function delete_dictionary($dictionary_id)
    {
        $this->AuthLogin();
        Dictionary::where('dictionary_id', $dictionary_id)->delete();
        Session::put('message', 'Xoa danh mục sản phầm thành công');
        return Redirect::to("all-dictionary");
    }

    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $search_dictionary_all = Dictionary::
        join('tbl_wordtype', 'tbl_wordtype.wordtype_id', '=', 'tbl_dictionary.wordtype_id')
            ->join('tbl_alphabet', 'tbl_alphabet.alphabet_id', '=', 'tbl_dictionary.alphabet_id')
            ->where('dictionary_name_eng', 'like', '%' . $keywords . '%')
            ->orderby('tbl_dictionary.dictionary_id', 'desc')->get();
        return view('admin.search_dictionary', compact('search_dictionary_all'));

    }

    public function details_dictionary($dictionary_id)
    {
        $wordtype_dictionary = Wordtype::where('wordtype_status', '0')->orderby('wordtype_id', 'desc')->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', '0')->orderby('alphabet_id', 'desc')->get();

        $details_dictionary = Dictionary::where('tbl_dictionary.dictionary_id', $dictionary_id)->get();
        $wordtype_id        = null;
        foreach ($details_dictionary as $key => $value) {
            $wordtype_id = $value->wordtype_id;
        }

        if ( ! empty($wordtype_id)) {
            $related_dictionary = Dictionary::
            join('tbl_wordtype', 'tbl_wordtype.wordtype_id', '=', 'tbl_dictionary.wordtype_id')
                ->join('tbl_alphabet', 'tbl_alphabet.alphabet_id', '=', 'tbl_dictionary.alphabet_id')
                ->where('tbl_wordtype.wordtype_id', '=', $wordtype_id)->whereNotIn('tbl_dictionary.dictionary_id',
                    [$dictionary_id])->get();
        }

        return view('pages.show_details')
            ->with('wordtype_dictionary', $wordtype_dictionary)
            ->with('alphabet', $alphabet_dictionary)
            ->with('details_dictionary', $details_dictionary)
            ->with('relate', $related_dictionary ?? []);
    }
}
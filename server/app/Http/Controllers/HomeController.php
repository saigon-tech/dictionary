<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Alphabet;
use App\Models\Dictionary;
use Illuminate\Support\Facades\DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        $category_dictionary = Category::where('category_status', 0)
            ->orderBy('category_id', 'ASC')
            ->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
            ->orderBy('alphabet_name', 'ASC')
            ->get();
        $all_dictionary      = Dictionary::where('dictionary_status', 0)
            ->orderBy('created_at', 'ASC')
            ->paginate(12);

        return view('Pages.home')
            ->with('category',$category_dictionary)
            ->with('alphabet',$alphabet_dictionary)
            ->with('all_dictionary',$all_dictionary);
    }
    public function search(Request $request)
    {
        $keywords            = $request->keywords_submit;
        $category_dictionary = Category::where('category_status', 0)
            ->orderBy('category_id', 'ASC')
            ->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
            ->orderBy('alphabet_id', 'ASC')
            ->get();
        $search_dictionary   = Dictionary::where('dictionary_name_eng', 'like', '%' . $keywords . '%')
            ->orderBy('alphabet_id', 'ASC')
            ->get();

        return view('Pages.search')->with('category_dictionary',$category_dictionary)->with('alphabet',$alphabet_dictionary)->with('search_dictionary',$search_dictionary);
    }

    public function add_all_dictionary(){

        $category_dictionary = category::where('category_status', 0)
            ->orderBy('category_id', 'ASC')
            ->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
            ->orderBy('alphabet_id', 'ASC')
            ->get();

        return view('Pages.add')->with('category_dictionary',$category_dictionary)->with('alphabet',$alphabet_dictionary);
    }

    public function save_add_dictionary(Request $request)
    {

        $data                        = [];
        $data['dictionary_name_eng'] = $request->dictionary_name_eng;
        $data['dictionary_name_vn']  = $request->dictionary_name_vn;
        $data['dictionary_desc']     = $request->dictionary_desc;
        $data['category_id']         = $request->dictionary_category;
        $data['alphabet_id']         = $request->dictionary_alphabet;
        $data['dictionary_status']   = "1";
        $data['dictionary_image']    = $request->dictionary_status;
        $get_image                   = $request->file('dictionary_image');

        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image     = current(explode('.', $get_name_image));
            $new_image      = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/dictionary', $new_image);
            $data['dictionary_image'] = $new_image;
            Dictionary::insert($data);
            Session::put('message', 'Thêm Từ Vựng thành công');
            return Redirect::to('add-all-dictionary');
        }
        $data['dictionary_image'] = '';
        Dictionary::insert($data);
        Session::put('message', 'Thêm Từ Vựng thành công');
        return Redirect::to('/add-all-dictionary');
    }

    public function category_food()
    {
        $category_dictionary = Category::where('category_status', 0)
            ->orderBy('category_id', 'ASC')->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
            ->orderBy('alphabet_id', 'ASC')->get();
        $all_dictionary      = Dictionary::
        join('tbl_category', 'tbl_category.category_id', '=', 'tbl_dictionary.category_id')
            ->join('tbl_alphabet', 'tbl_alphabet.alphabet_id', '=', 'tbl_dictionary.alphabet_id')
            ->where('category_name', 'Food')
            ->orderby('tbl_dictionary.dictionary_id', 'desc')->paginate(21);
        return view('Pages.food')->with('category', $category_dictionary)->with('alphabet', $alphabet_dictionary)
            ->with('all_dictionary', $all_dictionary);
    }

    public function category_game()
    {
        $category_dictionary = Category::where('category_status', 0)
            ->orderBy('category_id', 'ASC')->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
            ->orderBy('alphabet_id', 'ASC')->get();
        $all_dictionary      = Dictionary::
        join('tbl_category', 'tbl_category.category_id', '=', 'tbl_dictionary.category_id')
            ->join('tbl_alphabet', 'tbl_alphabet.alphabet_id', '=', 'tbl_dictionary.alphabet_id')
            ->where('category_name', 'Game')
            ->orderby('tbl_dictionary.dictionary_id', 'desc')->get();
        return view('Pages.game')->with('category', $category_dictionary)->with('alphabet', $alphabet_dictionary)
            ->with('all_dictionary', $all_dictionary);
    }

    public function category_music()
    {
        $category_dictionary = Category::where('category_status', 0)
            ->orderBy('category_id', 'ASC')->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
            ->orderBy('alphabet_id', 'ASC')->get();
        $all_dictionary      = Dictionary::
        join('tbl_category', 'tbl_category.category_id', '=', 'tbl_dictionary.category_id')
            ->join('tbl_alphabet', 'tbl_alphabet.alphabet_id', '=', 'tbl_dictionary.alphabet_id')
            ->where('category_name', 'Music')
            ->orderby('tbl_dictionary.dictionary_id', 'desc')->get();
        return view('Pages.music')->with('category', $category_dictionary)->with('alphabet', $alphabet_dictionary)
            ->with('all_dictionary', $all_dictionary);
    }

    public function getDetailAlphabet($id_alphabet)
    {
        $alphabets           = Dictionary::where('alphabet_id', '=', $id_alphabet)->paginate(21);
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
            ->orderBy('alphabet_id', 'ASC')->get();
        $name_alphabet = Alphabet::where('alphabet_id', '=', $id_alphabet)->select('alphabet_name')->first();

        $data                = [
            'alphabets' => $alphabets,
            'alphabet'  => $alphabet_dictionary,
            'name_alphabet' => $name_alphabet->alphabet_name,
        ];
        return view('Pages.alphabet_detail', $data);
    }
}

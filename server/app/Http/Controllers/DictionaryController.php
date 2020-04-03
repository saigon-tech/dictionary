<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Alphabet;
use App\Models\Dictionary;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
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
//        $this->AuthLogin();
        $category_dictionary = Category::orderby('category_id', 'asc')->get();
        $alphabet_dictionary = Alphabet::orderby('alphabet_id', 'asc')->get();
        return view('Admin.Dictionary.add_dictionary')->with('category_dictionary',
            $category_dictionary)->with('alphabet_dictionary', $alphabet_dictionary);
    }

    public function all_dictionary()
    {
        //$this->AuthLogin();
        $all_dictionary     = Dictionary::join('tbl_category', 'tbl_category.category_id', '=',
            'tbl_dictionary.category_id')
            ->join('tbl_alphabet', 'tbl_alphabet.alphabet_id', '=', 'tbl_dictionary.alphabet_id')
            ->orderby('tbl_dictionary.dictionary_id', 'desc')->get();

        $manager_dictionary = view('Admin.Dictionary.all_dictionary')->with('all_dictionary', $all_dictionary);
        return view('Layouts.admin_layout')->with('Admin.Dictionary.all_dictionary', $manager_dictionary);
    }

    public function save_dictionary(Request $request)
    {
        //$this->AuthLogin();
        $data = [];

        $data['dictionary_name_eng'] = $request->dictionary_name_eng;
        $data['dictionary_name_vn']  = $request->dictionary_name_vn;
        $data['dictionary_desc']     = $request->dictionary_desc;
        $data['category_id']         = $request->dictionary_category;
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
            Session::flash('message', 'Thêm từ vựng thành công');
            return redirect()->route('list.dictionary');
        }
        $data['dictionary_image'] = '';
        Dictionary::insert($data);
        Session::flash('message', 'Thêm  sản phầm thành công');
        return redirect()->route('list.dictionary');
    }

    public function unactive_dictionary($dictionary_id)
    {
        //$this->AuthLogin();
        Dictionary::where('dictionary_id', $dictionary_id)->update(['dictionary_status' => 1]);
        Session::flash("message", "Không kích hoạt danh mục dictionary thành công");
        return redirect()->route('list.dictionary');
    }

    public function active_dictionary($dictionary_id)
    {
        //$this->AuthLogin();
        Dictionary::where('dictionary_id', $dictionary_id)->update(['dictionary_status' => 0]);
        Session::flash("message", "Kích hoạt danh mục dictionary thành công");
        return redirect()->route('list.dictionary');
    }

    public function edit_dictionary($dictionary_id)
    {

        //$this->AuthLogin();
        $category_dictionary = DB::table('tbl_category')->orderby('category_id', 'asc')->get();
        $alphabet_dictionary = DB::table('tbl_alphabet')->orderby('alphabet_id', 'asc')->get();
        $edit_dictionary     = DB::table('tbl_dictionary')->where('dictionary_id', $dictionary_id)->get();
        $manager_dictionary  = view('Admin.Dictionary.edit_dictionary')->with('edit_dictionary', $edit_dictionary)
            ->with('category_dictionary', $category_dictionary)->with('alphabet_dictionary', $alphabet_dictionary);

        return view('Layouts.admin_layout')->with('Admin.Dictionary.edit_dictionary', $manager_dictionary);
    }

    public function update_dictionary(Request $request, $dictionary_id)
    {
        //$this->AuthLogin();
        $data                        = [];
        $data['dictionary_name_eng'] = $request->dictionary_name_eng;
        $data['dictionary_name_vn']  = $request->dictionary_name_vn;
        $data['dictionary_desc']     = $request->dictionary_desc;
        $data['category_id']         = $request->dictionary_category;
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
            Session::flash('message', 'Cập nhật dictionary thành công');
            return redirect()->route('add.dictionary');
        }
        Dictionary::where('dictionary_id', $dictionary_id)->update($data);
        Session::flash('message', 'Cập nhật danh mục sản phầm thành công');
        return redirect()->route('list.dictionary');
    }

    public function delete_dictionary($dictionary_id)
    {
        //$this->AuthLogin();
        Dictionary::where('dictionary_id', $dictionary_id)->delete();
        Session::flash('message', 'Xóa danh mục dictionary thành công');
        return redirect()->route('list.dictionary');
    }

    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $search_dictionary_all = Dictionary::
        join('tbl_category', 'tbl_category.category_id', '=', 'tbl_dictionary.category_id')
            ->join('tbl_alphabet', 'tbl_alphabet.alphabet_id', '=', 'tbl_dictionary.alphabet_id')
            ->where('dictionary_name_eng', 'like', '%' . $keywords . '%')
            ->orderby('tbl_dictionary.dictionary_id', 'desc')->get();
        return view('Admin.Dictionary.search_dictionary', compact('search_dictionary_all'));

    }

    public function details_dictionary($dictionary_id)
    {
        $category_dictionary = Category::where('category_status', '0')->orderby('category_id', 'desc')->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', '0')->orderby('alphabet_id', 'desc')->get();

        $details_dictionary = Dictionary::where('tbl_dictionary.dictionary_id', $dictionary_id)->get();
        $category_id        = null;
        foreach ($details_dictionary as $key => $value) {
            $category_id = $value->category_id;
        }

        if ( ! empty($category_id)) {
            $related_dictionary = Dictionary::
            join('tbl_category', 'tbl_category.category_id', '=', 'tbl_dictionary.category_id')
                ->join('tbl_alphabet', 'tbl_alphabet.alphabet_id', '=', 'tbl_dictionary.alphabet_id')
                ->where('tbl_category.category_id', '=', $category_id)->whereNotIn('tbl_dictionary.dictionary_id',
                    [$dictionary_id])->get();
        }

        return view('Pages.show_details')
            ->with('category_dictionary', $category_dictionary)
            ->with('alphabet', $alphabet_dictionary)
            ->with('details_dictionary', $details_dictionary)
            ->with('relate', $related_dictionary ?? []);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AlphabetDictionary extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id)
        {
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('admin')->send();
        }
    }
    //Alphabet Dictionary
    public function add_alphabet_dictionary(){
        $this->AuthLogin();
        return view('admin.add_alphabet_dictionary');
    }
    public function all_alphabet_dictionary(){
        $all_alphabet_dictionary = DB::table('tbl_alphabet')->get();
        $manager_alphabet_dictionary = view('admin.all_alphabet_dictionary')->with('all_alphabet_dictionary',$all_alphabet_dictionary);
        return view('admin_layout')->with('admin.all_alphabet_dictionary',$manager_alphabet_dictionary);
    }
    public function save_alphabet_dictionary(Request $request){
        $this->AuthLogin();
        $data = array();
        
        $data['alphabet_name'] = $request->alphabet_dictionary_name;
        $data['alphabet_desc'] = $request->alphabet_dictionary_desc;
        $data['alphabet_status'] = $request->alphabet_dictionary_status;

        DB::table('tbl_alphabet')->insert($data);
        Session::put('message','Thêm danh mục sản phầm thành công');
        return Redirect::to('/add-alphabet-dictionary');
  
    }
    public function unactive_alphabet_dictionary($alphabet_dictionary_id){
        $this->AuthLogin();
        DB::table('tbl_alphabet')->where('alphabet_id',$alphabet_dictionary_id)->update(['alphabet_status'=>1]);
        Session::put("message","Không kích hoạt danh mục sản phẩm thành công");
        return Redirect::to("all-alphabet-dictionary");
    }
    public function active_alphabet_dictionary($alphabet_dictionary_id){
        $this->AuthLogin();
        DB::table('tbl_alphabet')->where('alphabet_id',$alphabet_dictionary_id)->update(['alphabet_status'=>0]);
        Session::put("message","Thành kích hoạt danh mục sản phẩm thành công");
        return Redirect::to("all-alphabet-dictionary");
    }
    public function edit_alphabet_dictionary($alphabet_dictionary_id){
          $this->AuthLogin();
        $edit_alphabet_dictionary = DB::table('tbl_alphabet')->where('alphabet_id',$alphabet_dictionary_id)->get();

        $manager_alphabet_dictionary = view('admin.edit_alphabet_dictionary')->with('edit_alphabet_dictionary',$edit_alphabet_dictionary);
        return view('admin_layout')->with('admin.edit_alphabet_dictionary',$manager_alphabet_dictionary);
    }
    public function update_alphabet_dictionary(Request $request,$alphabet_dictionary_id){
          $this->AuthLogin();
        $data = array();
        $data['alphabet_name'] = $request->alphabet_dictionary_name;
        $data['alphabet_desc'] = $request->alphabet_dictionary_desc;
        DB::table('tbl_alphabet')->where('alphabet_id',$alphabet_dictionary_id)->update($data);
        Session::put('message','Cap nhap danh mục sản phầm thành công');
        return Redirect::to("all-alphabet-dictionary");
    }
    public function delete_alphabet_dictionary($alphabet_dictionary_id){
        $this->AuthLogin();
        DB::table('tbl_alphabet')->where('category_id',$alphabet_dictionary_id)->delete();
        Session::put('message','Xoa danh mục sản phầm thành công');
        return Redirect::to("all-alphabet-dictionary");
    }
    public function search(Request $request)
    { 
        $keywords = $request->keywords_submit;
        $search_alphabet = DB::table('tbl_alphabet')->where('alphabet_name','like','%'.$keywords.'%')->get();
        return view('admin.search_alphabet')->with('search_alphabet',$search_alphabet);
    }
   

}

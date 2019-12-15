<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class DictionaryController extends Controller
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
    public function add_dictionary(){
        $this->AuthLogin();
        $wordtype_dictionary = DB::table('tbl_wordtype')->orderby('wordtype_id','desc')->get();
        $alphabet_dictionary = DB::table('tbl_alphabet')->orderby('alphabet_id','desc')->get();
        return view('admin.add_dictionary')->with('wordtype_dictionary',$wordtype_dictionary)->with('alphabet_dictionary',$alphabet_dictionary);
    }
    public function all_dictionary(){
        $this->AuthLogin();
        $all_dictionary = DB::table('tbl_dictionary')
        ->join('tbl_wordtype','tbl_wordtype.wordtype_id','=','tbl_dictionary.wordtype_id')
        ->join('tbl_alphabet','tbl_alphabet.alphabet_id','=','tbl_dictionary.alphabet_id')
        ->orderby('tbl_dictionary.dictionary_id','desc')->get();
        $manager_dictionary = view('admin.all_dictionary')->with('all_dictionary',$all_dictionary);
        return view('admin_layout')->with('admin.all_dictionary',$manager_dictionary);
    }
    public function save_dictionary(Request $request){
        $this->AuthLogin();
        $data = array();
        
        $data['dictionary_name_eng'] = $request->dictionary_name_eng;
        $data['dictionary_name_vn'] = $request->dictionary_name_vn;
        $data['dictionary_desc'] = $request->dictionary_desc;
        $data['wordtype_id'] = $request->dictionary_wordtype;
        $data['alphabet_id'] = $request->dictionary_alphabet;
        $data['dictionary_status'] = $request->dictionary_status;
        $data['dictionary_image'] = $request->dictionary_status;
        $get_image = $request->file('dictionary_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); 
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/dictionary',$new_image);
            $data['dictionary_image'] =  $new_image;
            DB::table('tbl_dictionary')->insert($data);
            Session::put('message','Thêm sản phầm thành công');
            return Redirect::to('add-dictionary');
        }
        $data['dictionary_image'] =  '';
        DB::table('tbl_dictionary')->insert($data);
        Session::put('message','Thêm  sản phầm thành công');
        return Redirect::to('/all-dictionary');
        // echo'<pre>';
        // print_r($data);
        // echo'</pre>';
  
    }
    public function unactive_dictionary($dictionary_id){
        $this->AuthLogin();
        DB::table('tbl_dictionary')->where('dictionary_id',$dictionary_id)->update(['dictionary_status'=>1]);
        Session::put("message","Không kích hoạt danh mục sản phẩm thành công");
        return Redirect::to("all-dictionary");
    }
    public function active_dictionary($dictionary_id){
        $this->AuthLogin();
        DB::table('tbl_dictionary')->where('dictionary_id',$dictionary_id)->update(['dictionary_status'=>0]);
        Session::put("message","Thành kích hoạt danh mục sản phẩm thành công");
        return Redirect::to("all-dictionary");
    }
    public function edit_dictionary($dictionary_id){
        $this->AuthLogin();
        $wordtype_dictionary = DB::table('tbl_wordtype')->orderby('wordtype_id','desc')->get();
        $alphabet_dictionary = DB::table('tbl_alphabet')->orderby('alphabet_id','desc')->get();

        $edit_dictionary = DB::table('tbl_dictionary')->where('dictionary_id',$dictionary_id)->get();

        $manager_dictionary = view('admin.edit_dictionary')->with('edit_dictionary',$edit_dictionary)
        ->with('wordtype_dictionary',$wordtype_dictionary)->with('alphabet_dictionary',$alphabet_dictionary);
        
        return view('admin_layout')->with('admin.edit_dictionary',$manager_dictionary);
    }
    public function update_dictionary(Request $request,$dictionary_id){
        $this->AuthLogin();
        $data = array();
        $data['dictionary_name_eng'] = $request->dictionary_name_eng;
        $data['dictionary_name_vn'] = $request->dictionary_name_vn;
        $data['dictionary_desc'] = $request->dictionary_desc;
        $data['wordtype_id'] = $request->dictionary_wordtype;
        $data['alphabet_id'] = $request->dictionary_alphabet;
        $data['dictionary_status'] = $request->dictionary_status;
        $data['dictionary_image'] = $request->dictionary_status;
        // $data['dictionary_image'] = $request->dictionary_status;
        $get_image = $request->file('dictionary_image');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); 
           $name_image = current(explode('.',$get_name_image));
           $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
           $get_image->move('public/uploads/dictionary',$new_image);
           $data['dictionary_image'] =  $new_image;
           DB::table('tbl_dictionary')->where('dictionary_id',$dictionary_id)->update($data);
           Session::put('message','Cập nhật sản phầm thành công');
           return Redirect::to('add-dictionary');
       }
        DB::table('tbl_dictionary')->where('dictionary_id',$dictionary_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phầm thành công');
        return Redirect::to("all-dictionary");
    }
    public function delete_dictionary($dictionary_id){
        $this->AuthLogin();
        DB::table('tbl_dictionary')->where('dictionary_id',$dictionary_id)->delete();
        Session::put('message','Xoa danh mục sản phầm thành công');
        return Redirect::to("all-dictionary");
    }
    public function search(Request $request)
    { 
        $keywords = $request->keywords_submit;
        // dd($keywords);
        $search_dictionary_all = DB::table('tbl_dictionary')->where('dictionary_name_eng','like','%'.$keywords.'%')  
        ->join('tbl_wordtype','tbl_wordtype.wordtype_id','=','tbl_dictionary.wordtype_id')
        ->join('tbl_alphabet','tbl_alphabet.alphabet_id','=','tbl_dictionary.alphabet_id')
        ->orderby('tbl_dictionary.dictionary_id','desc')->get();
        // dd($search_dictionary);
      
        return view('admin.search_dictionary', compact('search_dictionary_all'));


        
    }


}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class WordtypeDictionary extends Controller
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

    public function add_wordtype_dictionary(){
        $this->AuthLogin();
        return view('admin.add_wordtype_dictionary');
    }
    public function all_wordtype_dictionary(){
        $this->AuthLogin();
        $all_wordtype_dictionary = DB::table('tbl_wordtype')->get();
        $manager_wordtype_dictionary = view('admin.all_wordtype_dictionary')->with('all_wordtype_dictionary',$all_wordtype_dictionary);
        return view('admin_layout')->with('admin.all_wordtype_dictionary',$manager_wordtype_dictionary);
    }
    public function save_wordtype_dictionary(Request $request){
        $this->AuthLogin();
        $data = array();
        
        $data['wordtype_name'] = $request->wordtype_dictionary_name;
        $data['wordtype_desc'] = $request->wordtype_dictionary_desc;
        $data['wordtype_status'] = $request->wordtype_dictionary_status;

        DB::table('tbl_wordtype')->insert($data);
        Session::put('message','Thêm danh mục dictionary thành công');
        return Redirect::to('/add-wordtype-dictionary');
  
    }
    public function unactive_wordtype_dictionary($wordtype_dictionary_id){
        $this->AuthLogin();
        DB::table('tbl_wordtype')->where('wordtype_id',$wordtype_dictionary_id)->update(['wordtype_status'=>1]);
        Session::put("message","Không kích hoạt danh mục dictionary thành công");
        return Redirect::to("all-wordtype-dictionary");
    }
    public function active_wordtype_dictionary($wordtype_dictionary_id){
        $this->AuthLogin();
        DB::table('tbl_wordtype')->where('wordtype_id',$wordtype_dictionary_id)->update(['wordtype_status'=>0]);
        Session::put("message","Thành kích hoạt danh mục dictionary thành công");
        return Redirect::to("all-wordtype-dictionary");
    }
    public function edit_wordtype_dictionary($wordtype_dictionary_id){
        $this->AuthLogin();
        $edit_wordtype_dictionary = DB::table('tbl_wordtype')->where('wordtype_id',$wordtype_dictionary_id)->get();

        $manager_wordtype_dictionary = view('admin.edit_wordtype_dictionary')->with('edit_wordtype_dictionary',$edit_wordtype_dictionary);
        return view('admin_layout')->with('admin.edit_wordtype_dictionary',$manager_wordtype_dictionary);
    }
    public function update_wordtype_dictionary(Request $request,$wordtype_dictionary_id){
        $this->AuthLogin();
        $data = array();
        $data['wordtype_name'] = $request->wordtype_dictionary_name;
        $data['wordtype_desc'] = $request->wordtype_dictionary_desc;
        DB::table('tbl_wordtype')->where('wordtype_id',$wordtype_dictionary_id)->update($data);
        Session::put('message','Cap nhap danh mục dictionary thành công');
        return Redirect::to("all-wordtype-dictionary");
    }
    public function delete_wordtype_dictionary($wordtype_dictionary_id){
        $this->AuthLogin();
        DB::table('tbl_wordtype')->where('wordtype_id',$wordtype_dictionary_id)->delete();
        Session::put('message','Xoa danh mục dictionary thành công');
        return Redirect::to("all-wordtype-dictionary");
    }   
    public function search(Request $request)
    { 
        $keywords = $request->keywords_submit;
        $search_wordtype = DB::table('tbl_wordtype')->where('wordtype_name','like','%'.$keywords.'%')->get();
        return view('admin.search_wordtype')->with('search_wordtype',$search_wordtype);
    }
 

}

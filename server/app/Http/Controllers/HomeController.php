<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index(){
        $wordtype_dictionary = DB::table('tbl_wordtype')->where('wordtype_status','0')->orderby('wordtype_id','ASC')->get();
        $alphabet_dictionary = DB::table('tbl_alphabet')->where('alphabet_status','0')->orderby('alphabet_id','ASC')->get();
        $all_dictionary = DB::table('tbl_dictionary')->where('dictionary_status','0')->orderby('dictionary_id','ASC')->get();
        return view('pages.home')->with('wordtype',$wordtype_dictionary)->with('alphabet',$alphabet_dictionary)->with('all_dictionary',$all_dictionary);
    }
    public function search(Request $request)
    { 
        $keywords = $request->keywords_submit;
        $wordtype_dictionary = DB::table('tbl_wordtype')->where('wordtype_status','0')->orderby('wordtype_id','ASC')->get();
        $alphabet_dictionary = DB::table('tbl_alphabet')->where('alphabet_status','0')->orderby('alphabet_id','ASC')->get();
        $search_dictionary= DB::table('tbl_dictionary')->where('dictionary_name_eng','like','%'.$keywords.'%')->get();
        return view('pages.search')->with('wordtype_dictionary',$wordtype_dictionary)->with('alphabet',$alphabet_dictionary)->with('search_dictionary',$search_dictionary);
    }
    public function add_dictionary(){
        $this->AuthLogin();
        $wordtype_dictionary = DB::table('tbl_wordtype')->orderby('wordtype_id','desc')->get();
        $alphabet_dictionary = DB::table('tbl_alphabet')->orderby('alphabet_id','desc')->get();
        return view('admin.add_dictionary')->with('wordtype_dictionary',$wordtype_dictionary)->with('alphabet_dictionary',$alphabet_dictionary);
    }
    public function add_all_dictionary(){
    
        $wordtype_dictionary = DB::table('tbl_wordtype')->orderby('wordtype_id','desc')->get();
        $alphabet_dictionary = DB::table('tbl_alphabet')->orderby('alphabet_id','desc')->get();
        return view('pages.add')->with('wordtype_dictionary',$wordtype_dictionary)->with('alphabet_dictionary',$alphabet_dictionary);
    }
    public function save_add_dictionary(Request $request){
   
        $data = array();
        
        $data['dictionary_name_eng'] = $request->dictionary_name_eng;
        $data['dictionary_name_vn'] = $request->dictionary_name_vn;
        $data['dictionary_desc'] = $request->dictionary_desc;
        $data['wordtype_id'] = $request->dictionary_wordtype;
        $data['alphabet_id'] = $request->dictionary_alphabet;
        $data['dictionary_status'] = "1";
        $data['dictionary_image'] = $request->dictionary_status;
        $get_image = $request->file('dictionary_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName(); 
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/dictionary',$new_image);
            $data['dictionary_image'] =  $new_image;
            DB::table('tbl_dictionary')->insert($data);
            Session::put('message','Thêm Từ Vựng thành công');
            return Redirect::to('add-all-dictionary');
        }
        $data['dictionary_image'] =  '';
        DB::table('tbl_dictionary')->insert($data);
        Session::put('message','Thêm Từ Vựng thành công');
        return Redirect::to('/add-all-dictionary');
       
  
    }
}

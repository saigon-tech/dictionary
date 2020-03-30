<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Wordtype;
use App\Models\Alphabet;
use App\Models\Dictionary;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


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
        //$this->AuthLogin();
        return view('Admin.Category.add_wordtype_dictionary');
    }
    public function all_wordtype_dictionary(){
        //$this->AuthLogin();
        $all_wordtype_dictionary = Wordtype::get();
        $manager_wordtype_dictionary = view('Admin.Category.all_wordtype_dictionary')->with('all_wordtype_dictionary',$all_wordtype_dictionary);
        return view('admin_layout')->with('Admin.Category.all_wordtype_dictionary',$manager_wordtype_dictionary);
    }
    public function save_wordtype_dictionary(Request $request){
        //$this->AuthLogin();
        $data = new Wordtype;
        $data['wordtype_name'] = $request->wordtype_dictionary_name;
        $data['wordtype_desc'] = $request->wordtype_dictionary_desc;
        $data['wordtype_status'] = $request->wordtype_dictionary_status;
        $data->save();
        Session::flash('message','Thêm danh mục wordtype thành công');
        return redirect()->route('add.wordtype');

    }
    public function unactive_wordtype_dictionary($wordtype_dictionary_id){
        //$this->AuthLogin();
        Wordtype::where('wordtype_id',$wordtype_dictionary_id)->update(['wordtype_status'=>1]);
        Session::flash("message","Không kích hoạt danh mục wordtype thành công");
        return redirect()->route('list.wordtype');
    }
    public function active_wordtype_dictionary($wordtype_dictionary_id){
        //$this->AuthLogin();
        Wordtype::where('wordtype_id',$wordtype_dictionary_id)->update(['wordtype_status'=>0]);
        Session::flash("message","Kích hoạt danh mục wordtype thành công");
        return redirect()->route('list.wordtype');
    }
    public function edit_wordtype_dictionary($wordtype_dictionary_id){
        //$this->AuthLogin();
        $edit_wordtype_dictionary =  Wordtype::where('wordtype_id',$wordtype_dictionary_id)->get();

        $manager_wordtype_dictionary = view('Admin.Category.edit_wordtype_dictionary')->with('edit_wordtype_dictionary',$edit_wordtype_dictionary);
        return view('admin_layout')->with('Admin.Category.edit_wordtype_dictionary',$manager_wordtype_dictionary);
    }
    public function update_wordtype_dictionary(Request $request,$wordtype_dictionary_id){
        //$this->AuthLogin();
        $data = array();
        $data['wordtype_name'] = $request->wordtype_dictionary_name;
        $data['wordtype_desc'] = $request->wordtype_dictionary_desc;
        Wordtype::where('wordtype_id',$wordtype_dictionary_id)->update($data);
        Session::flash('message','Cập nhật danh mục wordtype thành công');
        return redirect()->route('list.wordtype');

    }
    public function delete_wordtype_dictionary($wordtype_dictionary_id){
        //$this->AuthLogin();
        Wordtype::where('wordtype_id',$wordtype_dictionary_id)->delete();
        Session::flash('message','Xóa danh mục wordtype thành công');
        return redirect()->route('list.wordtype');
    }
    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $search_wordtype = Wordtype::where('wordtype_name','like','%'.$keywords.'%')->get();
        return view('Admin.Category.search_wordtype')->with('search_wordtype',$search_wordtype);
    }


}

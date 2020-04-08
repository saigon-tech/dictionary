<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class CategoryDictionary extends Controller
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

    public function add_category_dictionary(){
        //$this->AuthLogin();
        return view('Admin.Category.add_category_dictionary');
    }
    public function all_category_dictionary(){
        //$this->AuthLogin();
        $all_category_dictionary = category::get();
        $manager_category_dictionary = view('Admin.Category.all_category_dictionary')->with('all_category_dictionary',$all_category_dictionary);
        return view('admin_layout')->with('Admin.Category.all_category_dictionary',$manager_category_dictionary);
    }
    public function save_category_dictionary(Request $request){
        //$this->AuthLogin();
        $data = new category;
        $data['category_name'] = $request->category_dictionary_name;
        $data['category_desc'] = $request->category_dictionary_desc;
        $data['category_status'] = $request->category_dictionary_status;
        $data->save();
        Session::flash('message','Add Category Successfully');
        return redirect()->route('list.category');

    }
    public function unactive_category_dictionary($category_dictionary_id){
        //$this->AuthLogin();
        category::where('category_id',$category_dictionary_id)->update(['category_status'=>1]);
        Session::flash("message","Failed to Activate Category Successfully");
        return redirect()->route('list.category');
    }
    public function active_category_dictionary($category_dictionary_id){
        //$this->AuthLogin();
        category::where('category_id',$category_dictionary_id)->update(['category_status'=>0]);
        Session::flash("message","Activate Category Successfully");
        return redirect()->route('list.category');
    }
    public function edit_category_dictionary($category_dictionary_id){
        //$this->AuthLogin();
        $edit_category_dictionary =  category::where('category_id',$category_dictionary_id)->get();
        $manager_category_dictionary = view('Admin.Category.edit_category_dictionary')->with('edit_category_dictionary',$edit_category_dictionary);
        return view('admin_layout')->with('Admin.Category.edit_category_dictionary', $manager_category_dictionary);
    }
    public function update_category_dictionary(Request $request,$category_dictionary_id){
        //$this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_dictionary_name;
        $data['category_desc'] = $request->category_dictionary_desc;
        category::where('category_id',$category_dictionary_id)->update($data);
        Session::flash('message','Update Category Successfully');
        return redirect()->route('list.category');

    }
    public function delete_category_dictionary($category_dictionary_id){
        //$this->AuthLogin();
        category::where('category_id',$category_dictionary_id)->delete();
        Session::flash('message','Delete Category Successfully');
        return redirect()->route('list.category');
    }
    public function search(Request $request)
    {
        $keywords = $request->keywords_submit;
        $search_category = category::where('category_name','like','%'.$keywords.'%')->get();
        return view('Admin.Category.search_category')->with('search_category',$search_category);
    }


}

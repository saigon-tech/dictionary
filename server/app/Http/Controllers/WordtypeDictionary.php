<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use Session;
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

    public function add_Category_dictionary(){
        $this->AuthLogin();
        return view('admin.add_Category_dictionary');
    }
    public function all_Category_dictionary(){
        $this->AuthLogin();
        $all_Category_dictionary = Category::get();
        $manager_Category_dictionary = view('admin.all_Category_dictionary')->with('all_Category_dictionary',$all_Category_dictionary);
        return view('admin_layout')->with('admin.all_Category_dictionary',$manager_Category_dictionary);
    }
    public function save_Category_dictionary(Request $request){
        $this->AuthLogin();
        $data = new Category;
        $data['Category_name'] = $request->Category_dictionary_name;
        $data['Category_desc'] = $request->Category_dictionary_desc;
        $data['Category_status'] = $request->Category_dictionary_status;
        $data->save();
        Session::put('message','Thêm danh mục dictionary thành công');
        return Redirect::to('/add-Category-dictionary');
  
    }
    public function unactive_Category_dictionary($Category_dictionary_id){
        $this->AuthLogin();
        Category::where('Category_id',$Category_dictionary_id)->update(['Category_status'=>1]);
        Session::put("message","Không kích hoạt danh mục dictionary thành công");
        return Redirect::to("all-Category-dictionary");
    }
    public function active_Category_dictionary($Category_dictionary_id){
        $this->AuthLogin();
        Category::where('Category_id',$Category_dictionary_id)->update(['Category_status'=>0]);
        Session::put("message","Thành kích hoạt danh mục dictionary thành công");
        return Redirect::to("all-Category-dictionary");
    }
    public function edit_Category_dictionary($Category_dictionary_id){
        $this->AuthLogin();
        $edit_Category_dictionary =  Category::where('Category_id',$Category_dictionary_id)->get();

        $manager_Category_dictionary = view('admin.edit_Category_dictionary')->with('edit_Category_dictionary',$edit_Category_dictionary);
        return view('admin_layout')->with('admin.edit_Category_dictionary',$manager_Category_dictionary);
    }
    public function update_Category_dictionary(Request $request,$Category_dictionary_id){
        $this->AuthLogin();
        $data = array();
        $data['Category_name'] = $request->Category_dictionary_name;
        $data['Category_desc'] = $request->Category_dictionary_desc;
        Category::where('Category_id',$Category_dictionary_id)->update($data);
        Session::put('message','Cap nhap danh mục dictionary thành công');
        return Redirect::to("all-Category-dictionary");
        
    }
    public function delete_Category_dictionary($Category_dictionary_id){
        $this->AuthLogin();
        Category::where('Category_id',$Category_dictionary_id)->delete();
        Session::put('message','Xoa danh mục dictionary thành công');
        return Redirect::to("all-Category-dictionary");
    }   
    public function search(Request $request)
    { 
        $keywords = $request->keywords_submit;
        $search_Category = Category::where('Category_name','like','%'.$keywords.'%')->get();
        return view('Admin.search_Category')->with('search_Category',$search_Category);
    }
 

}

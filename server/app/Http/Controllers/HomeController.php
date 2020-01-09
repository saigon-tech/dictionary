<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Wordtype;
use App\Models\Alphabet;
use App\Models\Dictionary;
use Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index(){
        $wordtype_dictionary = Wordtype::where('wordtype_status', 0)
            ->orderBy('wordtype_id', 'ASC')
            ->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
            ->orderBy('alphabet_name', 'ASC')
            ->get();
        $all_dictionary = Dictionary::where('dictionary_status', 0)
            ->orderBy('dictionary_status', 'ASC')
            ->get();
       
        return view('pages.home')->with('wordtype',$wordtype_dictionary)->with('alphabet',$alphabet_dictionary)->with('all_dictionary',$all_dictionary);
    }
    public function search(Request $request)
    { 
        $keywords = $request->keywords_submit;
        $wordtype_dictionary = Wordtype::where('wordtype_status', 0)
            ->orderBy('wordtype_id', 'ASC')
            ->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
            ->orderBy('alphabet_id', 'ASC')
            ->get();
        $search_dictionary = Dictionary::where('dictionary_name_eng', 'like','%'.$keywords.'%')
            ->orderBy('alphabet_id', 'ASC')
            ->get();
       
        return view('pages.search')->with('wordtype_dictionary',$wordtype_dictionary)->with('alphabet',$alphabet_dictionary)->with('search_dictionary',$search_dictionary);
    }

    public function add_all_dictionary(){
    
        $wordtype_dictionary = Wordtype::where('wordtype_status', 0)
            ->orderBy('wordtype_id', 'desc')
            ->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
            ->orderBy('alphabet_id', 'desc')
            ->get();
        
        return view('pages.add')->with('wordtype_dictionary',$wordtype_dictionary)->with('alphabet',$alphabet_dictionary);
    }
    public function save_add_dictionary(Request $request)
    {

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
            Dictionary::insert($data);
            Session::put('message','Thêm Từ Vựng thành công');
            return Redirect::to('add-all-dictionary');
        }
        $data['dictionary_image'] =  '';
        Dictionary::insert($data);
        Session::put('message','Thêm Từ Vựng thành công');
        return Redirect::to('/add-all-dictionary');
    }

    public function wordtype_food(){
        $wordtype_dictionary = Wordtype::where('wordtype_status', 0)
        ->orderBy('wordtype_id', 'ASC')->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
        ->orderBy('alphabet_id', 'ASC') ->get();
        $all_dictionary =Dictionary::
        join('tbl_wordtype','tbl_wordtype.wordtype_id','=','tbl_dictionary.wordtype_id')
        ->join('tbl_alphabet','tbl_alphabet.alphabet_id','=','tbl_dictionary.alphabet_id')
        ->where('wordtype_name', 'Food')
        ->orderby('tbl_dictionary.dictionary_id','desc')->paginate(21);
        return view('pages.food')->with('wordtype',$wordtype_dictionary)->with('alphabet',$alphabet_dictionary)
        ->with('all_dictionary',$all_dictionary);
    }
    public function wordtype_game(){
        $wordtype_dictionary = Wordtype::where('wordtype_status', 0)
        ->orderBy('wordtype_id', 'ASC')->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
        ->orderBy('alphabet_id', 'ASC') ->get();
        $all_dictionary =Dictionary::
        join('tbl_wordtype','tbl_wordtype.wordtype_id','=','tbl_dictionary.wordtype_id')
        ->join('tbl_alphabet','tbl_alphabet.alphabet_id','=','tbl_dictionary.alphabet_id')
        ->where('wordtype_name', 'Game')
        ->orderby('tbl_dictionary.dictionary_id','desc')->get();
        return view('pages.game')->with('wordtype',$wordtype_dictionary)->with('alphabet',$alphabet_dictionary)
        ->with('all_dictionary',$all_dictionary);
    }
    public function wordtype_music(){
        $wordtype_dictionary = Wordtype::where('wordtype_status', 0)
        ->orderBy('wordtype_id', 'ASC')->get();
        $alphabet_dictionary = Alphabet::where('alphabet_status', 0)
        ->orderBy('alphabet_id', 'ASC') ->get();
        $all_dictionary =Dictionary::
        join('tbl_wordtype','tbl_wordtype.wordtype_id','=','tbl_dictionary.wordtype_id')
        ->join('tbl_alphabet','tbl_alphabet.alphabet_id','=','tbl_dictionary.alphabet_id')
        ->where('wordtype_name', 'Music')
        ->orderby('tbl_dictionary.dictionary_id','desc')->get();
        return view('pages.music')->with('wordtype',$wordtype_dictionary)->with('alphabet',$alphabet_dictionary)
        ->with('all_dictionary',$all_dictionary);
    }
}

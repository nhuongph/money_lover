<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Storage;
use Validator;
use App\Category;
use Session;
use File;

class CategoriesController extends Controller {

    public function __construct() {
        $lang = Session::get('language');
        if ($lang != null)
            \App::setLocale($lang);
    }

    public function getCategories() {
        $categories = Category::paginate(5);
        return view('Category.index')->with('categories', $categories);
    }

    public function getAddCategory() {
        return view('Category.add');
    }

    public function postAddCategory(Request $request) {

        $validator = Validator::make($request->all(), [
                    'name' => 'required|unique:categories|min:4',
                    'image' => 'required|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator);
        }

        $data_input = $request->all();
        if ($request->file('image')->isValid()) {
            $file = $request->file('image');
            $file_type = substr($file->getMimeType(), strrpos($file->getMimeType(), '/') + 1);
            $file_name = str_random('60').'.'. $file_type;
            $path = "uploads";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $data_input['image'] = $path . '/' . $file_name;
            $file->move($path, $file_name);
        }
        if (Category::create($data_input)) {
            Session::flash('message', trans('money_lover.cate_done'));
            return redirect('category');
        } else {
            return redirect()->back();
        }
    }

    public function getUpdateCategory($id = null) {
        $category = Category::where('id', $id)->first();
        return view('Category.update')->with('category', $category);
    }

    public function postUpdateCategory(Request $request) {
        $validator = Validator::make($request->all(), [
                    'name' => 'required|min:4',
                    'image' => 'mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            return redirect()
                            ->back()
                            ->withErrors($validator);
        }

        $id = $request->id;
        $name = Category::where('id', '!=', $id)->where('name', $request->name)->get();
        if ($name->count()) {
            return redirect()->back()->withErrors(trans('money_lover.cate_err_1'));
        }        
        
        $image = '';
        if (!empty($request->file('image')) && $request->file('image')->isValid()) {
            $old = Category::where('id', $id)->first();
            $file_path = $old->image;
            if(File::exists($file_path)){
                File::delete($file_path);
            }
            $file = $request->file('image');
            $file_type = substr($file->getMimeType(), strrpos($file->getMimeType(), '/') + 1);
            $file_name = str_random('60').'.'. $file_type;
            $path = "uploads";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $image = $path . '/' . $file_name;
            $file->move($path, $file_name);
        }
        if ($image == '') {
            $results = Category::where('id', $id)->update([
                'name' => $request->name,
                'note' => $request->note,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        } else {
            $results = Category::where('id', $id)->update([
                'name' => $request->name,
                'note' => $request->note,
                'image' => $image,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
//            dump($results);
//            exit(0);
        if ($results > 0) {
            Session::flash('message', trans('money_lover.cate_done_1'));
            return redirect('category');
        } else {
            return redirect()->back()->withErrors(trans('money_lover.cate_err_2'));
        }
    }

    public function getDeleteCategory($id = null) {
        if (!isset($id) || $id == "") {
            return redirect()->back();
        } else {
            $category = Category::where('id', $id)->first();
            $file_path = $category->image;
            if(File::exists($file_path)){
                File::delete($file_path);
            }
            Storage::delete(public_path($category->image));
//            @unlink($category->image);
            if (Category::where('id', $id)->delete()) {
                Session::flash('message', trans('money_lover.cate_del'));
                return redirect('category');
            } else {
                return redirect()->back();
            }
        }
    }

    public function getSearchCategory() {
        $name = $_GET['name'];
        $note = $_GET['note'];
        if($name != "" && $note != ""){
            $categories = Category::where('name','like','%'.$name.'%')->Where('note','like','%'.$note.'%')->get();
        }else if($name != ""){
            $categories = Category::where('name','like','%'.$name.'%')->get();
        }else if($note != ""){
            $categories = Category::where('note','like','%'.$note.'%')->get();
        }else{
            $categories = Category::all();
        }
        return array('categories' => $categories);
    }

}

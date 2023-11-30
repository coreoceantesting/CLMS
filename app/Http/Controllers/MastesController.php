<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Illuminate\Http\RedirectResponse;

class MastesController extends Controller
{
    public function test_category_list()
    {
        $test_list = DB::table('test_category')
        ->join('main_test_categories','test_category.main_test_categories_id','=','main_test_categories.main_test_categories_id')
        ->where('test_category.is_deleted','0')->get(['test_category.*','main_test_categories.main_test_categories_name']);
        return view('Masters.Test_category.test_category_list',compact('test_list'));
    }

    public function create_test_category()
    {
        $main_category_list = DB::table('main_test_categories')->where('is_deleted','0')->orderby('main_test_categories_id','desc')->get();
        return view('Masters.Test_category.create_test_category',compact('main_category_list'));
    }

    public function store_test_category(Request $request): RedirectResponse
    {  
        $request->validate([
            'tname' => 'required',
            'units' => 'required',
            'bioreferal' => 'required',
            'maincategory' => 'required',
        ]);
           
        DB::table('test_category')->insert([
            'test_category_name' => $request->input('tname'),
            'test_category_units' => $request->input('units'),
            'bio_referal_interval' => $request->input('bioreferal'),
            'main_test_categories_id' => $request->input('maincategory'),
            'created_by' =>  Auth::user()->id,
            'create_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('test_category_list')
        ->withSuccess('Great! You have Successfully Store Test Category');
    }

    public function edit_test_category(Request $request,$id)
    {
        $test_category_details = DB::table('test_category')->where('test_category_id',$id)->first();
        $main_category_list = DB::table('main_test_categories')->where('is_deleted','0')->orderby('main_test_categories_id','desc')->get();
        return view('Masters.Test_category.edit_test_category',compact('test_category_details','main_category_list'));
    }

    public function update_test_category(Request $request,$id)
    {
        $request->validate([
            'tname' => 'required',
            'units' => 'required',
            'bioreferal' => 'required',
            'maincategory' => 'required',
        ]);
           
        DB::table('test_category')->where('test_category_id',$id)->update([
            'test_category_name' => $request->input('tname'),
            'test_category_units' => $request->input('units'),
            'bio_referal_interval' => $request->input('bioreferal'),
            'main_test_categories_id' => $request->input('maincategory'),
            'updated_by' =>  Auth::user()->id,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('test_category_list')
        ->withSuccess('Great! You have Successfully Update Test Category');
    }

    public function delete_test_category(Request $request,$id)
    {
        $affected = DB::table('test_category')
                    ->where('test_category_id', $id)
                    ->update([
                        'is_deleted' => 1,
                        'deleted_by' => Auth::user()->id,
                        'deleted_at' => date('Y-m-d H:i:s')
                    ]);

        if ($affected) {
            return redirect()->route('test_category_list')
        ->withSuccess('Great! You have Successfully Delete Test Category');
        } else {
            return redirect()->route('test_category_list')
        ->withSuccess('Sorry! User Not Found');
        }
    }

    // lab master

    public function lab_list()
    {
        $lab_list = DB::table('lab_master')->where('is_deleted','0')->get();
        return view('Masters.Lab_master.lab_list',compact('lab_list'));
    }

    public function create_lab()
    {
        return view('Masters.Lab_master.create_lab');
    }

    public function store_lab(Request $request): RedirectResponse
    {  
        $request->validate([
            'labname' => 'required',
            'initial' => 'required',
        ]);
           
        DB::table('lab_master')->insert([
            'lab_name' => $request->input('labname'),
            'lab_initial' => $request->input('initial'),
            'created_by' =>  Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('lab_list')
        ->withSuccess('Great! You have Successfully Store Lab');
    }

    public function edit_lab(Request $request,$id)
    {
        $lab_detail = DB::table('lab_master')->where('lab_id',$id)->first();
        return view('Masters.Lab_master.edit_lab',compact('lab_detail'));
    }

    public function update_lab(Request $request,$id)
    {
        $request->validate([
            'labname' => 'required',
            'initial' => 'required',
        ]);
           
        DB::table('lab_master')->where('lab_id',$id)->update([
            'lab_name' => $request->input('labname'),
            'lab_initial' => $request->input('initial'),
            'updated_by' =>  Auth::user()->id,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('lab_list')
        ->withSuccess('Great! You have Successfully Update Lab');
    }

    public function delete_lab(Request $request,$id)
    {
        $affected = DB::table('lab_master')
                    ->where('lab_id', $id)
                    ->update([
                        'is_deleted' => 1,
                        'deleted_by' => Auth::user()->id,
                        'deleted_at' => date('Y-m-d H:i:s')
                    ]);

        if ($affected) {
            return redirect()->route('lab_list')
        ->withSuccess('Great! You have Successfully Delete Lab');
        } else {
            return redirect()->route('lab_list')
        ->withSuccess('Sorry! Lab Not Found');
        }
    }

    // main test category 
    public function main_test_category_list()
    {
        $main_category_list = DB::table('main_test_categories')->where('is_deleted','0')->orderby('main_test_categories_id','desc')->get();
        return view('Masters.Main_test_category.main_category_list',compact('main_category_list'));
    }

    public function create_main_test_category()
    {
        return view('Masters.Main_test_category.create_main_category');
    }

    public function store_main_test_category(Request $request): RedirectResponse
    {  
        $request->validate([
            'name' => 'required',
            'initial' => 'required',
        ]);
           
        DB::table('main_test_categories')->insert([
            'main_test_categories_name' => $request->input('name'),
            'main_test_categories_initial' => $request->input('initial'),
            'created_by' =>  Auth::user()->id,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('main_test_category_list')
        ->withSuccess('Great! You have Successfully Store Main Category');
    }

    public function edit_main_test_category(Request $request,$id)
    {
        $category_detail = DB::table('main_test_categories')->where('main_test_categories_id',$id)->first();
        return view('Masters.Main_test_category.edit_main_category',compact('category_detail'));
    }

    public function update_main_test_category(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'initial' => 'required',
        ]);
           
        DB::table('main_test_categories')->where('main_test_categories_id',$id)->update([
            'main_test_categories_name' => $request->input('name'),
            'main_test_categories_initial' => $request->input('initial'),
            'updated_by' =>  Auth::user()->id,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('main_test_category_list')
        ->withSuccess('Great! You have Successfully Update Main Category');
    }

    public function delete_main_test_category(Request $request,$id)
    {
        $affected = DB::table('main_test_categories')
                    ->where('main_test_categories_id', $id)
                    ->update([
                        'is_deleted' => 1,
                        'deleted_by' => Auth::user()->id,
                        'deleted_at' => date('Y-m-d H:i:s')
                    ]);

        if ($affected) {
            return redirect()->route('main_test_category_list')
        ->withSuccess('Great! You have Successfully Delete Category');
        } else {
            return redirect()->route('main_test_category_list')
        ->withSuccess('Sorry! Category Not Found');
        }
    }

}
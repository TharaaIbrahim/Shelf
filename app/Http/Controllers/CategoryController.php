<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $categories=Category::all();
        return view('admin/categorytable',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/categorycreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $checkCategory=Category::where('category_name',$request->category_name)->first();
        if(!empty($checkCategory)){
            return redirect()->back()->with('categoryerror','This Category is Already Exist');
        }else{
            Category::create($request->all());
            $categories=Category::all();
            return view('admin.categorytable',compact("categories"));}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('admin/categoryedit',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $checkCategory=Category::where('category_name',$request->category_name)->where('id','<>',$request->id)->first();
        if(!empty($checkCategory)){
            return redirect()->back()->with('categoryerror','This Category is Already Exist');
        }else{
        $category->update($request->all());
        $categories=Category::all();
        return view('admin.categorytable',compact("categories"));}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category->deleteOrFail();
        return redirect()->back();
    }
}

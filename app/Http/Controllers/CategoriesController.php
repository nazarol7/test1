<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Category::with('Posts')->get();
        return view('categories.index')->with('categories', $categories);
    }

    public function create(){
        return view ('categories.create');
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

        // create category
            
    $category = new Category;
    $category->name = $request->input('name'); 
    $category->description = $request->input('description');

    $category->save();
    
    return redirect('/categories')->with('success', 'Category created');
    }

    public function show($id){
        $category = Category::with('Posts')->find($id);
        return view('categories.show')->with('category', $category);
            
    }

    public function edit($id){
        
        $category = Category::find($id);
        
        return view('categories.edit')->with('category', $category);
    }

    public function update(Request $request, $id){
      

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required'
        ]);

    // upload post
            
    $category = Category::find($id);
    
    $category->name = $request->input('name');
    
    $category->description = $request->input('description');
    

    $category->save();
    
    return redirect('/categories')->with('success', 'Category updated');
        }


        public function destroy($id){
            $category = Category::find($id);
    
            $category->delete();
    
            return redirect('/')->with('success', 'Category Deleted');
        }

}

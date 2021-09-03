<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('category.view')) {
            abort(403, 'Unauthorized Access!');
        }
        $categories=Category::all();
        return  view('backend.pages.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('category.create')) {
            abort(403, 'Unauthorized Access!');
        }
        return  view('backend.pages.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'category_name' =>  'required|max:100',

        ]);
        Category::create([
            'category_name'=>$request->category_name
        ]);
        session()->flash('success', 'Category has been Created!!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  if (is_null($this->user) || !$this->user->can('category.create')) {
        abort(403, 'Unauthorized Access!');
    }

        $category=Category::find($id);
        return  view('backend.pages.category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' =>  'required|max:100',

        ]);
        $category=Category::find($id);
       $category->category_name=$request->category_name;
       $category->save();
        session()->flash('success', 'Category has been Created!!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('category.delete')) {
            abort(403, 'Unauthorized Access!');
        }
        $category=Category::find($id);
        $category->books()->detach();
        $category->delete();
        session()->flash('success', 'Category has been Deleted!!');
        return back();
    }
}

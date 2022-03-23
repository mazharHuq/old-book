<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('visitor.index');
    }
    public function sellerBooks($id){
        $seller=User::findOrfail($id);
        $books=$seller->books;
        return view('frontend.pages.seller-books',compact('seller','books'));
        return $seller->books;
    }

    public function  search(Request $request)

    {
        $data=$request->searchValue;
        $searchList="";
        $books=Book::where('book_name','like','%'.$data."%")->get();
       foreach ($books as $book)
       {
           $x="<li><img src=".URL('storage').'/'.$book->image ." alt=''>
           <div class='search2'>
           <a href=".route('bookDetails',$book->id).">"
               .$book->book_name."</a><span>".$book->sell_price."</span></div></li><br>";
          $searchList=$searchList.$x;
       }
        return response()->json(['success'=>$searchList]);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::find($id);
        $books=$category->books;
        $book_count=count($books);
        return view('frontend.pages.category-show',compact('books','category','book_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function bookDetails($id)
    {
        $book=Book::find($id);

        return view('frontend.pages.book-details',compact('book'));
    }
}

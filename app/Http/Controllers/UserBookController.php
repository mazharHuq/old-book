<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\Tag\P;

class UserBookController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });

    }



    public function index()
    {
        if($this->user==null){
            return 403;
        }else{
            $books=$this->user->books;
            return  view('frontend.pages.dashboard.books.index',compact('books'));
        }
    }


    public function create()
    {
        if($this->user==null){
            return 403;
        }else{
            $categories=Category::all();
            return  view('frontend.pages.dashboard.books.create',compact('categories'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if($this->user==null){
            return 403;
        }else{
            $mainImageLoc = null;
            if ($request->hasFile('main_image')) {
                $validate = $request->validate([
                    'main_image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
                ]);
                $mainImageLoc = $request->main_image->store('images', 'public');
            }


            $book=new Book();
            $book->book_name=$request->book_name;
            $book->image=$mainImageLoc;
            $book->author=$request->author;

            $book->user_id=$this->user->id;
            $book->details=$request->details;
            $book->used=$request->used;
            $book->buy_price=$request->buy_price;
            $book->sell_price=$request->sell_price;

            $book->save();
            $book->categories()->sync($request->categories_id);
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $book=Book::findOrfail($id);
        if($this->user==null || $book->user_id!=$this->user->id){

           return redirect('/user/login');
        }else{

            $book->is_sold=true;
            $book->save();

            return redirect('/user-dashboard/book')->with('success',"The Book Successfully Marked as Sold");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($this->user==null){
            return 403;
        }else{
            $book=Book::findOrFail($id);
            $categories=Category::all();
            return  view('frontend.pages.dashboard.books.create',compact('categories','book'));
        }
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
        if($this->user==null){
            return route('user.login');
        }else{
            $mainImageLoc = null;
            if ($request->hasFile('main_image')) {
                $validate = $request->validate([
                    'main_image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
                ]);
                $mainImageLoc = $request->main_image->store('images', 'public');
            }


            $book=Book::findOrFail($id);

            $book->book_name=$request->book_name;
            if($mainImageLoc){
                $book->image=$mainImageLoc;
            }

            $book->author=$request->author;

            $book->user_id=$this->user->id;
            $book->details=$request->details;
            $book->used=$request->used;
            $book->buy_price=$request->buy_price;
            $book->sell_price=$request->sell_price;

            $book->save();
            $book->categories()->sync($request->categories_id);
            return redirect()->back();
        }
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
}

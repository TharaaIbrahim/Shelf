<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;
use App\Models\category;
use Illuminate\Http\Request;
use Session;

class BookController extends Controller
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
        $books= DB::table('books')->select([
            'users.name',
            'books.id',
            'books.book_name',
            'books.description',
            'books.delivery',
            'books.image',
            'books.price',
            'books.phone',
            'categories.category_name',
        ])->Join('users','books.user_id', '=', 'users.id')
        ->Join('categories','categories.id', '=','books.category_id')
        ->get();
       
        return view('shelf/shelf',compact('books','categories'));
        
    }
    
    public function bestprice()
    {
        //

         $lastBooks= Book ::join('users', 'users.id', '=', 'books.user_id')-> latest('books.created_at')->take(3)->get();
         $free=Book ::join('users', 'users.id', '=', 'books.user_id')-> where('price','=',0)->take(3)->get();
        //  dd($bestPrice);
         return view ('shelf/home',compact('lastBooks' , 'free'));
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=Category::all();
        return view('admin.bookcreate',compact('categories'));
    }
    public function addbook(){
        $categories=Category::all();
        return view('shelf/addbook',compact('categories'));
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
        if($request->book_name.length() >10){
            return redirect()->back()->with('message','name must be less than 10 char');
        }else if($request->description.length() > 25){
            return redirect()->back()->with('message','description must be less than 10 char');
        }else{
               Book::create($request->all());
        $books= DB::table('books')->select([
            'users.name',
            'books.id',
            'books.book_name',
            'books.description',
            'books.delivery',
            'books.image',
            'books.price',
            'books.phone',
            'categories.category_name',
        ])->Join('users','books.user_id', '=', 'users.id')
        ->Join('categories','categories.id', '=','books.category_id')
        ->get();
        if(Auth::user()->role == "admin"){
           return view('admin.tables',compact("books")); 
        }else{
            return view('shelf/shelf',compact("books"));
        }
        
        }
     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
        $categories=Category::all();
        $selected=Category::find($book->category_id);
        return view('admin.bookedit',compact('book','categories','selected'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
        
        $book->update(['book_name'=>$request->name,'description'=>$request->description,'image'=>$request->image,'category_id'=>$request->category_id]);   
        $books= DB::table('books')->select([
            'users.name',
            'books.id',
            'books.book_name',
            'books.description',
            'books.delivery',
            'books.image',
            'books.price',
            'categories.category_name',
        ])->Join('users','books.user_id', '=', 'users.id')
        ->Join('categories','categories.id', '=','books.category_id')
        ->get();
        return view('admin.tables',compact("books"));  
    }
    
    public function filter(Request $request){
        $categories=Category::all();
        $books= DB::table('books')->select([
            'users.name',
            'books.id',
            'books.book_name',
            'books.description',
            'books.delivery',
            'books.phone',
            'books.image',
            'books.price',
            'categories.category_name',
        ])->Join('users','books.user_id', '=', 'users.id')
        ->Join('categories','categories.id', '=','books.category_id')
        ->where('categories.category_name','LIKE',"%{$request->category}%")
        ->orWhere('books.book_name','LIKE',"%{$request->search}%")
        ->orWhere('books.delivery','LIKE',"%{$request->search}%")
        ->orWhere('books.price','LIKE',"%{$request->search}%")
        ->get();
        // dd($books);
        return view('shelf.shelf',compact('books','categories'));
    }

    public function favorite($id){
        $book= DB::table('books')->select([
            'users.name',
            'books.id',
            'books.book_name',
            'books.description',
            'books.delivery',
            'books.phone',
            'books.image',
            'books.price',
            'categories.category_name',
        ])->Join('users','books.user_id', '=', 'users.id')
        ->Join('categories','categories.id', '=','books.category_id')
        ->where('books.id',$id)
        ->first();
        
    }
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $book->delete(); 
        return redirect()->back();
    }
}

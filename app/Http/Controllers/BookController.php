<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Book;
use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;
// use Session;

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
            'books.address',
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
        
        if(strlen($request -> book_name) >15){
            return redirect()->back()->with('nameMessage','name must be less than 15 char');
        } if(strlen($request->description) > 50){
            return redirect()->back()->with('descMessage','description must be less than 30 char');
        }
            $categories=Category::all();
               Book::create($request->all());
        $books= DB::table('books')->select([
            'users.name',
            'books.id',
            'books.book_name',
            'books.description',
            'books.delivery',
            'books.image',
            'books.address',
            'books.price',
            'books.phone',
            'categories.category_name',
        ])->Join('users','books.user_id', '=', 'users.id')
        ->Join('categories','categories.id', '=','books.category_id')
        ->get();
        if(Auth::user()->role == "admin"){
           return view('admin.tables',compact("books")); 
        }else{
            return view('shelf/shelf',compact("books","categories"));
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
        if(Auth::user()->role=="admin"){
            return view('admin.bookedit',compact('book','categories','selected'));
        }else{
            return view('shelf.editBook',compact('book','categories','selected'));
        }
        
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
            'books.address',
            'books.phone',
            'books.price',
            'categories.category_name',
        ])->Join('users','books.user_id', '=', 'users.id')
        ->Join('categories','categories.id', '=','books.category_id')
        ->get();
        if(Auth::user()->role=="admin"){
            return view('admin.tables',compact("books"));  
        }else{
            $id= Auth::user()->id ;
            $userAccount=User::where('id',$id)->first();
            $userBooks= DB::table('books')->select([
                'users.name',
                'books.id',
                'books.book_name',
                'books.description',
                'books.delivery',
                'books.image',
                'books.price',
                'books.address',
                'books.phone',
                'categories.category_name',
            ])->Join('users','books.user_id', '=', 'users.id')
            ->Join('categories','categories.id', '=','books.category_id')
            ->Where('users.id', '=' , $id)
            ->get();
            // dd($userAccount);
            return view ('shelf.userBooks',compact('userBooks','userAccount'));
        }
       
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
            'books.address',
            'books.price',
            'categories.category_name',
        ])->Join('users','books.user_id', '=', 'users.id')
        ->Join('categories','categories.id', '=','books.category_id')
        ->Where('categories.category_name','LIKE',"%{$request->category}%")
        ->orWhere('books.book_name','LIKE',"%{$request->search}%")
        ->orWhere('books.delivery','LIKE',"%{$request->search}%")
        ->orWhere('books.price','LIKE',"%{$request->search}%")
        ->orWhere('books.address','LIKE',"%{$request->search}%")
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
            'books.address',
            'books.price',
            'categories.category_name',
        ])->Join('users','books.user_id', '=', 'users.id')
        ->Join('categories','categories.id', '=','books.category_id')
        ->where('books.id',$id)
        ->first();
         
       
        //   Session::forget('favorite');
          if(Session::has('favorite')){
         Session::push('favorite',$book);
        }else{ 
            Session::put('favorite',[$book]);
           
        }

        $categories=Category::all();
        $books= DB::table('books')->select([
            'users.name',
            'books.id',
            'books.book_name',
            'books.description',
            'books.delivery',
            'books.image',
            'books.address',
            'books.price',
            'books.phone',
            'categories.category_name',
        ])->Join('users','books.user_id', '=', 'users.id')
        ->Join('categories','categories.id', '=','books.category_id')
        ->get();
       
        return view('shelf/shelf',compact('books','categories'));
        
    }

    public function deleteFav($id){
        $book = Session::get('favorite');    
        for($index=0 ; $index < count(Session::get('favorite')) ; $index++){
            if (Session::get('favorite')[$index]->id == $id){
                unset($book[$id]); 
                Session::put('favorite', $book); 
                 break;
            } 
        }
      
        $categories=Category::all();
        $books= DB::table('books')->select([
            'users.name',
            'books.id',
            'books.book_name',
            'books.description',
            'books.delivery',
            'books.image',
            'books.address',
            'books.price',
            'books.phone',
            'categories.category_name',
        ])->Join('users','books.user_id', '=', 'users.id')
        ->Join('categories','categories.id', '=','books.category_id')
        ->get();
       
        return view('shelf/shelf',compact('books','categories'));
    }

    public function favorites(){
        $id= Auth::user()->id ;
        $userAccount=User::where('id',$id)->first();
        return view('shelf.favorite',compact('userAccount'));
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

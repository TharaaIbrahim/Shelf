<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users=User::all();
        return view("admin.usertable",compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.usercreate');

    }
    public function account(){
        $id= Auth::user()->id ;
       $userAccount=User::where('id',$id)->first();
       return view('shelf.account',compact('userAccount'));
    }

    public function userBooks(){
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
            'books.phone',
            'categories.category_name',
        ])->Join('users','books.user_id', '=', 'users.id')
        ->Join('categories','categories.id', '=','books.category_id')
        ->Where('users.id', '=' , $id)
        ->get();
        // dd($userAccount);
        return view ('shelf.userBooks',compact('userBooks','userAccount'));
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
        $checkEmail=User::where('email',$request->email)->first();
        if(!empty($checkEmail)){
            return redirect()->back()->with('emailerror','This Email is Already Exist');
        }else{
        User::create($request->all());
        $users=User::all();
        return view('admin.usertable',compact("users"));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('admin.useredit',compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $checkEmail=User::where('email',$request->email)->where('id','<>',$user->id)->first();
        if(!empty($checkEmail)){
            return redirect()->back()->with('emailerror','This Email is Already Exist');
        }else{
        $user->update($request->all());   
        $users=User::all();
        return view('admin.usertable',compact("users"));}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete(); 
        return redirect()->back();
    }
}

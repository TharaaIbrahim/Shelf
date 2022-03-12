<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User-Account</title>
    <link rel="stylesheet" href="{{asset('https://pro.fontawesome.com/releases/v5.10.0/css/all.css')}}">
     <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css2/account.css')}}" rel="stylesheet" >
    <link href="{{asset('css2/nav.css')}}" rel="stylesheet" >
    <link href="{{asset('css2/index.css')}}" rel="stylesheet" > 
    <link href="{{asset('css2/shelf.css')}}" rel="stylesheet" >
</head>
<body>
@extends('layouts.footer')
@extends('layouts.nav')
    @section('content')
    <div class="account-container">
      <div class="account-top">
      <i class="far fa-user"></i>
        <div class="account-info">
          <ul>
            <li>User: {{$userAccount->name}} </li>
            <li>Email: {{$userAccount->email}}</li>
          </ul>
        </div>
      </div>
      <main>
        <ul class="sections">
      <a  href="{{route('users.mybooks')}}" style="background-color:var(--nav_color);  transform: scale(.90, .90);"  > <li style="color:var(--primary);">My Books</li> </a>
         <a href="/addbook">  <li>Add Book </li></a>
         <a href="{{route('books.favorites')}}"><li>Favorite</li></a>  
        </ul>
      </main>
      <div class="shelf-books">
        @foreach($userBooks as $book)
      <div class="card-container">
      <img src="{{ asset('/assets/img/'.$book->image) }}" alt="{{$book->book_name}}" >
      <h3>{{$book->book_name}}</h3>
      <p>{{$book->category_name}}</p>
      <p>
        <b>{{$book->price}} JD</b>
      </p>
      <p>{{$book->description}}</p>
      <p> <b>Published by:</b> {{$book->name}}</p>
      <p>  <i class="far fa-phone"></i> {{$book->phone}} </p>
      <p>
        <b>Delivery Option:</b>
        {{$book->delivery}}
      </p>
      <div class="edit-delete"> <button class="edit-user-book"  style="background-color:green !important;color:white;border:none;padding:0.5rem;border-radius:3px"><a style="text-decoration:none; color:white"href="{{route('books.edit',$book->id)}}">edit</a></button></td>
                                          
                                   
                                          <form method="POST" action="{{route('books.destroy',$book->id)}}">
                                           @csrf
                                           @method('delete')

                                        <button type="submit" class="delete-user-book" style="background-color:red !important;color:white;border:none;padding:0.5rem;border-radius:3px">delete</button>
                                     </form></div>
     
    </div>
     @endforeach
  
      </div>
    </div>.<script src="{{asset('js2/nav.js')}}" ></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
@endsection
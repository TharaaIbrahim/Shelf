<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shelf is a Joradnian Website ,Allows user to buy books or sell thier own Books">
    <meta name="keywords" content="book, buy, used , sell ,shelf">
    <meta name="application-name" content="shelf">
    <title>{{$userAccount->name}}|Favorites</title>
    <!-- CSS only -->
    <link rel = "icon" href = "assets\img\books1648289621.ico" 
        type = "image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
      <a  href="{{route('users.mybooks')}}"   > <li >My Books</li> </a>
         <a href="/addbook">  <li>Add Book </li></a>
         <a  href="{{route('books.favorites')}}" style="background-color:var(--nav_color);  transform: scale(.90, .90);"  > <li style="color:var(--primary);">Favorite</li></a> 
        </ul>
      </main>
      <div class="shelf-books">
        @if(!empty(Session::get('favorite')))
       @foreach(Session::get('favorite') as $book)
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
      <p> <i class="far fa-address"></i> {{$book->address}}</p>
      <p>
        <b>Delivery Option:</b>
        {{$book->delivery}}
      </p>
      <a href="{{route('books.deleteFav',$book->id)}}"> <i class="fa fa-heart"></i></a>
    </div>
   @endforeach
   
   @else
   <div style="text-align:center ;width:100% !important;">No Favorite Books Yet! </div>@endif
      </div>
    </div>
       <script src="{{asset('js2/nav.js')}}" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
@endsection
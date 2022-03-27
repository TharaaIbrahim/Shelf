<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shelf is a Joradnian Website ,Allows user to buy books or sell thier own Books">
    <meta name="keywords" content="book, buy, used , sell ,shelf">
    <meta name="application-name" content="shelf">
    <title>Shelf|Home</title>
    <!-- CSS only -->
    <link rel = "icon" href = "assets\img\books1648289621.ico" 
        type = "image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="{{asset('css2/nav.css')}}" rel="stylesheet" >
<link href="{{asset('css2/shelf.css')}}" rel="stylesheet" >
<link href="{{asset('css2/index.css')}}" rel="stylesheet" >
<link href="{{asset('css2/home.css')}}" rel="stylesheet" >
</head>
<body> 
@extends('layouts.footer')
@extends('layouts.nav')
    @section('content')
    <!-- JavaScript Bundle with Popper -->
    <main>
    <div class="Home_ID">
      <img src="assets/img/books.jpg" alt="Group of books" />
      <div class="Home_ID_Content">
        <div class="Home_ID_Title">
          <h1> Shelf is a Joradnian Website </h1>
          <p> Allows user to buy books or sell thier own Books</p>
        </div>
       <a href="{{route('books.index')}}"><button class="login">
         Show Shelf
        </button></a>
        <a href="/about"><button class="login">
         About
        </button></a>
        
      </div>
    </div>
    <div class="on-shelf">
    <h2>New Books</h2>
    <div class='cards-container'>
      @foreach($lastBooks as $book)
      <div class="card-container">
      <img src="{{ asset('/assets/img/'.$book->image) }}" alt="{{$book->book_name}}" >
      <h3>{{$book->book_name}}</h3>
      <p>
        <b>{{$book->price}} JD</b>
      </p>
      @if ( !empty(Auth::user()))
      <p> <b>Published by:</b> {{$book->name}}</p>
      <p>  <i class="far fa-phone"></i> {{$book->phone}} </p>
      <p> <i class="far fa-map-pin"></i> {{$book->address}}</p>
      @endif
      <p>
        <b>Delivery Option:</b>
        {{$book->delivery}}
      </p>
    </div> @endforeach

</div>

<div class="on-shelf">
    <h2>Free Books</h2>
    <div class='cards-container'>
      @foreach($free as $book)
      <div class="card-container">
      <img src="{{ asset('/assets/img/'.$book->image) }}" alt="{{$book->book_name}}" >
      <h3>{{$book->book_name}}</h3>
      <p>
        <b>{{$book->price}} JD</b>
      </p>
      @if ( !empty(Auth::user()))
      <p> <b>Published by:</b> {{$book->name}}</p>
      <p>  <i class="far fa-phone"></i> {{$book->phone}} </p>
      <p> <i class="far fa-map-pin"></i> {{$book->address}}</p>
      @endif
      <p>
        <b>Delivery Option:</b>
        {{$book->delivery}}
      </p>
    </div> @endforeach


</div>

    </div>

    </div>
 </main>

<!-- JavaScript Bundle with Popper -->
<script src="{{asset('js2/nav.js')}}" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>  
 @endsection
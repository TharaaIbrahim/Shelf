<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shelf is a Joradnian Website ,Allows user to buy books or sell thier own Books">
    <meta name="keywords" content="book, buy, used , sell ,shelf">
    <meta name="application-name" content="shelf">
    <title>Shelf</title>
    <!-- CSS only -->
    <link rel = "icon" href = "assets\img\books1648289621.ico" 
        type = "image/x-icon">
    <link rel="stylesheet" href="{{asset('https://pro.fontawesome.com/releases/v5.10.0/css/all.css')}}">
     <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css2/shelf.css')}}" rel="stylesheet" >
    <link href="{{asset('css2/nav.css')}}" rel="stylesheet" >
    <link href="{{asset('css2/index.css')}}" rel="stylesheet" > 
</head>
<body>
@extends('layouts.footer')
@extends('layouts.nav')
    @section('content')
<div class="shelf-container">
      <div class="shelf_hero">
        <h1>On Shelf</h1>
      </div>
      <div class="search-categories">
         <form method="GET" action="{{route('books.filter')}}" style="display:flex;justify-content:center;">
         @csrf
        <div class="categories">
          <label for="category">Category</label>
          <select
          class="form-select"
            id="category"
            name="category"
          >
          <option>Categories</option>
          @foreach($categories as $category)
           <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach
          </select>
        </div>
        <div class="searchBar">
              <input style="width: 80%;margin-left:1rem;" type="text" name="search" value="" placeholder="Name,Price,Delivery" class="form-control" id="search" />
        </div>
         <button type="submit" class="btn btn search-btn" style="height:35% !important;align-self: center !important;" >Search</button>
         </form>
      </div>

      <div class="shelf-books">
        @foreach($books as $book)
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
      {{$found = false}}
      @if(!empty(Session::get('favorite')))
      @foreach(Session::get('favorite') as $bookFav)
      @if($bookFav->id === $book->id)
      {{$found=true}}
      @break
      @else
      {{$found=false}}
      @endif
      @endforeach
      @endif

      @if($found==true)
     <a href="{{route('books.deleteFav',$book->id)}}"> <i class="fa fa-heart"></i></a>
      @else
      <a href="{{route('books.favorite',$book->id)}}"><i class="far fa-heart" ></i></a> 
      @endif
    </div>
     @endforeach
  
      </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="{{asset('js2/nav.js')}}" ></script>
<script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js')}}" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
@endsection
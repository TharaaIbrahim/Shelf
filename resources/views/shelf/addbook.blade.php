<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shelf is a Joradnian Website ,Allows user to buy books or sell thier own Books">
    <meta name="keywords" content="book, buy, used , sell ,shelf">
    <meta name="application-name" content="shelf">
    <title>Shelf|AddBook</title>
    <!-- CSS only -->
    <link rel = "icon" href = "assets\img\books1648289621.ico" 
        type = "image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{asset('css2/addbook.css')}}" rel="stylesheet" >
    <link href="{{asset('css2/nav.css')}}" rel="stylesheet" >
    <link href="{{asset('css2/index.css')}}" rel="stylesheet" > 
</head>
<body>
@extends('layouts.footer')
@extends('layouts.nav')
    @section('content')
    <div class="add_Book">
      <h1 class="addBook_Title">Add Book</h1>
      <form  action="{{route('books.store')}}" method="post" class="addBook_Form" >
      @csrf
      <label class="label-form" for="book_name">Book Name</label>
        <Input
        id="book_name"
        class="input-form"
          type="text"
          name="book_name"
          placeholder="Book Name"
          required
        >
        @if(!empty(Session::get('nameMessage')))
                           <div class="alert alert-danger error"> {{ Session::get('nameMessage') }}</div>
                            @endif
        <label class="label-form" for="description">Description</label>
        <textarea
          rows="5"
          class="description"
          id="description"
          name="description"
          placeholder="Enter Description"
          required
        ></textarea>
        @if(!empty(Session::get('descMessage')))
                           <div class="alert alert-danger error"> {{ Session::get('descMessage') }}</div>
                            @endif
        <label class="label-form" for="phone">Phone</label>
        <Input
        id="phone"
        class="input-form"
          type="tel"
          name="phone"
          placeholder="0XX XXXXXXX"
          required
        >
        <label class="label-form" for="address">Address</label>
        <Input
        id="address"
        class="input-form"
          type="text"
          name="address"
          placeholder="city - street"
          required
        >
        <div class="categories">
          <label class="label-form" for="category">Category</label>
          <select
          class="form-select"
            id="category"
            name="category_id"
            required
          >
          <option value="">Books Categories</option>
          @foreach($categories as $category)
          <option value="{{$category->id}}">{{$category->category_name}}</option>
            @endforeach>
          </select>
        </div>
        <label class="label-form" for="price">Price</label>
        <Input
        id="price"
        class="input-form"
          type="number"
          min="0"
          name="price"
          placeholder="JD"
          required
        />
        <div class="image-input"> 
            <label class="label-form">Book Image</label>
            <Input  class="input-form" type="file" name="image" placeholder="Book Image" required />
        </div>
       
        <div class="delivery_Status">
          <label class="label-form" for="delivery">Delivery Option</label>
          <select
            id="delivery"
            name="delivery"
            required
          >
            <option value="">Delivery</option>
            <option value="available"> Available</option>
            <option value="unavailable">Unavailable</option>
          </select>
        </div>
        <input class="input-form" name="user_id" type="hidden" value="{{ Auth::user()->id }}">
        <button class="addBook_Btn" type="submit">
          Add
        </button>
      </form>
    </div>
  <!-- JavaScript Bundle with Popper -->
<script src="{{asset('js2/nav.js')}}" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
@endsection
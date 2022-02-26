<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add-Book</title>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css2/addbook.css" rel="stylesheet" >
    <link href="css2/nav.css" rel="stylesheet" >
    <link href="css2/index.css" rel="stylesheet" > 
</head>
<body>
@extends('layouts.footer')
@extends('layouts.nav')
    @section('content')
    <div class="add_Book">
      <h1 class="addBook_Title">Add Book</h1>
      <form  action="{{route('books.store')}}" method="post" class="addBook_Form" >
      @csrf
      <label for="book_name">Book Name</label>
        <Input
          type="text"
          name="book_name"
          placeholder="Book Name"
          required
        >
        @if(!empty(Session::get('message')))
                           <div class="alert alert-danger"> {{ Session::get('message') }}</div>
                            @endif
        <p id="bookName_msg"></p>
        <label for="description">Description</label>
        <textarea
          rows="5"
          class="description"
          id="description"
          name="description"
          placeholder="Enter Description"
          required
        ></textarea>
        @if(!empty(Session::get('message')))
                           <div class="alert alert-danger"> {{ Session::get('message') }}</div>
                            @endif
        <p id="description_msg"></p>
        <label for="phone">Phone</label>
        <Input
          type="tel"
          name="phone"
          placeholder="0XX XXXXXXX"
          required
        >
        <div class="categories">
          <label for="category">Category</label>
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
        <label for="price">Price</label>
        <Input
          type="number"
          name="price"
          placeholder="JD"
          required
        />
        <div class="image-input"> 
            <label>Book Image</label>
            <Input type="file" name="image" placeholder="Book Image" required />
        </div>
       
        <div class="delivery_Status">
          <label htmlFor="delivery">Delivery Option</label>
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
        <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
        <button class="addBook_Btn" type="submit">
          Add
        </button>
      </form>
    </div>
  <!-- JavaScript Bundle with Popper -->
<script src="js2/nav.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
@endsection
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shelf is a Joradnian Website ,Allows user to buy books or sell thier own Books">
    <meta name="keywords" content="book, buy, used , sell ,shelf">
    <meta name="application-name" content="shelf">
    <title>Shelf|EditBook</title>
    <!-- CSS only -->
    <link rel = "icon" href = "assets\img\books1648289621.ico" 
        type = "image/x-icon">
    <link rel="stylesheet" href="{{asset('https://pro.fontawesome.com/releases/v5.10.0/css/all.css')}}">
     <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
     <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js')}}" crossorigin="anonymous"></script>
    <link href="{{asset('css2/nav.css')}}" rel="stylesheet" >
    <link href="{{asset('css2/index.css')}}" rel="stylesheet" > 
</head>
<body>
@extends('layouts.footer')
@extends('layouts.nav')
    @section('content')
    <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Edit Book</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('books.update',$book->id)}}">
                                        @csrf
                                        @method('PUT')
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter book name" name="name" value="{{$book->book_name}}" />
                                                        <label for="inputFirstName">Name</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-floating mb-3"> 
                                                <input type="file" id="myfile" name="image"  required>
                                            </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Enter description" name="description" value="{{$book->description}}" />
                                                <label for="inputEmail">Description</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="tel"  name="phone"
                                             value="{{$book->phone}}"
                                             placeholder="07X XXXXXXX" />
                                                <label for="phone">Phone</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="address" type="text"  name="address"
                                                value="{{$book->address}}"
                                             placeholder="city - street" />
                                                <label for="address">Address</label>
                                            </div>
                                            <select name="category_id" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            @foreach($categories as $category)
                                                         @if($category->category_name != $selected->category_name) 
                                                         <option value='{{ $category->id }}'>   {{$category->category_name}} </option> @else 
                                                         <option value='{{ $selected->id }}' selected>   {{$selected->category_name}} </option> @endif
                                                          @endforeach
                                            </select>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" style="color:black !important;">Edit Book</button></div>
                                            </div>
                                        </form>
                                    </div>
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
          
        </div>
        <script src="{{asset('https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js')}}" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        </div><script src="{{asset('js2/nav.js')}}" ></script>
    </body>
</html>
@endsection
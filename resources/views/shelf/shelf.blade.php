<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelf</title> 
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css2/shelf.css" rel="stylesheet" >
    <link href="css2/nav.css" rel="stylesheet" >
    <link href="css2/index.css" rel="stylesheet" > 
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
        <div class="categories">
          <label for="category">Category</label>
          <select
          class="form-select"
            id="category"
            name="category"
          >
            <option value="">Books Categories</option>
            <option value="novel">Novel</option>
            <option value="religious">Religious</option>
            <option value="historical">Historical</option>
            <option value="scientific">Scientific</option>
            <option value="kids">Kids</option>
            <option value="textBook">TextBook</option>
            <option value="self development">Self development</option>
            <option value="businees">businees</option>
          </select>
        </div>
        <div class="searchBar">
          <!-- <Input type="search" name="search" placeholder="Search ..." /> -->
          <div class="row">
            <form method="GET" action="" style="display:flex;justify-content:center;">
              <input style="width: 50%;margin-right:1rem;" type="text" name="search" value="" placeholder="Search" class="form-control" id="search" />
              <button type="submit" class="btn btn search-btn">Search</button>
          </div>
        </div>
      </div>

      <div class="shelf-books">
      <div class="card-container">
      <img src="assets/img/book2.png" alt='' />
      <h3>Book Name</h3>
      <p>
        <b>2 JD</b>
      </p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos quisquam aliquid beatae consequuntur illo.</p>
      <p>
        <b>Delivery Option:</b>
        Allowed
      </p>
      <i class="far fa-heart" ></i>
      <!-- <i class="fa fa-heart"></i> -->
    </div>

    <div class="card-container">
      <img src="assets/img/book2.png" alt='' />
      <h3>Book Name</h3>
      <p>
        <b>2 JD</b>
      </p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos quisquam aliquid beatae consequuntur illo.</p>
      <p>
        <b>Delivery Option:</b>
        Allowed
      </p>
      <i class="far fa-heart"></i>
     <!-- <i class="fa fa-heart"></i> -->
    </div>

    <div class="card-container">
      <img src="assets/img/book2.png" alt='' />
      <h3>Book Name</h3>
      
      <p>
        <b>2 JD</b>
      </p>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos quisquam aliquid beatae consequuntur illo.</p>
      <p>Published by: userName</p>
      <p>  <i class="far fa-phone"></i> 07777777</p>
      <p>
        <b>Delivery Option:</b>
        Allowed
      </p>
      <i class="far fa-heart"></i>
     <!-- <i class="fa fa-heart"></i> -->
    </div>
      </div>
    </div>
    <!-- JavaScript Bundle with Popper -->
<script src="js2/nav.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
@endsection
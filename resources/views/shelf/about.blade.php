<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Shelf is a Joradnian Website ,Allows user to buy books or sell thier own Books">
    <meta name="keywords" content="book, buy, used , sell ,shelf">
    <meta name="application-name" content="shelf">
    <title>Shelf|About</title>
    <!-- CSS only -->
    <link rel = "icon" href = "assets\img\books1648289621.ico" 
        type = "image/x-icon">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="css2/about.css" rel="stylesheet" >
    <link href="css2/nav.css" rel="stylesheet" >
    <link href="css2/index.css" rel="stylesheet" > 
</head>
<body>
@extends('layouts.footer')
@extends('layouts.nav')
    @section('content')
<div class="about">
      <img
        class="about_Img"
        src="assets/img/aboutPic.png"
        alt="An expressive image of exchanging books"
      />
      <div class="about_Content">
        <h1>About Shelf</h1>
        <p>Bookshelf is a free website that aims to reuse used books and get them
           It is at a lower price than new books, so we benefit from each of the sellers
           And the buyer is only inside the Hashemite Kingdom of Jordan
        </p>
        <SocialIcons class="about_social" />
      </div>
    </div>
    <script src="js2/nav.js" ></script>
</body>
</html>
@endsection
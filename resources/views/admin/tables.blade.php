
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('css/styles.css')}}"  rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
      @extends('layouts.dashboard');
            
            @section('content')
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4" style="margin-bottom:2%;">Books Table</h1>
                        <div class="card mb-4" style="border:none;">
                       <button  style="width:20%" class="create"><a class="dropdown-item" href="{{route('books.create')}}">Create Book</a></button>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Books
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>User</th>
                                            <th>Book_name</th>
                                            <th>Category</th>
                                            <th>image</th>
                                            <th>price</th>
                                            <th>description</th>
                                            <th>delivery</th>
                                            <th>Edit</th>
                                            <th>delete</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                            <th>User</th>
                                            <th>Book_name</th>
                                            <th>Category</th>
                                            <th>image</th>
                                            <th>price</th>
                                            <th>description</th>
                                            <th>delivery</th>
                                            <th>phone</th>
                                            <th>address</th>
                                            <th>Edit</th>
                                            <th>delete</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($books as $book)
                                        <tr>
                                            <td>{{$book->name}}</td>   
                                            <td>{{$book->book_name}}</td> 
                                            <td>{{$book->category_name}}</td> 
                                            <td><img src="{{ asset('/assets/img/'.$book->image) }}" alt="{{$book->book_name}}" width="300vw"/></td>
                                            <td>{{$book->price}}JD</td>
                                            <td>{{$book->description}}</td>
                                            <td>{{$book->delivery}}</td>
                                            <td>{{$book->phone}}</td>
                                            <td>{{$book->address}}</td>
                                            
                                           
                                            <td><button class="edit"  style="background-color:green !important;color:white;border:none;padding:0.5rem;border-radius:3px"><a style="text-decoration:none; color:white"href="{{route('books.edit',$book->id)}}">edit</a></button></td>
                                          
                                            <td>
                                            <form method="POST" action="{{route('books.destroy',$book->id)}}">
                                             @csrf
                                             @method('delete')

                                          <button type="submit" class="delete" style="background-color:red !important;color:white;border:none;padding:0.5rem;border-radius:3px">delete</button>
                                       </form>
                                    </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('js/scripts.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
        @endsection
    </body>
</html>

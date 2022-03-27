<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Create Book</title>
        <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body >

            
            @section('content')
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Book</h3></div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('books.store')}}">
                                        @csrf
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter room name" name="book_name"  />
                                                        <label for="inputFirstName">Book Name</label>
                                                    </div>
                                                    @if(!empty(Session::get('nameMessage')))
                           <div class="alert alert-danger error"> {{ Session::get('nameMessage') }}</div>
                            @endif
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" min="0" type="number" placeholder="Enter price" name="price"  />
                                                        <label for="inputLastName">Price</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" placeholder="Enter description" name="description"  />
                                                <label for="inputEmail">Description</label>
                                            </div>
                                            @if(!empty(Session::get('descMessage')))
                           <div class="alert alert-danger error"> {{ Session::get('descMessage') }}</div>
                            @endif
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="tel"  name="phone"
                                             placeholder="07X XXXXXXX" />
                                                <label for="phone">Phone</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="address" type="text"  name="address"
                                             placeholder="city - street" />
                                                <label for="address">Address</label>
                                            </div>
                                            <div class="form-floating mb-3"> 
                                                <input type="file" id="myfile" name="image">
                                            </div>
                                         
                                            <select name='category_id' class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                                            <option>Category</option>
                                                          @foreach($categories as $category)
                                                          <option value="{{$category->id}}">{{$category->category_name}}</option>
                                                          @endforeach
                                            </select>
                                                
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit">Create Book</button></div>
                                            </div>
                                            <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                        </form>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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

    </body>
</html>

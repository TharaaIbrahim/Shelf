<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Users - Table</title>
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
                        <h1 class="mt-4" style="margin-bottom:2%;">Users Table</h1>
                        <div class="card mb-4" style="border:none;">
                       <button class="create" style="width:20%"><a class="dropdown-item" href="{{route('users.create')}}" >Create User</a></button>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Users
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>name</th>
                                            <th>email</th>
                                        
                                            <th>password</th>
                                            <th>is_admin </th>
                                          
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>name</th>
                                            <th>email</th>
                                         
                                            <th>password</th>
                                            <th>is_admin </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>   
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->password}}</td>
                                            <td>{{$user->role}}</td>
                                          
                                          @if($user->role != "admin")
                                          <td><button class="edit" style="background-color:green !important;color:white;border:none;padding:0.5rem;border-radius:3px"><a style="text-decoration:none; color:white" href="{{route('users.edit',$user->id)}}">edit</a></button></td>
                                            <td>
                                                
                                            <form method="POST" action="{{route('users.destroy',$user->id)}}">
                                             @csrf
                                             @method('delete')

                                         <button  style="background-color:red !important;color:white;border:none;padding:0.5rem;border-radius:3px" type="submit" class="delete">delete</button>
                                       </form>
                                       
                                    </td>@endif
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

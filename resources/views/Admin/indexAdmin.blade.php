
@extends('layouts.NavMenu')

@section('content')


<div class="container" style="margin-left:266px;">
<div class="text-center  "><h1 class=" border-bottom  d-inline-block border-success mt-4 ml-5 text-info font-weight-bold">Listes Des Admin</h1></div>

  @if(session()->has('success'))
  <div class="alert alert-success">
  {{session()->get('success')}}
  </div>
  @endif

  @if(session()->has('suppression'))
  <div class="alert alert-info">
  {{session()->get('suppression')}}
  </div>
  @endif

  @if(session()->has('modification'))
  <div class="alert alert-warning">
  {{session()->get('modification')}}
  </div>
  @endif
        
<div class="row">
        
        
        <table  class="table table table-striped table-hover table-bordered border-primary table-sm fluid mt-5 ml-2 shadow-lg p-3 mb-6 bg-white rounded">
            <head>
            <tr class="table-primary">
                <th scope="col">ID</th>
                <th scope="col">Username</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">EMAIL</th>
            
                <th scope="col">Les Roles :</th>
                <th scope="col" >operation</th>
            </tr>
</head>

        <body>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->Nom}}</td>
                <td>{{$user->Prenom}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->role}}</td>
                <td>  

                                 
<form action="{{url('users/'.$user->id)}}" method="post">





<!-- @@@@@@@ -->
               <a href="{{url('users/'.$user->id.'/edit')}}" onclick="print"><button  class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg></button>

  {{csrf_field()}}
  {{method_field('DELETE')}}

 <button class="btn btn-danger" type="submit"> 

 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
</svg>
</button>

</form>


                </td>
            </tr>
            @endforeach

        </body>
        </table>
 

    
    
    </div>



    </div>

</div>





@endsection
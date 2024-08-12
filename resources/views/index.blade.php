@extends('layouts.NavMenu')

@section('content')




<div class="container" style="margin-left:266px;">
<div class="text-center  "><h1 class=" border-bottom  d-inline-block border-success mt-4 ml-5 text-info font-weight-bold">Listes Des Employés</h1></div>

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
         <div>
           <form action="/search" methode="get" >
          <div class="form-inline ">
       
           <input  type="search" class="form-control col-sm-3 ml-4 " name="search" placeholder="Nom,Ville,Département">&ensp;
          <label for="">  <button type="submit" class="btn btn-warning" >search</button> </label>
         
          </div>
            </form>
          
<div class="row">
        
        
        <table  class="table table table-striped table-hover table-bordered border-primary table-sm fluid mt-5 ml-2 shadow-lg p-3 mb-6 bg-white rounded">
            <head>
            <tr class="table-primary">
                <th scope="col">Code Employé</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">CIN</th>
                <th scope="col">NbPhone</th>
                <th scope="col" >Date d'Embauche</th>
                <th scope="col" >Département</th>
                <th scope="col">Ville</th>
                <th scope="col">Salaire </th>
               
                <th scope="col" >operation</th>
            </tr>
</head>

        <body>
            @foreach($students as $student)
            <tr>
                <td>{{$student->CodeEmploye}}</td>
                <td>{{$student->Nom}}</td>
                <td>{{$student->Prenom}}</td>
                <td>{{$student->CIN}}</td>
                <td>0{{$student->NbPhone}}</td>
                <td>{{$student->DateEmbauche}}</td>
                <td>{{$student->Departement}}</td>
                <td>{{$student->Ville}}</td>
                <td>{{$student->Salaire}} DH</td>
                <td>



            
                    
        
            



               
<form action="{{url('student/'.$student->id)}}" method="post">



<button  type="button" class="show-employee btn btn-primary"  data-employee-id="{{ $student->id }}"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg></button>

<!-- <button class="show-employee btn btn-primary" data-employee-id="{{ $student->id }}">SHOW</button> -->



<!-- @@@@@@@ -->
               <a href="{{url('student/'.$student->id.'/edit')}}" onclick="print"><button  class="btn btn-info" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
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
<script>
  $(document).on('click', '.show-employee', function() {
    var employeeId = $(this).data('employee-id');
    $.ajax({
        url: '/student/' + employeeId,
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // créer une boîte de dialogue Bootstrap avec les informations de l'employé
            var dialog = '<div class="modal fade">';
            dialog += '<div class="modal-dialog ">';
            dialog += '<div class="modal-content">';
            dialog += '<div class="modal-header">';
            dialog += '<h2 class="border-bottom d-inline-block border-success  ">Renseignement Personnel :</h2>';
            dialog += '  <a href="{{url('student/')}}" onclick="print"><button type="button" class="close" data-dismiss="modal">&times;</button></a>';

            dialog += '</div>';


            dialog += '<div class="modal-body">';
            dialog += '<button type="button" class="btn btn-primary" style="float:right;" onclick="printDialog()">Imprimer</button>';

// @@@@@@@@@@@@@@@@@@@@@@@


dialog += '<div class="form-inline"><img class="rounded-circle" src="/imagesEmp/' + data.photo + '" width="150px" height="150px"><div class="ml-5"></div></div>';

dialog +='<div class="form-inline mt-4 "> <h4 class="text-primary">Code Employé:&ensp; </h4> <h4 >'+ data.CodeEmploye +'</h4></div><br>';
dialog +='<div class="form-inline mt-4 "> <h4 class="text-primary">CIN Employé:&ensp; </h4> <h4 >'+ data.CIN +'</h4></div><br>';

dialog +='<div class="form-inline mt-4 "> <h4 class="text-primary">Prenom Employé:&ensp; </h4> <h4 >'+ data.Prenom +'</h4></div><br>';

dialog +='<div class="form-inline mt-4 "> <h4 class="text-primary">Nom Employé:&ensp; </h4> <h4 >'+ data.Nom +'</h4></div><br>';
dialog +='<div class="form-inline mt-4 "> <h4 class="text-primary">Ville Employé:&ensp; </h4> <h4 >'+ data.Ville +'</h4></div><br>';
dialog +='<div class="form-inline mt-4 "> <h4 class="text-primary">Département:&ensp; </h4> <h4 >'+ data.Departement +'</h4></div><br>';
dialog +='<div class="form-inline mt-4 "> <h4 class="text-primary">Salaire (DH):&ensp; </h4> <h4 >'+ data.Salaire +'</h4></div><br>';

dialog +='<div class="form-inline mt-4 "> <h4 class="text-primary">Sexe:&ensp; </h4> <h4 >'+ data.Sexe +'</h4></div><br>';

dialog +='<div class="form-inline mt-4 "> <h4 class="text-primary">Date de Naissance::&ensp; </h4> <h4 >'+ data.DateNaissance +'</h4></div><br>';

  
dialog +='<div class="form-inline mt-4 "> <h4 class="text-primary">Années Expérience ::&ensp; </h4> <h4 >'+ data.NbExperience +'</h4></div><br>';
dialog +='<div class="form-inline mt-4 "> <h4 class="text-primary">Date de Depart  ::&ensp; </h4> <h4 >'+ data.DateDepart +'</h4></div><br>';



    
    
        
    
    
      
    

            dialog += '</div>';


            dialog += '<div class="modal-footer">';
              
            dialog += '<button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>';

            dialog += '</div>';

            dialog += '</div>';
            dialog += '</div>';
            dialog += '</div>';
            // Supprimer toutes les boîtes de dialogue précédentes
            $('.modal').remove();
            $('body').append(dialog);
            $('.modal').modal('show');
        },
        error: function() {
            alert('Une erreur s\'est produite. Veuillez réessayer plus tard.');
        }
    });
});
function printDialog() {
  var printContents = $('.modal-body').html();
  var originalContents = $('body').html();
  $('body').html(printContents);
  window.print();
  $('body').html(originalContents);
}

</script>




@endsection
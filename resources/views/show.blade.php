<!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <title>Document</title>
 </head>
 
 <body>


 
 
 <section class="border  border-primary mb-2 mt-2  shadow-lg" style=" margin-left:20%;margin-right:1%;">
 <button id="print_Button" class="btn btn-warning btn-lg float-right mr-3 mt-3"   onclick="printDiv()"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
  <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
  <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
</svg></button>

 <form  id="print" action="{{('/show/'.$student->id) }}"  enctype='multipart/form-data' style="margin-left:10%;margin-top:1%;" >
           @csrf

<div >

 
 
          <div class="form-inline "> 
    
                         <div class="ml-5">
                              <h4 class="border-bottom  border-success  d-inline-block   ">Contact :</h4>
                             

 
                         </div>
          </div>
 
           <hr class=" border border-warning    mr-2"> 

           <h4 class="border-bottom d-inline-block border-success  ">Renseignement Personnel :</h4>
    
<div class="form-inline mt-4 ">
<br>



</div><br>



<div class="form-inline ">
<h5 class="text-primary">Date d'Embauche :&ensp; </h5>
<h5> {{$student->Nom}}&emsp;&emsp;&emsp;&emsp;&ensp;</h5>




    </form>


    </section>

    <script type="text/javascript"> 
    function printDiv(){
      
      var printContent=document.getElementById('print').innerHTML;
      var originelContent=document.body.innerHTML;
      document.body.innerHTML= printContent;
      window.print();
      document.body.innerHTML=originelContent;
      location.reload();

    }

    
    </script>
 
  
 
     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
 </body>
 </html>
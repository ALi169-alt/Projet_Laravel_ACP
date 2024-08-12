<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assetts/css/AdminOrEtudiant.css">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <title>Document</title>
</head>
<body>

<div class="overlay">


<div class="div">

                            


                            
<a href="{{ url('/loginEtu') }}">

    <article class="etudiant" >
        <div style="text-align: center;"><p class="p">Espace Employé</p></div>
        
        <div style="text-align: center;"><img src="assets/img/employes.jpg" alt="" width="80" alt="" ></div>
</article>
</a>

</div>
                    </div>

</div>


<div class="masthead">
            <div class="masthead-bg"> 
                
                <h3 class="mb-3"  style="margin-top:20px;margin-left:50px;">System de Gestion des Employes</h3>
                <p class="mb-5" style="margin-left:20px;">
                                SGE est une application web qui vous permet de gérer les employés de l'entreprise de manière simple et facile.
                            </p>
        
        
        </div> <!-- color blue -->
            <div class="container h-100">
                <div class="row h-100">
                    <div class="col-12 my-auto">
                   
                        <div class="masthead-content text-white py-5 py-md-0">
                           
                                                
                        <div >
    
     
    
    <a href="{{ url('loginAdmin') }}">

        <article class="admin"> 
            <div style="text-align: center;"><p class="p">Espace Admin</p></div>
            

            <div style="text-align: center;"><img   src="assetts/Images/Admin.svg" alt="" ></div>

           </article>
    </a>
    
      

</div>
                        
                    </div>
                </div>
            </div>
        </div>
        
</body>
</html>
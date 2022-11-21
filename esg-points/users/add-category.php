<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');

if(isset($_POST['submit']))
  {
     //$mobilenumber=$_POST['mobilenumber'];
     $email=$_POST['email'];
     //$uid=$_SESSION['vpmsuid'];
     $ret=mysqli_query($con,"select MobileNumber AS Total from tblregusers where Email = '{$email}'");
     //ID='$uid'");
     $total=mysqli_fetch_assoc($ret);
     if($total){
        
        $mobilenumber=$total['Total']+$_POST['mobilenumber'];
        $query=mysqli_query($con, "update tblregusers set MobileNumber = '{$mobilenumber}' where Email = '{$email}'");
    //"insert into  tblregusers(MobileNumber) value('$mobilenumber')");
        if ($query) {
        echo "<script>alert('Cadastro realizado com sucesso!');</script>";
        echo "<script>window.location.href='dashboard.php'</script>";
        }
        else
        {
        
        echo "<script>alert('Something Went Wrong. Please try again');</script>";
        }

     } else {
        echo "<script>alert('Esse E-mail não está cadastrado no sistema.');</script>";
     }
  
}
  ?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resumo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    
    <style>
        .btn {
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
        }
        .form-text {
            margin-left: .35rem;
        }
    </style>
</head>
<body>




        <div class="container">
            <div class="animated fadeIn">


                <div class="row">

              

                    <div class="col-sm-6 col-12 mx-auto">
                        <div class="card mt-3 mb-3">
                            <div class="card-header">
                                <p><strong>Cadastre Pontos</strong></p>
                            </div>
                            <div class="card-body card-block">
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    
                                    <div class="row form-group mb-3">
                                        <div class="col-12">
                                            <input type="text" id="email" name="email" class="form-control" placeholder="E-mail do cliente" required="true">
                                            <div class="form-text">Ex. client@gmail.com</div>
                                        </div>
                                    </div>
                                    <div class="row form-group mb-3">
                                        <div class="col-12">
                                            <input type="number" id="mobilenumber" name="mobilenumber" class="form-control" placeholder="Quantidade" min="1" step="1" required="true">
                                            <div class="form-text">Ex. 123</div>
                                        </div>
                                    </div>
                                 
                                    
                                    
                                   <p class="text-center">
                                   <button type="submit" class="btn btn-primary " name="submit" >Enviar</button>
                                    </p>
                                </form>
                            </div>
                            
                        </div>
                        
                    </div>
           

            </div>


        </div>
        <?php include_once('../includes/sidebar-provider.php');?>
    </div><!-- .content -->



<!-- Right Panel -->

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="assets/js/main.js"></script>


</body>
</html>

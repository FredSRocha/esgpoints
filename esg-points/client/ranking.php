<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
?>


<!doctype html>

 <html class="no-js" lang="">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resumo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

   

    
    

    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    
    <link rel="stylesheet" href="../assets/css/style.css">


   <style>

    </style>
    <style>
        .btn {
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
        }
        img {
            max-width: 100%;
            margin: auto;
            height: auto;
            display: flex;
        }
    </style>
</head>

<body>
    

        <div class="r*ow">
 

            <div class="container">
        
                
                <div class="row">
                <h1 class="text-center mt-3"><i class="pe-7s-cup"></i>ESG Points</h1>
            <p class="text-center"><i class="pe-7s-star"></i>Classificação de Contribuidores <i class="pe-7s-star"></i></p>
                    <div class="col-12 col-sm-6 mx-auto">
                        <img
                        width="300px"
                        src="https://cdn.pixabay.com/photo/2021/09/07/03/05/badge-6602793_640.png"
                        alt="ESG Points - Dream Experience When Traveling">
                        <p>Tenha uma experiência incrível através do club de vantagens "Dream Experience When Traveling". Imagine você fã assistindo um show do seu ídolo de camarote ou bem em cima do palco com ele lá no Rock In Rio! Compre as suas passagens com os nossos parceiros "Global Events" e "Amadeus". Participe!</p>
                    </div>
    </div>

                <div class="row">
                
    
    <div class="col-sm-6 col-12 mx-auto">
    <table class="table">
  <thead>
    <tr>

      <th scope="col">E-mail</th>
      <th scope="col">Pontuação</th>
    </tr>
  </thead>
  <tbody>
  <?php

$ret=mysqli_query($con,"select Email, MobileNumber from tblregusers order by MobileNumber desc");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {
  ?>
    <tr>
    <?php if($cnt <= 3){ ?>
      <td>
        <p class="text-uppercase text-muted mb-0">
            <i class="pe-7s-star"></i> <b>Dream Experience When Traveling</b> <i class="pe-7s-star"></i>
        </p>
        <?php
            $getemail=isset($_GET['email'])?$_GET['email']:'';
            if($getemail===$row['Email']) {
        ?>
        <p class="text-success">
            <em>
                <?php echo substr($row['Email'], 0, 3).'****'.substr($row['Email'], strpos($row['Email'], "@")); ?>
            </em>
        </p>
        <p>
            <small>O seu email está pseudoanonimizado aqui 👆 Conforme o Art. 13. §4º, da lei 13.709/18, Lei Geral de Proteção de Dados Pessoais. Cabe resaltar, que o sistema contará com meios para autentições seguras dos seus usuários, bem como proporcionará um ambiente controlado e seguro na versão final. Para fins de teste é melhor destacar as funcionalidades principais da proposta.</small>
        </p>
        <?php } else { ?>
        <p>
            <em>
                <?php echo substr($row['Email'], 0, 3).'****'.substr($row['Email'], strpos($row['Email'], "@")); ?>
            </em>
        </p>
        <?php } ?>
    </td>
      <td><b class="text-success"><?php echo $row['MobileNumber']; ?></b></td>
    <?php } else { ?>
        <td><?php echo substr($row['Email'], 0, 3).'****'.substr($row['Email'], strpos($row['Email'], "@")); ?></td>
        <td><?php echo $row['MobileNumber']; ?></td>
        <?php } ?>
      
    </tr>

<?php 
$cnt=$cnt+1;
}
?>

  </tbody>
</table>
    </div>
 




            </div>

        </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


</body>
</html>

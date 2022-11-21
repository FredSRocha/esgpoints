<?php
session_start();
error_reporting(0);
include('../includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $email=$_POST['email'];
    $mobilenumber=$_POST['mobilenumber'];
     
    $query=mysqli_query($con, "insert into  tblregusers(Email, MobileNumber) value('$email', '$mobilenumber')");
    if ($query) {
      echo "<script>alert('Cadastro realizado com sucesso!');</script>";
      echo "<script>window.location.href='ranking.php?email={$email}'</script>";
    } else {
     
      echo "<script>alert('Something Went Wrong. Please try again');</script>";
    }

  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resumo</title>
    
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        .btn {
            text-transform: uppercase;
            font-size: 12px;
            font-weight: 700;
        }
        .form-text {
            margin-left: .35rem;
        }
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
<div class="container">
  <div class="row">
    <h1 class="text-center mt-3">
      <i class="pe-7s-cup"></i>ESG Points
    </h1>
    <p class="text-center text-success mt-4">
      <i class="pe-7s-plane"></i>
      <small class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-success bg-success bg-opacity-10 border border-success border-opacity-10 rounded-2"> Successfully Booked the Flight</small>
      <i class="pe-7s-plane"></i>
    </p>
    <div class="col-12 col-sm-6 mx-auto">
        <img
        width="300px"
        src="https://cdn.pixabay.com/photo/2021/09/07/03/05/badge-6602793_640.png"
        alt="ESG Points - Dream Experience When Traveling">
        <p>Parabéns! Você recebeu <b><?php echo $_GET['points']; ?></b> pontos do ESG Points. Você já está fazendo parte automaticamente do sistema de classificação e a sua posição na lista possibilita oportunidades imperdíveis. Inscreva-se abaixo para participar:</p>
        <div class="container">
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
          <div class="row form-group mb-3">
              <div class="col-12">
                  <input type="text" id="email" name="email" class="form-control" placeholder="Email" required="true">
                  <input type="hidden" id="mobilenumber" name="mobilenumber" value="<?php echo $_GET['points']; ?>">
                  <div class="form-text">Ex. email@gmail.com</div>
              </div>
          </div>
          <p style="text-align: center;">
            <button type="submit" class="btn btn-primary" name="submit" >Adicionar</button>
          </p>
        </form>

      </div>
    </div>
  </div>
</div>
</body>
</html>
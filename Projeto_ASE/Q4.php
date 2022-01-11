
<?php
include_once('conexao.php');
session_start();
$vetor_resposta = $_SESSION['vetor_resposta_acumulado'];
?>

<?php
    mysqli_query($ligar,"SET NAMES 'utf8'");
    mysqli_query($ligar,'SET character_set_connection=utf8');
    mysqli_query($ligar,'SET character_set_client=utf8');
    mysqli_query($ligar,'SET character_set_results=utf8');
?>

<!DOCTYPE html>
<html lang="PT">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.9">
    <title>Wise Machines</title>
</head>

<style>
    .center {
    margin: 0;
    position: absolute;
    top: 50%;
    left:50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }
    
</style>
</style>

<body>
    <div class="center">
    <center>
    <br><br>    
    <img src="WiseMachines.gif" width="283" height="60"><br>
    <img src="dr_freud.gif" width="80" height="100">
    <b><p><font  color="black" style="font-family:open sans;font-size:150%;"
    >Dr. Freud</font><font  color="blue" style="font-family:open sans;font-size:150%;"
    >Bot</font></p></b>
    
    <form style="text-align:center;" action="Q5.php" method="post">
        <fieldset>
        <legend><b> <font  color="black" style="font-family:open sans;font-size:100%;"> &nbsp; 
        4/14 - Qual seria o seu grau frustração acumulada nos últimos 2 dias? &nbsp; </font></b></legend>
        <input type="radio" name="valor_Q4" value="7" required> <b><font  color="black" style="font-family:open sans;" >  7  </font> </b>  <br> 
        <input type="radio" name="valor_Q4" value="6" required> <b><font  color="black" style="font-family:open sans;" >  6  </font> </b>  <br>
        <input type="radio" name="valor_Q4" value="5" required> <b><font  color="black" style="font-family:open sans;" >  5  </font> </b>  <br>
        <input type="radio" name="valor_Q4" value="4" required> <b><font  color="black" style="font-family:open sans;" >  4  </font> </b>  <br>
        <input type="radio" name="valor_Q4" value="3" required> <b><font  color="black" style="font-family:open sans;" >  3  </font> </b>  <br>
        <input type="radio" name="valor_Q4" value="2" required> <b><font  color="black" style="font-family:open sans;" >  2  </font> </b>  <br>
        <input type="radio" name="valor_Q4" value="1" required> <b><font  color="black" style="font-family:open sans;" >  1  </font> </b>  <br>
        <input type="submit" value="Próximo">
        </fieldset>
    </form>
    <p> Powered by:  <img src="14_bis_logo.gif" width="32" height="26"> </p> 
    </center>

    <?php
        if(isset($_POST["valor_Q4"])) {
            $vetor_resposta[4] = $_POST["valor_Q4"];
            print_r ($vetor_resposta);
        }
        else {
            $vetor_resposta[3] = $_POST["valor_Q3"];
            $_SESSION['vetor_resposta_acumulado'] = $vetor_resposta;
            //print_r ($vetor_resposta);
        }
    ?>
    
</body>
</html>                             


   
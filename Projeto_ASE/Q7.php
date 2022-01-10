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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso</title>
</head>

<style>
    .center {
    margin: 0;
    position: absolute;
    top: 50%;
    left: 50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }
</style>
<body>
    <td>
    <div class="center">
    <center>
    <img src="WiseMachines.gif" width="283" height="60">
    <h2> <p style="font-family:open sans;"> Analizador de Saúde Emocional </p></h2>
    
    <form style="text-align:center" 
        action="http://localhost/wise_machines/analizador_de_saude_emocional/Q8.php" method="post">
    <fieldset>
        <legend> <b><p style="font-size:110%;font-family:open sans;" > 
            <font  color="black" > 7/14 - Grau da sua percepção pessoal de solidão acumulada nos últimos 3 dias.   </font> <br>
            <font  color="green"   > Isolamento - Tristeza - Abandono - Rejeição - Depressão  </font> <br>
            <font  color="black" > Grau 7 = Solidão Máxima <br> Grau 1 = Solidão Mínima </font> </p></b></legend>
        <input type="radio" name="valor_Q7" value="7" required> <b><font  color="black" style="font-family:open sans;" >  7  </font> </b> <br><br>
        <input type="radio" name="valor_Q7" value="6" required> <b><font  color="black" style="font-family:open sans;" >  6  </font> </b> <br><br>
        <input type="radio" name="valor_Q7" value="5" required> <b><font  color="black" style="font-family:open sans;" >  5  </font> </b> <br><br>
        <input type="radio" name="valor_Q7" value="4" required> <b><font  color="black" style="font-family:open sans;" >  4  </font> </b> <br><br>
        <input type="radio" name="valor_Q7" value="3" required> <b><font  color="black" style="font-family:open sans;" >  3  </font> </b> <br><br>
        <input type="radio" name="valor_Q7" value="2" required> <b><font  color="black" style="font-family:open sans;" >  2  </font> </b> <br><br>
        <input type="radio" name="valor_Q7" value="1" required> <b><font  color="black" style="font-family:open sans;" >  1  </font> </b> <br><br>
        <br>
        <input type="submit" value="Próximo">
    </fieldset>
    </form></code>

    <?php
        if(isset($_POST["valor_Q7"])) {
            $vetor_resposta[7] = $_POST["valor_Q7"];
            print_r ($vetor_resposta);
        }
        else {
            $vetor_resposta[6] = $_POST["valor_Q6"];
            $_SESSION['vetor_resposta_acumulado'] = $vetor_resposta;
            //print_r ($vetor_resposta);
        }
    ?>
    
</body>
</html>                             


   
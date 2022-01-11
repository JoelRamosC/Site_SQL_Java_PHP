<?php
    include_once('conexao.php');
    mysqli_query($ligar,"SET NAMES 'utf8'");
    mysqli_query($ligar,'SET character_set_connection=utf8');
    mysqli_query($ligar,'SET character_set_client=utf8');
    mysqli_query($ligar,'SET character_set_results=utf8');

    session_start();
    $vetor_resposta = array();
    $vetor_resposta = $_SESSION['vetor_resposta_acumulado'];
    $vetor_resposta[14] = $_POST["valor_Q14"];
    
    $query = "INSERT INTO 
                        tb_valores_analizador (id,Q1,Q2,Q3,Q4,Q5,Q6,Q7,Q8,Q9,Q10,Q11,Q12,Q13,Q14) 
                                        VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,  ?,  ?,  ?,  ?,  ?)";
    $stmt = $ligar->prepare($query);
    $stmt->bind_param('iiiiiiiiiiiiiii',$vetor_resposta[0],
                                        $vetor_resposta[1],
                                        $vetor_resposta[2],
                                        $vetor_resposta[3],
                                        $vetor_resposta[4],
                                        $vetor_resposta[5], 
                                        $vetor_resposta[6],
                                        $vetor_resposta[7],
                                        $vetor_resposta[8],
                                        $vetor_resposta[9],
                                        $vetor_resposta[10],
                                        $vetor_resposta[11],
                                        $vetor_resposta[12],
                                        $vetor_resposta[13],
                                        $vetor_resposta[14]);
    $stmt->execute();


    // $vetor_resposta[0]  = 0; #id
    // $vetor_resposta[1]  = 7; #Preocupação
    // $vetor_resposta[2]  = 7; #Ansiedade
    // $vetor_resposta[3]  = 1; #Prazer
    // $vetor_resposta[4]  = 7; #Frustração
    // $vetor_resposta[5]  = 1; #Alimentação
    // $vetor_resposta[6]  = 7; #Raiva
    // $vetor_resposta[7]  = 7; #Solidao
    // $vetor_resposta[8]  = 1; #Amor
    // $vetor_resposta[9]  = 1; #Prensecial
    // $vetor_resposta[10] = 7; #Online
    // $vetor_resposta[11] = 1; #Aproveitamento conexões
    // $vetor_resposta[12] = 1; #Qualidade pensamentos
    // $vetor_resposta[13] = 1; #Intelectual
    // $vetor_resposta[14] = 1; #Espiritual

    $chakra_1 = round((  $vetor_resposta[1]*0.99  +     $vetor_resposta[2]   *0.99  )/2  , 2)  ;  // preocupação + ansiedade 
    $chakra_2 = round((  $vetor_resposta[3]*0.99  +  (8-$vetor_resposta[4])  *0.99  )/2  , 2)  ;  // prazer+1/frustração
    $chakra_3 = round((  $vetor_resposta[5]*0.99  +  (8-$vetor_resposta[6])  *0.99  )/2  , 2)  ; // 1/raiva +alimentação
    $chakra_4 = round((  $vetor_resposta[7]*0.99  +  (8-$vetor_resposta[8])  *0.99  )/2  , 2)  ;  // solidão +1/amor
    $chakra_5 = round((  $vetor_resposta[9]*0.99  +  (8-$vetor_resposta[10]) *0.99 )/2   , 2)  ;  // presencial + 1/vida online
    $chakra_6 = round((  $vetor_resposta[11]*0.99 +     $vetor_resposta[12]  *0.99 + $vetor_resposta[13]*0.99 )/3   ,2)  ;  // aproveitamento + qualidade
    $chakra_7 = round((  $vetor_resposta[13]*0.99 +     $vetor_resposta[14]  *0.99 )/2   , 2)  ;  // intelecto + espiritualidade
     

    $nivel_consciencia = round(($chakra_5 + $chakra_6 + $chakra_7)/3);

                                               
    $sql_consulta  = mysqli_query($ligar,"SELECT  count(id), 
                                                  sum(Q1)/count(*),
                                                  sum(Q2)/count(*), 
                                                  sum(Q3)/count(*), 
                                                  sum(Q4)/count(*), 
                                                  sum(Q5)/count(*), 
                                                  sum(Q6)/count(*), 
                                                  sum(Q7)/count(*), 
                                                  sum(Q8)/count(*), 
                                                  sum(Q9)/count(*),
                                                  sum(Q10)/count(*),
                                                  sum(Q11)/count(*),
                                                  sum(Q12)/count(*),
                                                  sum(Q13)/count(*),
                                                  sum(Q14)/count(*)                                        
                                           FROM tb_valores_analizador");                                 
    $chakra_avg = mysqli_fetch_array($sql_consulta);
 
    $chakra_1_avg = round((  $chakra_avg[1]*0.99  +     $chakra_avg[2]   *0.99  )/2  , 2)  ;  // preocupação + ansiedade 
    $chakra_2_avg = round((  $chakra_avg[3]*0.99  +  (8-$chakra_avg[4])  *0.99  )/2  , 2)  ;  // prazer+1/frustração
    $chakra_3_avg = round((  $chakra_avg[5]*0.99  +  (8-$chakra_avg[6])  *0.99  )/2  , 2)  ; // 1/raiva +alimentação
    $chakra_4_avg = round((  $chakra_avg[7]*0.99  +  (8-$chakra_avg[8])  *0.99  )/2  , 2)  ;  // solidão +1/amor
    $chakra_5_avg = round((  $chakra_avg[9]*0.99  +  (8-$chakra_avg[10]) *0.99 )/2   , 2)  ;  // presencial + 1/vida online
    $chakra_6_avg = round((  $chakra_avg[11]*0.99 +     $chakra_avg[12]  *0.99 + $chakra_avg[13]*0.99  )/3   , 2)  ;  // aproveitamento + qualidade + intelectual
    $chakra_7_avg = round((  $chakra_avg[13]*0.99 +     $chakra_avg[14]  *0.99 )/2   , 2)  ;  // intelecto + espiritualidade



    $nivel_consciencia_avg = round(($chakra_5_avg + $chakra_6_avg + $chakra_7_avg)/3);

?>

<!DOCTYPE html>
<html lang="PT">

  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=0.8">
       <title>Wise Machines</title>
      <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  </head>
  
  <style>
    .center {
    margin: 0;
    position: absolute;
    top: 190%;
    left:50%;
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    }
  </style>

  <body>
    <div class="center">
    <center>

    <!-- <p> <?php  echo($chakra_1);           ?></p>
    <p> <?php  echo($chakra_2);           ?></p>
    <p> <?php  echo($chakra_3);           ?></p>
    <p> <?php  echo($chakra_4);           ?></p>
    <p> <?php  echo($chakra_5);           ?></p>
    <p> <?php  echo($chakra_6);           ?></p>
    <p> <?php  echo($chakra_7);           ?></p>
    <p> <?php  echo($nivel_consciencia);  ?></p> -->
      
    <img src="WiseMachines.gif" width="283" height="60"><br>
    <img src="dr_freud.gif" width="80" height="100">
    <b><p><font  color="black" style="font-family:open sans;font-size:150%;"
    >Dr. Freud</font><font  color="blue" style="font-family:open sans;font-size:150%;"
    >Bot</font></p></b>

    <div id="Chakra1" style="width:400px;height:250px;"></div>
    <div id="Chakra2" style="width:400px;height:250px;"></div>
    <div id="Chakra3" style="width:400px;height:250px;"></div>
    <div id="Chakra4" style="width:400px;height:250px;"></div>
    <div id="Chakra5" style="width:400px;height:250px;"></div>
    <div id="Chakra6" style="width:400px;height:250px;"></div>
    <div id="Chakra7" style="width:400px;height:250px;"></div>
    <div id="NivelConsciencia" style="width:400px;height:250px;"></div>

      <script>
        //1º Chakra 
        var chakra_1_avg = <?php echo ($chakra_1_avg);?>;
        var chakra_1 =  <?php echo ($chakra_1);?>;
        var layout = {title: "<b>Nível Estimado de Cansaço Mental</b>",
                      xaxis: {range: [0, 7.2], dtick: 7},
                      "titlefont": {"size": 20}};                             
        var xArray = [chakra_1_avg, chakra_1];
        var yArray = ["<b>Média da &nbsp;<br> População </b>  ", "<b>Você<b>  "];
        var data = [{
          x:xArray,
          y:yArray,
          type:"bar",
          orientation:"h",
          marker: {color:["gray","orange"]}
        }];
        Plotly.newPlot("Chakra1", data, layout, {staticPlot: true});

        // 2º Chakra 
        var chakra_2_avg = <?php echo ($chakra_2_avg);?>;
        var chakra_2     =  <?php echo ($chakra_2);?>;
        var layout = {title: "<b>Nível Estimado de Felicidade</b>",
                      xaxis: {range: [0, 7.2], dtick: 7},
                      "titlefont": {"size": 20}};                     
        var xArray = [chakra_2_avg, chakra_2];
        var yArray = ["<b>Média da &nbsp;<br> População </b>  ", "<b>Você<b>  "];
        var data = [{
          x:xArray,
          y:yArray,
          type:"bar",
          orientation:"h",
          marker: {color:["gray","orange"]}
        }];
        Plotly.newPlot("Chakra2", data, layout, {staticPlot: true});
        
        // 3º Chakra 
        var chakra_3_avg = <?php echo ($chakra_3_avg);?>;
        var chakra_3     =  <?php echo ($chakra_3);?>;
        var layout = {title: "<b>Nível Estimado de Saúde Corporal</b>",
                      xaxis: {range: [0, 7.2], dtick: 7},
                      "titlefont": {"size": 20}};                         
        var xArray = [chakra_3_avg, chakra_3];
        var yArray = ["<b>Média da &nbsp;<br> População </b>  ", "<b>Você<b>  "];       
        var data = [{
          x:xArray,
          y:yArray,
          type:"bar",
          orientation:"h",
          marker: {color:["gray","orange"]}
        }];
        Plotly.newPlot("Chakra3", data, layout, {staticPlot: true});

        // 4º Chakra 
        var chakra_4_avg = <?php echo ($chakra_4_avg);?>;
        var chakra_4     =  <?php echo ($chakra_4);?>;
        var layout = {title: "<b>Nível Estimado de Solidão</b>",
                      xaxis: {range: [0, 7.2], dtick: 7},
                      "titlefont": {"size": 20}};                             
        var xArray = [chakra_4_avg, chakra_4];
         var yArray = ["<b>Média da &nbsp;<br> População </b>  ", "<b>Você<b>  "];
        var data = [{
          x:xArray,
          y:yArray,
          type:"bar",
          orientation:"h",
          marker: {color:["gray","orange"]}
        }];
        Plotly.newPlot("Chakra4", data, layout, {staticPlot: true});

        // 5º Chakra 
        var chakra_5_avg = <?php echo ($chakra_5_avg);?>;
        var chakra_5     =  <?php echo ($chakra_5);?>;
        var layout = {title: "<b>Nível Estimado de Saúde Emocional</b>",
                      xaxis: {range: [0, 7.2], dtick: 7},
                      "titlefont": {"size": 20}};                            
        var xArray = [chakra_5_avg, chakra_5];
        var yArray = ["<b>Média da &nbsp;<br> População </b>  ", "<b>Você<b>  "];
        var data = [{
          x:xArray,
          y:yArray,
          type:"bar",
          orientation:"h",
          marker: {color:["gray","orange"]}
        }];
        Plotly.newPlot("Chakra5", data, layout, {staticPlot: true});

        // 6º Chakra 
        var chakra_6_avg = <?php echo ($chakra_6_avg);?>;
        var chakra_6     =  <?php echo ($chakra_6);?>;
        var layout = {title: "<b>Nível Estimado de Inteligência Racional</b>",
                      xaxis: {range: [0, 7.2], dtick: 7},
                      "titlefont": {"size": 20}};                            
        var xArray = [chakra_6_avg, chakra_6];
        var yArray = ["<b>Média da &nbsp;<br> População </b>  ", "<b>Você<b>  "];
        var data = [{
          x:xArray,
          y:yArray,
          type:"bar",
          orientation:"h",
          marker: {color:["gray","orange"]}
        }];
        Plotly.newPlot("Chakra6", data, layout, {staticPlot: true});

        // 7º Chakra 
        var chakra_7_avg = <?php echo ($chakra_7_avg);?>;
        var chakra_7     =  <?php echo ($chakra_7);?>;
        var layout = {title: "<b>Nível Estimado de Espiritualidade</b>",
                      xaxis: {range: [0, 7.2], dtick: 7},
                      "titlefont": {"size": 20}};                           
        var xArray = [chakra_7_avg, chakra_7];
        var yArray = ["<b>Média da &nbsp;<br> População </b>  ", "<b>Você<b>  "];
        var data = [{
          x:xArray,
          y:yArray,
          type:"bar",
          orientation:"h",
          marker: {color:["gray","orange"]}
        }];
        Plotly.newPlot("Chakra7", data, layout, {staticPlot: true});
        </script> 
        <p> Powered by:  <img src="14_bis_logo.gif" width="64" height="52"> </p> 
        
    </center>
  </body>
</html>

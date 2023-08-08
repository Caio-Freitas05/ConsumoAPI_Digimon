<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Consumo Digimon API</title>
</head>
<body class="bg-secondary">
    <h1 class="d-flex justify-content-center text-align-center text-white">Digite o nome de um digimon para ver suas informações</h1>
    <form action="." class="d-flex flex-row justify-content-center gap-1" method="get">
        <input type="text" class="form-control w-25" name="digimon" id="digimon" placeholder="Nome">
        <input type="submit" class="btn btn-dark" value="Enviar">
    </form>
    <div class="container mt-5 rounded" style="background-color: #000">
        <?php 
            if(isset($_GET['digimon']) && !empty($_GET['digimon']))
            {
                $digimon = $_GET['digimon'];
                $retorno = json_decode(file_get_contents("https://digimon-api.vercel.app/api/digimon/name/$digimon/"));

                foreach($retorno as $nome){
                    echo "<div class='card mx-auto bg-dark' style='width: 35rem; margin-top: 5%'>
                            <img class='card-img-top' src='$nome->img'>
                            <div class='card-body'>
                                <h5 class='card-title text-white'>Nome: $nome->name</h5>
                                <p class='card-text text-white'>Nível: $nome->level</p>
                            </div>
                          </div>";
                }

            }
            else if (!isset($_GET['digimon']) && empty($_GET['digimon']))
            {
                $retorno = json_decode(file_get_contents("https://digimon-api.vercel.app/api/digimon"));
                
                echo "<div class='row'>";

                foreach($retorno as $nome){
                        
                    echo "<div class='col'>
                                <div class='card mx-auto bg-dark' style='width: 18rem; top: 40px; margin-bottom: 40px'>
                                    <img class='card-img-top' src='$nome->img'>
                                    <div class='card-body'>
                                        <h5 class='card-title text-white'>Nome: $nome->name</h5>
                                        <p class='card-text text-white'>Nível: $nome->level</p>
                                    </div>
                                </div>
                          </div>";
                }
                
                echo "</div>";
            }
            else 
            {
                $retorno = json_decode(file_get_contents("https://digimon-api.vercel.app/api/digimon"));
                
                echo "<div class='row'>";

                foreach($retorno as $nome){
                        
                    echo "<div class='col'>
                                <div class='card mx-auto bg-dark' style='width: 18rem; top: 40px; margin-bottom: 40px'>
                                    <img class='card-img-top' src='$nome->img'>
                                    <div class='card-body'>
                                        <h5 class='card-title text-white'>Nome: $nome->name</h5>
                                        <p class='card-text text-white'>Nível: $nome->level</p>
                                    </div>
                                </div>
                          </div>";
                }
                
                echo "</div>";
            }
        ?>
    </div>
</body>
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego Cinco Dados</title>
    <style>
        header, body, #jugador1, #jugador2{
            display: flex;
            align-content: center;
            justify-content: center;
            text-align: center;
            font-family: Courier, "Lucida Console", monospace;
        }

        header, body{ flex-direction: column;}
        #jugador1, #jugador2{ 
            flex-direction: row;
            gap: 4rem;
            font-size: 2rem;
        }

        #jugador1{ color: #1F618D;}
        #jugador2{ color: #C70039;}
    </style>
</head>
<body>
    <?php 
               //Definir caras dados
               define('Cara1', "&#9856");
               define('Cara2', "&#9857");
               define('Cara3', "&#9858");
               define('Cara4', "&#9859");
               define('Cara5', "&#9860");
               define('Cara6', "&#9861");
                
        //Variables:
        $jugador1= generarTirada();
        $jugador1Emojis= transformarTiradaEmojis($jugador1);
        $resultadoJugador1= calcularResultado($jugador1);

        $jugador2= generarTirada();
        $jugador2Emojis= transformarTiradaEmojis($jugador2);
        $resultadoJugador2= calcularResultado($jugador2);
        

        //Funciones:
        function generarTirada(){
            $tirada=[];

            for($i=0; $i<6; $i++){
                $num= mt_rand(1,6);
                array_push($tirada, $num);
            }

            return $tirada;
        }

        function transformarTiradaEmojis($jugador){
            $tiradaEnEmojis=[];
            
            foreach($jugador as $numCara){
                array_push($tiradaEnEmojis, constant('Cara'.$numCara));
            }

            return $tiradaEnEmojis;
        }

        function calcularResultado($jugador){
            return  array_sum($jugador) - (max($jugador) + min($jugador));
        }

        function generarGanador($resultadoJugador1, $resultadoJugador2){
            //Elvis operator->  ? :
            echo ($resultadoJugador1 > $resultadoJugador2) ? "jugador 1" : "jugador 2";
        }
    ?>


    <header>
        <h1>Cinco Dados</h1>
        <h4>Actualice la página para mostrar una nueva tirada</h4>
        <br/><br/><br/><br/>
    </header>

    <main>
        <div id="jugador1">
            <div><p>Jugardor 1: </p></div>

            <div class="emoji">
                <p>
                    <?php
                        foreach($jugador1Emojis as $caraDado){
                            echo $caraDado;
                        }
                    ?>
                </p>
            </div>

            <div><p><?php echo $resultadoJugador1 ?> Puntos.</p></div>
        </div>


        <div id="jugador2">
            <div><p>Jugardor 2: </p></div>

            <div class="emoji">
                <p>
                    <?php
                        foreach($jugador2Emojis as $caraDado){
                            echo $caraDado;
                        }
                    ?>
                </p>
            </div>

            <div><p><?php echo $resultadoJugador2 ?> Puntos.</p></div>
        </div>


        <div>
            <br/><br/>
            <p>Resultado: </p>
            <p>Ha ganado el <?php echo generarGanador($resultadoJugador1, $resultadoJugador2) ?></p>
        </div>
    </main>
</body>
</html>
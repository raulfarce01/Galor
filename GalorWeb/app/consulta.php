
<?php
        $contFotos = 0;
        $columna = 1;
        $query = $_GET['query'];
        $page = $_GET['page'];
        //mia: 563492ad6f91700001000001221023eb1bf342928c8800aad8ddf27c
        //no va bien: 563492ad6f917000010000019b983f3b62fe43daa92e746d4553dd35
        //raul: 563492ad6f91700001000001f32ac10db82a4b458304946fa28bd05a
        $key = '563492ad6f91700001000001221023eb1bf342928c8800aad8ddf27c';
        $link =  "https://api.pexels.com/v1/search?query=".$query."&page=".$page; 

        $headers = array(
            'Authorization: ' . $key
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_URL, $link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        $img = json_decode($response, true);

        
        
        foreach ($img['photos'] as $element) {
            $myImg = $element['src']['large'];

            //echo "<script>console.log($columna)</script>";
            //echo "<script>console.log($contFoto)</script>";
            echo "<img class='clickable' src='".$myImg."' value='".$element['id']."' onclick='location.href=`foto.php?id=".$element['id']."`'>";  

            /*if($contFotos <= 5){

                echo "<div class='col$columna'>
                    '<img src='$myImg'>'
                </div>";

            }else{

                $contFotos = 0;
                ++$columna;

                echo "<div class='col$columna'>
                    <img src='$myImg'>
                </div>";

            }*/

        }
    

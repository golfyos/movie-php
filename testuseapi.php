<?php
    require './config/db_config.php';
    /*
    $id = "tt0944947";
    $url = file_get_contents("http://www.omdbapi.com/?i=$id");
    $json = json_decode($url, true); //This will convert it to an array
    $movie_title = $json['Title'];
    $movie_year = $json['Year'];

    echo $url."<br>";*/


    $myfile = fopen("id_name.txt", "r") or die("Unable to open file!");
    ini_set('max_execution_time', 300);

    $i = 1;
    while(!feof($myfile)){
        $tmp = fgets($myfile);
        $tmp = preg_split('/:/', $tmp);

        //echo $tmp[0] ."<>". $tmp[1]."<br>";

        //echo "<iframe src='https://www.youtube.com/embed/$tmp[1]' width='420' height='420' allowfullscreen frameborder='0'></iframe>";
        
        //echo $url."<br>";

        $id         = $tmp[0];
        $url        = file_get_contents("http://www.omdbapi.com/?i=$id");
        $json       = json_decode($url,true);
        $mname      = $json['Title'];
        $category   = $json['Genre'];
        $release_date = $json['Released'];
        $poster     = $json['Poster'];
        $rating     = $json['imdbRating'];
        $des        = $json['Plot'];
        $trailer    = $tmp[1];
        $cast       = $json['Actors'];

        $des = str_replace('"',"'", $des);
        $des = str_replace(";","-",$des);
        // $ser=serialize($des);    
        // $des=addslashes($ser); 
        

        $sql        = "INSERT INTO movie_detail (id,mname,release_date,category,trailer,poster,description,rating) 
                    VALUES ('$id','$mname','$release_date','$category','$trailer','$poster',".'"'.$des.'"'.",'$rating')";
        $sql2       = "INSERT INTO cast (id,caster)  VALUES ('$id',".'"'.$cast.'"'.")";
        $result     = $con->query($sql);
        $result2    = $con->query($sql2);
        
        if($result !== FALSE && $result2 !== FALSE){
            echo "Added To Database ! --> $i<br>";
        }else if($result === FALSE && $result2 !== FALSE){
           
            echo "-->$i<br>";
            echo "$id<br>";
            echo "$mname " . strlen($mname) ."<br>";
            echo "$category " . strlen($category) ."<br>";
            echo "$release_date " . strlen($release_date) ."<br>";
            echo "$poster " . strlen($poster) ."<br>";
            echo "$trailer " . strlen($trailer) ."<br>";
            echo "$des " . strlen($des) ."<br>";
            echo "$rating " . strlen($rating) ."<br>";


        }else if($result !== FALSE &&$result2 === FALSE){
            echo "-->$i<br>";
            echo "$cast " . strlen($cast) ."<br>";

        }else{
            echo "-->$i<br>";
            echo "$id<br>";
            echo "$mname " . strlen($mname) ."<br>";
            echo "$category " . strlen($category) ."<br>";
            echo "$release_date " . strlen($release_date) ."<br>";
            echo "$poster " . strlen($poster) ."<br>";
            echo "$trailer " . strlen($trailer) ."<br>";
            echo "$des " . strlen($des) ."<br>";
            echo "$rating " . strlen($rating) ."<br>";
            echo "$cast " . strlen($cast) ."<br>";

        }
        $i++;
        
    }

    fclose($myfile);

    //echo "<iframe src='http://v.traileraddict.com/118759' width='420' height='420' allowfullscreen frameborder='0'></iframe>";
    

    /*
        Tile : mname
        Genre : category
        Released : release_date
        Actors : {caster} split,
        Poster : poster
        imdbRating : rating

    */

?>
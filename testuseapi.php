<?php

    /*
    $id = "tt0944947";
    $url = file_get_contents("http://www.omdbapi.com/?i=$id");
    $json = json_decode($url, true); //This will convert it to an array
    $movie_title = $json['Title'];
    $movie_year = $json['Year'];

    echo $url."<br>";*/


    $myfile = fopen("id_movie.txt", "r") or die("Unable to open file!");
    $mm = fopen("id_name.txt", "wb") or die("Unable to open file!");
    while(!feof($myfile)){
        $tmp = fgets($myfile);
        $tmp = preg_split('/\s+/', $tmp);
        $url = file_get_contents("http://www.omdbapi.com/?i=$tmp[0]");
        
        
        //echo $url."<br>";
         $json       = json_decode($url,true);
         $title      = $json['Title'];
        // $category   = $json['Genre'];
        // $release_date = $json['Released'];
        // $poster     = $json['Poster'];
        // $rating     = $json['imdbRating'];

        
        $txt = $tmp[0].":".$title."\n";
        fwrite($mm, $txt);
        


        //echo "$title : $category : $release_date : <img src='$poster'/> : $rating <br>";
    }

    fclose($myfile);

    //echo "<iframe src='http://v.traileraddict.com/118759' width='420' height='420' allowfullscreen frameborder='0'></iframe>";
    
    /*$url = "https://api.themoviedb.org/3/movie/550?api_key=7999b24f25cedf1a08d188408a70006a&movie_id=tt118759";
    echo*/
    /*
        Tile : mname
        Genre : category
        Released : release_date
        Actors : {caster} split,
        Poster : poster
        imdbRating : rating

    */

    /*

    $sql = "INSERT INTO movie_detail (id,mname,release_date,category,trailer,poster,description,rating) 
            VALUES ('$id','$mname','$release_date','$category','$trailer','$poster','$des','$rating')";

    $sql2 = "INSERT INTO cast (id,caster)  VALUES ('$id',$caster)"

    */


    /*tt4630562
tt3874544
tt2771200
tt4287320
tt5052448
tt2015381
tt4849438
tt1790809
tt1469304
tt5013056
tt2334871
tt0451279
tt3315342
tt1648190
tt3470600
tt1219827
tt1212428
tt1446714
tt3783958
tt3748528
tt1386697
tt0078748
tt3183660
tt4465564
tt3741834
tt2345759
tt4501244
tt1564777
tt2488496
tt1431045
tt2404435
tt3498820
tt1375666
tt4972582
tt2709768
tt3521164
tt2568862
tt1679335
tt2802144
tt3922818
tt0108358
tt0120338
tt3640424
tt5311514
tt2322441
tt0109830
tt2674426
tt5155780
tt4016934
tt1800302
tt0110357
tt2948356
tt2398241
tt4302938
tt2277860
tt4116284
tt2261287
tt2294629
tt0101414
tt2096673
tt0245429
tt3416828
tt0317705
tt2245084
tt4624424
tt0780521
tt1217209
tt1985949
tt0230011
tt2293640
tt0114709
tt0119282
tt1490017
tt0120762
tt0198781
tt2267968
tt0126029
tt0097757
tt0910970
tt1323594
tt0435761
tt0892769
tt0351283
tt0275847
tt0120855
tt3748528
tt1212428
tt3385516
tt3717252
tt2660888
tt1628841
tt0499549
tt0458339
tt2975590
tt0803096
tt2592614
tt1392190
tt1734493*/
?>
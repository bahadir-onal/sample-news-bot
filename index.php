<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/html">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HABER BOTU</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<style>
body {
height:100%;
width:100%;
position:absolute;
	
}
</style>
  </head>
  <body>
  <div class="container-fluid h-100">
  		<div class="row h-100">
        		<div class="col-lg-3 border-right text-center">
                
                		<div class="row">
                        <div class="col-lg-12 bg-danger text-white"><h4>TÜM HABERLER</h4></div>
                        <div class="col-lg-12">

                            <?php

                            $veri=file_get_contents("http://bahadironal.xyz/index.php");

                            $desen='@<div class="col-lg-4 col-md-4 col-sm-4 mt-2">(.*?)</div>@si';

                            preg_match_all($desen,$veri,$linkler);
                            //print_r($linkler[1][0]);
                            $toplamsayi=count($linkler[1]);

                            for ($i=0; $i<$toplamsayi; $i++) {


                            $desen2='@<img class="card-img-top" src="(.*?)" height="200">@si';

                            preg_match_all($desen2,$linkler[1][$i],$resim);

                            echo '<img src="http://bahadironal.xyz/'.$resim[1][0].'" width="250" height"150">';
                            echo "<br>";


                            $desen3='@<a id="haberlink" href="(.*?)">(.*?)</a>@si';

                            preg_match_all($desen3,$linkler[1][$i],$linkvebaslik);

                            echo "Link Yolu : " . $linkvebaslik[1][0];
                            echo "<br>";
                            echo "Başlık Yolu : " . $linkvebaslik[2][0];
                            echo "<br>";

                            //İçerik Detayı

                            $detay=file_get_contents("http://bahadironal.xyz/".$linkvebaslik[1][0]);

                            $desen4='@id="habericerik">(.*?)</div>@si';

                            preg_match_all($desen4,$detay,$detayagiris);

                            echo "Haber İçerik : " . $detayagiris[1][0];
                            echo "<br> <hr>";

                            }
                            ?>
                        </div>
                     </div>
        		</div>
                
                <div class="col-lg-3 border-right text-center">
                
                		<div class="row">                      
                        
                        <div class="col-lg-12 bg-danger text-white"><h4>SON DAKİKALAR</h4></div>
                        
                        <div class="col-lg-12">

                            <?php
                            $son=file_get_contents("http://bahadironal.xyz/index.php");

                            $desen5='@id="soneklenenstil">(.*?)</div>@si';

                            preg_match_all($desen5,$son,$sondk);
                            //print_r($linkler[1][0]);
                            $toplamsayi=count($sondk[1]);

                            for ($i=0; $i<$toplamsayi; $i++) {


                                $desen6 = '@<a href="(.*?)">(.*?)</a>@si';

                                preg_match_all($desen6, $sondk[1][$i], $link);

                                echo "Link Yolu : " . $link[1][0];
                                echo "<br>";
                                echo "Başlık Yolu : " . $link[2][0];
                                echo "<br>";


                                //İçerik Detayı

                                $detay2 = file_get_contents("http://bahadironal.xyz/" . $link[1][0]);

                                $desen7 = '@id="habericerik">(.*?)</div>@si';

                                preg_match_all($desen7, $detay2, $detayagiris);

                                echo "Haber İçerik : " . $detayagiris[1][0];
                                echo "<br> <hr>";


                                $desen8 = '@<img class="card-img-top" src="(.*?)" height="200">@si';

                                preg_match_all($desen8, $detay2, $resim);

                                echo '<img src="http://bahadironal.xyz/'.$resim[1][0].'" width="250" height"150">';
                                echo "<br> <hr>";

                            }

                            ?>

                        </div>
                   </div>
        		</div>
                
                <div class="col-lg-3 border-right text-center">
                
                		<div class="row">                      
                        
                        <div class="col-lg-12 bg-danger text-white"><h4>SON EKLENENLER</h4></div>
                        
                        <div class="col-lg-12">

                            <?php
                            $sonek=file_get_contents("http://bahadironal.xyz/index.php");

                            $desen9='@id="yeneklenenstil">(.*?)</div>@si';

                            preg_match_all($desen9,$sonek,$sonekle);
                            //print_r($linkler[1][0]);
                            $toplamsayi=count($sonekle[1]);

                            for ($i=0; $i<$toplamsayi; $i++) {

                                $desen10 = '@<a href="(.*?)">(.*?)</a>@si';

                                preg_match_all($desen10, $sonekle[1][$i], $link);

                                echo "Link Yolu : " . $link[1][0];
                                echo "<br>";
                                echo "Başlık Yolu : " . $link[2][0];
                                echo "<br>";

                                //İçerik Detayı

                                $detay3 = file_get_contents("http://bahadironal.xyz/" . $link[1][0]);

                                $desen11 = '@id="habericerik">(.*?)</div>@si';

                                preg_match_all($desen11, $detay3, $detayagiris);

                                echo "Haber İçerik : " . $detayagiris[1][0];
                                echo "<br> <hr>";

                                $desen12 = '@<img class="card-img-top" src="(.*?)" height="200">@si';

                                preg_match_all($desen12, $detay3, $resim);

                                echo '<img src="http://bahadironal.xyz/'.$resim[1][0].'" width="250" height"150">';
                                echo "<br> <hr>";
                            }
                            ?>
                        </div>
                </div>
        </div>
                
                <div class="col-lg-3 text-center">
                
                		<div class="row">                      
                        
                        <div class="col-lg-12 bg-danger text-white"><h4>KATEGORİYE GÖRE</h4></div>
                        
                        <div class="col-lg-12">

                            <?php
                            $kategoriler=file_get_contents("http://bahadironal.xyz/index.php");

                            $desen13='@<li class="nav-item">(.*?)</li>@si';

                            preg_match_all($desen13,$kategoriler,$kategori);
                            //print_r($linkler[1][0]);
                            //$toplamsayi=count($kategori[1]);
                            ?>

                            <form action="" method="post">
                                <select name="katid" class="form-control m-2"
                                <option value="0">Seç</option>

                            <?php

                            for ($i=0; $i<$toplamsayi; $i++) {

                                $desen14 = '@<a class="nav-link" href="(.*?)">(.*?)</a>@si';

                                preg_match_all($desen14, $kategori[1][$i], $veriler);
                                $id = str_replace("index.php?katid=", "", $veriler[1][0]);

                                echo '<option value="'.$id.'">'.$veriler[2][0].'</option>';
                            }
                            ?>
                            </select>
                            <input type="submit" name="btn" class="btn btn-primary">
                            </form>

                            <?php
                            if (@$_POST['katid']!="") {

                                $son2=file_get_contents("http://bahadironal.xyz/index.php?katid=".$_POST['katid']);

                                $desen='@<div class="col-lg-4 col-md-4 col-sm-4 mt-2">(.*?)</div>@si';

                                preg_match_all($desen,$son2,$linkler);
                                //print_r($linkler[1][0]);
                                $toplamsayi=count($linkler[1]);

                                for ($i=0; $i<$toplamsayi; $i++) {


                                    $desen2='@<img class="card-img-top" src="(.*?)" height="200">@si';

                                    preg_match_all($desen2,$linkler[1][$i],$resim);

                                    echo '<img src="http://bahadironal.xyz/'.$resim[1][0].'" width="250" height"150">';
                                    echo "<br>";


                                    $desen3='@<a id="haberlink" href="(.*?)">(.*?)</a>@si';

                                    preg_match_all($desen3,$linkler[1][$i],$linkvebaslik);

                                    echo "Link Yolu : " . $linkvebaslik[1][0];
                                    echo "<br>";
                                    echo "Başlık Yolu : " . $linkvebaslik[2][0];
                                    echo "<br>";

                                    //İçerik Detayı

                                    $detay=file_get_contents("http://bahadironal.xyz/".$linkvebaslik[1][0]);

                                    $desen4='@id="habericerik">(.*?)</div>@si';

                                    preg_match_all($desen4,$detay,$detayagiris);

                                    echo "Haber İçerik : " . $detayagiris[1][0];
                                    echo "<br> <hr>";
                                }
                            }

                            ?>

                        </div>
                </div>
        </div>
  </div>
  

</div>

</body>

</html>

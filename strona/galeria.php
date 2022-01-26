<?php
   session_start();
    
    if(!isset($_SESSION['zalogowany'])){
        header('Location: index.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
    <title>Galeria</title>
    <style>
        #mid-content {
    width: 99.8%;
    height: 90%;
    float: right;
    border: 1px solid;
    font-size: 16px;
}

    </style>
</head>

<style>
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 180px;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}
</style>

<body>
    <div id="container">
        <div id="header">
            <div id="logo"><a href="glowna.php"><img src=pies.png alt="pies logo"></a></div>
            <div id="nav">
                <button id="button"><a href="faq.php">FAQ</a></button>
                <button id="button"><a href="galeria.php">Galeria</a></button>
                <button id="button"><a href="transmisja.php">Transmisja na żywo</a></button>
                <button id="button"><a href="#">Zagłosuj</a></button>
                <button id="button"><a href="harmonogram.php">Harmonogram wystaw</a></button>
                <button id="button"><a href="glowna.php">Aktualności</a></button>
            </div>
        </div>
        <div id="content">
            <div id="mid"><b></b>
                <div id="mid-header">Galeria</div>
                <div id="mid-content">

                  <div class="container">

                  <div class="mySlides">
                    <div class="numbertext">1 / 6</div>
                      <img src="wystawa-aport.jpg" style="width:46%">
                  </div>

                  <div class="mySlides">
                    <div class="numbertext">2 / 6</div>
                      <img src="wystawa-aport2.jpg" style="width:46%">
                  </div>

                  <div class="mySlides">
                    <div class="numbertext">3 / 6</div>
                      <img src="wystawa-aport3.jpg" style="width:46%">
                  </div>

                  <div class="mySlides">
                    <div class="numbertext">4 / 6</div>
                      <img src="wystawa-aport4.jpg" style="width:46%">
                  </div>

                  <div class="mySlides">
                    <div class="numbertext">5 / 6</div>
                      <img src="wystawa-aport5.jpg" style="width:46%">
                  </div>

                  <div class="mySlides">
                    <div class="numbertext">6 / 6</div>
                      <img src="wystawa-aport6.jpg" style="width:46%">
                  </div>

                  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                  <a class="next" onclick="plusSlides(1)">&#10095;</a>

                  <div class="caption-container">
                    <p id="caption"></p>
                  </div>

                  <div class="row">
                    <div class="column">
                      <img class="demo cursor" src="wystawa-aport.jpg" style="width:100%" onclick="currentSlide(1)" alt="Prezentacja psa na wystawie 2021">
                    </div>
                    <div class="column">
                      <img class="demo cursor" src="wystawa-aport2.jpg" style="width:100%" onclick="currentSlide(2)" alt="Finaliści 2021">
                    </div>
                    <div class="column">
                      <img class="demo cursor" src="wystawa-aport3.jpg" style="width:100%" onclick="currentSlide(3)" alt="Wystawa 2020">
                    </div>
                    <div class="column">
                      <img class="demo cursor" src="wystawa-aport4.jpg" style="width:100%" onclick="currentSlide(4)" alt="Psy pasterskie 2021">
                    </div>
                    <div class="column">
                      <img class="demo cursor" src="wystawa-aport5.jpg" style="width:100%" onclick="currentSlide(5)" alt="Wystawa 2021">
                    </div>
                    <div class="column">
                      <img class="demo cursor" src="wystawa-aport6.jpg" style="width:100%" onclick="currentSlide(6)" alt="Prezentacja psa na wystawie 2020">
                    </div>
                  </div>
                </div>

 </div>
            </div>
            <div id="right-bar">
                <div id="right-bar-header">
                    <?php
                        echo "Witaj &nbsp;".$_SESSION['user']."!";
                    ?>
                </div>
                <div id="right-bar-content1"><button id="button1"><a href="wyloguj.php">Wyloguj się</a></button></div>
                <div id="right-bar-content2">
                    <?php
                        switch($_SESSION['rola']){
                            case 1:
                                    echo "Rola: Użytkownik";
                            break;
                                
                            case 2:
                                    echo "Rola: Trener";
                            break;
                                
                            case 3:
                                    echo "Rola: Organizator";
                            break;
                            
                            case 4:
                                    echo '<font color="red">Rola: Operator</font>';
                            break;
                        }
                    ?>
                </div>
                <div id="right-bar-content3">
                    <?php
                        switch($_SESSION['rola']){
                            case 1:
                                
                            break;
                                
                            case 2:
                                    echo "Panel trenera: <br>";
                                    echo '<a href="szkolenie_org.php" class="panel-item">Organizowanie szkolenia</a><br>';
                                    echo '<a href="#" class="panel-item">Zarzadzaj szkoleniem</a><br>';
                            break;
                                
                            case 3:
                                    echo "Panel organizatora: <br>";
                                    echo '<a href="wystawa_org.php" class="panel-item">Organizowanie wystawy</a><br>';
                                    echo '<a href="wystawa_zarzadzaj.php" class="panel-item">Zarzadzaj wystawami</a><br>';
                                    echo '<a href="wstaw_wpis.php" class="panel-item">Wstawianie-Aktualności</a><br>';
                                    echo '<a href="modyfikuj_wpis.php" class="panel-item">Zarzadzaj-Aktualności</a><br>';
                                
                            break;
                            
                            case 4:
                                    echo 'Panel operatora: <br>';
                                    echo '<a href="zgloszenia_crud.php" class="panel-item">Zgłoszenia</a><br>';
                                    echo '<a href="konta_crud.php" class="panel-item">Zarządzaj kontami</a><br>';
                            break;
                        }
                    ?>

                </div>
            </div>
        </div>
        <div id="footer"></div>
    </div>
    <script>
    var slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("demo");
      var captionText = document.getElementById("caption");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      captionText.innerHTML = dots[slideIndex-1].alt;
    }
     </script> 
</body>

</html>
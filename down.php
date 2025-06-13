<?php
$link = new PDO("mysql:dbname=web;host=localhost","root","");
$ex = /*$link->query*/("select * from postconnect order by position");
$result = $link->query($ex);
$i = 0;
while($row=$result->fetch()){
   $j = 0;
   $arr[$i][$j] = $row['position'];
   ++$j;

   $arr[$i][$j] = $row['簡易介紹'];
   ++$j;

   $arr[$i][$j] = $row['圖片'];
   ++$j;

   $arr[$i][$j] = $row['連結'];
   ++$j;

   $arr[$i][$j] = $row['景點名稱'];

   ++$i;
   }
?>

<?php
echo '
<!DOCTYPE html>
<!--貼文串頁面：由王予芙 B094020005 製作-->
<html>
<head>
    <link href="middlestyle1.css" rel="stylesheet">
    <title>WE SEE</title>    
</head>

<body>
    <!--font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Raleway:wght@200&display=swap" rel="stylesheet">
    
    
    <header id="header">
        <h1>We see</h1>
        <!--點擊分別跳回 主頁面最上方、主頁面ABOUT US、地圖區域-->
        <nav>
            <ul class="g-navi">
            <li><a href="TravalBlog.html">HOME</a></li>
            <li><a href="ABOUT US.html">ABOUT</a></li>
            <li><a href="#map">MAP</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!--最上方大圖-->
        <img class="hh1" src="四草1.png">

        <!--地圖，點擊分別跳到不同區域的貼文-->
        <section id="map">
            <h2>LOOKING FOR SOMEWHERE?</h2>

            <img src= "taiwan.png">
            <hr style="margin: 1% 10%;">
            
            <div class= "flex_container">
                <!--北-->
                <div class= "place">
                    <a href= "#north">
                        <div>
                            <img src= "n-taiwan.png">
                        </div>
                        <p>North</p> 
                    </a>        
                </div>
                <!--中-->
                <div class= "place">
                    <a href= "#middle">
                        <div>
                            <img src= "m-taiwan.png">
                        </div>
                        <p>middle</p>
                    </a>
                </div>
                <!--南-->
                <div class= "place">
                    <a href= "#south">
                        <div>
                            <img src= "s-taiwan.png">
                        </div>  
                        <p>South</p>
                    </a>
                </div>
                <!--東-->
                <div class= "place">
                    <a href= "#east">
                        <div>
                            <img src= "e-taiwan.png">
                        </div>
                        <p>East</p>
                    </a>
                </div>
            </div>
        </section>

        <!--貼文部分-->

        <!--北台灣-->
        <section id= "north" class="a_block">
            <h1>North Taiwan</h1>
            <hr>
        </section>
        
        <!--中台灣-->
        <section id= "middle" class="a_block">
            <h1>Middle Taiwan</h1>
            <hr>
            <!--貼文-->
        </section>

        <!--南台灣-->
        <section id= "south" class="a_block">
            <h1>South Taiwan</h1>
            <hr>
        </section>

        <!--東台灣-->
        <section id= "east" class="a_block">
            <h1>East Taiwan</h1>
            <hr>
        </section>

        <h2 class="P">LAST PAGE</h2>
    </main>
</body>
<!--頁尾-->
<footer>
    <p>designed by @王予芙/ support by@NING CHIEN</p>
    <a href="#top" id="back_to_top">
        <!--按下去會回到最上方的小箭頭-->
        <img src= "upload.png">
    </a>
</footer>
</html>
';
?>

<?php

$arr = json_encode($arr);

?>

<script>
            var arr = <?php echo $arr?>;
            let cou = <?=$i?>;
            //console.log(cou);
            let a = 0;
            let i = 0;
            let i1 = 0;
            let j1 = 0;
            document.addEventListener("DOMContentLoaded", () => {
                let options = {
                root: null,
                rootMargins: "0px",
                threshold: 0.5
                };
                const observer = new IntersectionObserver(handleIntersect, options);
                observer.observe(document.querySelector("footer"));                  
            });
            for(a=0;a<5;a++){
                getData();
            }
            function handleIntersect(entries) {
              if (entries[0].isIntersecting&&i<cou) {
                getData();
              }
            }
            
            function getData() {
                    var position = arr[i1][0];
                    if(position == 'A')
                        var div = document.getElementById("north");//插入北
                    else if(position == 'B')
                        var div = document.getElementById("middle");//插入中
                    else if(position == 'C')
                        var div = document.getElementById("south");//插入南
                    else if(position == 'D')
                        var div = document.getElementById("east");//插入東
                    // 建立一個 DocumentFragment，可以把它看作一個「虛擬的容器」
                    var fragment = document.createDocumentFragment();
                    let div1 = document.createElement("div");
                    div1.className = "imageBox";
                    let h3 = document.createElement("h3");
                    h3.className = "j1";
                    h3.textContent = arr[i1][1];
                    div1.appendChild(h3);
                    let tem = arr[i1][2];
                    let img = document.createElement("img");
                    img.src = ''+tem+'';
                    img.className = "one";
                    div1.appendChild(img);
                    let div2 = document.createElement("div");
                    div2.className = "textBox";
                    let url = arr[i1][3];
                    let a = document.createElement("a");
                    a.href = ''+url+'';
                    let name = arr[i1][4];
                    let h1_1 = document.createElement("h1");
                    h1_1.textContent = ''+name+'';
                    a.appendChild(h1_1);
                    div2.appendChild(a);
                    div1.appendChild(div2);
                    fragment.appendChild(div1);
                    div.appendChild(fragment);
                    i++;
                    i1++;
            }
      
</script>

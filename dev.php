<!DOCTYPE html>
<link href="https://fonts.googleapis.com/css?family=Changa|Maitree|Offside&display=swap" rel="stylesheet">
<?php
 $domOBJ = new DOMDocument();
 $domOBJ->load("https://www.thecrazyprogrammer.com/feed");//XML page URL
 
 $content = $domOBJ->getElementsByTagName("item");

 $domOBJ2 = new DOMDocument();
 $domOBJ2->load("https://www.philstar.com/rss/technology");//XML page URL
 
 $content2 = $domOBJ2->getElementsByTagName("item");
 



?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <title>Document</title>
</head>
<body>
    <!--nav bar-->
    <nav>
        <div class="parent black row center">
            <div class="content stretch space-between row">
                <div class="row pull-left y-center">
                        <div class="title-2-accent slate-gray-4 row x-center link"><a href="index.php">ThePortal</a></div>
                        <div class="line"></div>
                    <div class="menu-items row x-center">
                        <div class="title-2-data menu-items col slate-gray-4"><a href="dev.php">TECHNOLOGY</a></div> &nbsp;&nbsp;
                        <div class="title-2-data menu-items col slate-gray-4"><a href="tech.php">DEVELOPMENT</a></div>&nbsp;&nbsp;
                        <div class="title-2-data menu-items col slate-gray-4"><a href="tutorial.php">TUTORIALS</a></div>
                    </div>
                </div> 
                <div class="row pull-right y-center">
                    <div class="right search-ctr row">
                        <input type="text" placeholder="Search here..." class="search dark"></input>
                        <div class="search-icon row x-center">􀊫</div>
                    </div>
                    <div class="right row x-center title-2-data btn color title">CONTACT US</div>
                </div>
            </div>
        </div>
    </nav>
    <!--main content-->
    <content>
    <!--hero img-->
        <div id="hero1">
            <div class="hero-header1">
                Technology<br>News.
                <p>Check out the latest news on technology.</p> 
            </div>
        </div>
        <div class="wrap1">
            <div class="content1">
            <div id="empty"></div>
            <div id="empty"></div>

            <?php

                            $cnt=0;
                            foreach ($content2 as $data) {
                                if($cnt == 15 ) {
                                break;
                                }    
                                $itemRSS = array ( 
                                    $title = $data->getElementsByTagName("title")->item(0)->nodeValue,
                                    $link= $data->getElementsByTagName("link")->item(0)->nodeValue,
                                    $desc= $data->getElementsByTagName("description")->item(0)->nodeValue,
                                    $author= $data->getElementsByTagName("author")->item(0)->nodeValue,
                                    $meta= $data->getElementsByTagName("pubDate")->item(0)->nodeValue,

                                    );
                                    $cnt++;
                            ?>    

                            <div id="newsbox1">
                            <h3><a href="<?php echo $link;?>"><?php echo $title;?></a></h3>
                                        <p><?php echo $desc;?><br><br></p>
                                        <i><?php echo $author." - ".$meta;?></i>

                            </div>
                            <div id="empty"></div>

                            <?php 
                            } ?>
            </div>
        </div>


    <!--articles-->

    <!--end of content div-->    
                      
    </content>
    <div id="empty"></div>
    <footer>
        <div class="footer black" >
            ©2020 ThePortal
        </div>
    </footer>
</body>
</html>
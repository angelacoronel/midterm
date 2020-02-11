<!DOCTYPE html>
<?php
 $domOBJ = new DOMDocument();
 $domOBJ->load("https://www.thecrazyprogrammer.com/feed");//XML page URL
 
 $content = $domOBJ->getElementsByTagName("item");

 $domOBJ2 = new DOMDocument();
 $domOBJ2->load("https://www.philstar.com/rss/technology");//XML page URL
 
 $content2 = $domOBJ2->getElementsByTagName("item");

 $domOBJ3 = new DOMDocument();
 $domOBJ3->load("https://sdtimes.com/feed/");//XML page URL
 
 $content3 = $domOBJ3->getElementsByTagName("item");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Changa|Maitree|Offside&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nav.css">
    <title>ThePortal</title>
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
        <div id="hero">
            <div class="hero-header">
                Your gateway to <br>
                Tech-knowledge-y.
                <!--credits to ledesma-->
                <p></p>
                <p>A portal that connects you to the latest news on <br> technology, development, etc.</p>
            </div>
        </div>
        <div class="wrap">
            <div id="greeting-box-wrapper">
                <div id="greeting-box">
                        <h1 class="title greeting-text"><?php
                            date_default_timezone_set("Asia/Hong_Kong"); 
                            $time = date("H");
                            $timezone = date("e");

                            if ($time < "12") {
                                echo "Good Morning!";
                            } else
                            if ($time >= "12" && $time < "17") {
                                echo "Good Afternoon!";
                            } else
                            if ($time >= "17") {
                                echo "Good Evening!";
                            }
                        ?></h1>
                        
                        <h3 class="body">Quote of the day:</h3>
                            <?php
                            $domOBJ1 = new DOMDocument();
                            $domOBJ1->load("https://www.brainyquote.com/link/quotebr.rss");//XML page URL

                            $content1 = $domOBJ1->getElementsByTagName("item");
                            $cnt=0;
                            foreach ($content1 as $data) {
                                if($cnt == 1) {
                                break;
                                }    
                                $itemRSS = array ( 
                                    $title = $data->getElementsByTagName("title")->item(0)->nodeValue,
                                    $desc= $data->getElementsByTagName("description")->item(0)->nodeValue
                                    );
                                    $cnt++;
                        ?>  

                        <i class="body"><?php echo $desc;?></i>
                        <i class="body"><?php echo "-".$title;?></i>
        
                                <?php 
                                } ?>
                </div>
                </div><br><br>
            <div id="content-wrap">
                <div id="case">
                    <div id="content">
                        <div id="tag">
                        <H2 class="header header-size">Technology</H2>
                        </div>
                        <div id="box">
                        <?php
                            $cnt=0;
                            foreach ($content2 as $data) {
                                if($cnt == 3 ) {
                                break;
                                }    
                                $itemRSS = array ( 
                                    $title = $data->getElementsByTagName("title")->item(0)->nodeValue,
                                    $link= $data->getElementsByTagName("link")->item(0)->nodeValue,
                                    $desc= $data->getElementsByTagName("description")->item(0)->nodeValue,
                                    $author= $data->getElementsByTagName("author")->item(0)->nodeValue,
                                    $meta= $data->getElementsByTagName("pubDate")->item(0)->nodeValue
                                    );
                                    $cnt++;
                            ?>    

                            <div id="newsbox">
                            <h3><a href="<?php echo $link;?>"><?php echo $title;?></a></h3>
                                        <p><?php echo $desc;?><br><br></p>
                                        <i><?php echo $author." - ".$meta;?></i>
                            </div>
                            <div id="empty"></div>

                            <?php 
                            } ?>
                            <a href="dev.php">View More</a>
                        </div>
                    </div>
                    <div id="content">
                        <div id="tag">
                        <H2 class="header header-size">Tutorials</H2>
                        </div>
                        <div id="box">
                        <?php
                            $cnt=0;
                            foreach ($content as $data) {
                                if($cnt == 2 ) {
                                break;
                                }    
                                $itemRSS = array ( 
                                    $title = $data->getElementsByTagName("title")->item(0)->nodeValue,
                                    $link= $data->getElementsByTagName("link")->item(0)->nodeValue,
                                    $desc= $data->getElementsByTagName("description")->item(0)->nodeValue,
                                    $author= $data->getElementsByTagName("creator")->item(0)->nodeValue,
                                    $meta= $data->getElementsByTagName("pubDate")->item(0)->nodeValue
                                    );
                                    $cnt++;
                            ?>    

                            <div id="newsbox">
                            <h3><a href="<?php echo $link;?>"><?php echo $title;?></a></h3>
                                        <p><?php echo $desc;?></p>
                                        <i><?php echo $author." - ".$meta;?></i>
                            </div>
                            <div id="empty"></div>

                            <?php 
                            } ?>
                            <a href="tutorial.php">View More</a>
                        </div>
                    </div>
                </div>
                
            </div>
            <!--dev't-->  
            <div id="dev-wrap">
            <div id="case-dev">
            <div id="content-dev">
                        <div id="tag">
                        <H2 class="header header-size">Development</H2>
                        </div>
                        <div id="box-dev">
                        <?php
                            $cnt=0;
                            foreach ($content3 as $data) {
                                if($cnt == 3 ) {
                                break;
                                }    
                                $itemRSS = array ( 
                                    $title = $data->getElementsByTagName("title")->item(0)->nodeValue,
                                    $link= $data->getElementsByTagName("link")->item(0)->nodeValue,
                                    $desc= $data->getElementsByTagName("description")->item(0)->nodeValue,
                                    $author= $data->getElementsByTagName("creator")->item(0)->nodeValue,
                                    $meta= $data->getElementsByTagName("pubDate")->item(0)->nodeValue
                                    );
                                    $cnt++;
                            ?>    

                            <div id="newsbox1">
                            <h3><a href="<?php echo $link;?>"><?php echo $title;?></a></h3>
                                        <p><?php echo $desc;?></p>
                                        <i><?php echo $author." - ".$meta;?></i>
                            </div>
                            <div id="empty"></div>

                            <?php 
                            } ?>
                            <a href="tech.php">View More</a>
                        </div>
            </div>
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

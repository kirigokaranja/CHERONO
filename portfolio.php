<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Stephanie | Portfolio</title>
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <link rel='stylesheet' id='makeup-bootstrap-css'  href='CSS/bootstrap.min.css' type='text/css' media='all' />
    <link rel='stylesheet' id='makeup-animations-css'  href='CSS/animation.css' type='text/css' media='all' />
    <link rel='stylesheet' id='makeup-main-css'  href='CSS/main.css' type='text/css' media='all' />
    <link rel="stylesheet" href="CSS/navbar.css" type="text/css">

</head>
<body class="archive tax-fw-portfolio-category term-default term-3 masthead-fixed archive-list-view">
<nav class="homenavbar">
    <a href="index.php" style="float: left; padding-top: 0; margin-left: 140px;text-decoration: none"><img src="logo.png"></a>
    <?php
    session_start();
    include ("DBConnect.php");
    if(isset($_SESSION['email'])){
        $id = $_SESSION['email'];
        ?>
        <a href="logout.php"><button class="loginBtn">Logout</button></a>
        <a href="profile.php" style="text-decoration:none">Profile</a>
        <a href="book.php" style="text-decoration:none" >Book</a>
        <a href="contact.php" style="text-decoration:none">contact</a>
        <a href="portfolio.php" style="text-decoration:none" class="active">portfolio</a>
        <a  href="index.php" style="text-decoration:none">Home</a>
        <?php
    }else{
        ?>
        <a href="login.php"><button class="loginBtn">Login</button></a>
        <a href="contact.php" style="text-decoration:none">contact</a>
        <a href="portfolio.php" style="text-decoration:none" class="active">portfolio</a>
        <a  href="index.php" style="text-decoration:none">Home</a>
    <?php } ?>
</nav>
<div id="canvas" class="">
    <div id="box_wrapper" class="">
        <section class="ls ms page_content section_padding_top_75 section_padding_bottom_75">
            <div class="container">
                <div class="row">
                    <div id="content" class="col-sm-12">
                        <div class="filters isotope_filters-5b5478714580a darklinks text-center">
                            <a href="#" data-filter="*" class="selected">All</a>
                            <?php
                            $status = "active";
                            $sql = "SELECT * FROM package where status = '$status'";
                            $result = $db->query($sql) or trigger_error($db->error."[$sql]");
                            while($row = mysqli_fetch_array($result)){
                                $name = $row['PackageName'];
                                $nme = explode(" " , $name);
                            ?>
                            <a href="#" data-filter=".<?php echo $nme[0];?>"><?php echo $nme[0];?></a>
                                <?php
                            }
                            ?>
                        </div><!-- eof isotope_filters -->
                        <div class="columns_padding_15">
                            <div class="isotope_container isotope row masonry-layout columns_margin_bottom_20" data-filters=".isotope_filters-5b5478714580a">
                                <?php
                                include 'DBConnect.php';
                                global $db;
                                $file = "IMAGES/PORTFOLIO/";
                                $sql = "SELECT * FROM portfolio";
                                $result = $db->query($sql) or trigger_error($db->error."[$sql]");
                                while($row = mysqli_fetch_array($result)){

                                $img = $row['image'];
                                $category = $row['category'];
                                $details = $row['details'];
                                $ctg = explode(" " , $category);
                                $image = $file . $row['image'];

                                ?>
                                <div class="isotope-item item-layout-item-regular col-lg-4 col-md-4 col-sm-6 col-xs-12 <?php echo $ctg[0];?> ">
                                    <div class="vertical-item gallery-item content-absolute text-center ds">
                                        <div class="item-media">
                                            <div class="item-media-wrap">
                                                <div class="item-media entry-thumbnail post-thumbnail">
                                                    <img width="1170" height="780" src="<?php echo $image; ?>" class="attachment- size- wp-post-image" alt=""
                                                         srcset="<?php echo $image; ?> 1170w, <?php echo $image; ?> 300w,
                                                          <?php echo $image; ?> 768w, <?php echo $image; ?> 1024w,
                                                           <?php echo $image; ?> 775w"
                                                          sizes="(max-width: 1170px) 100vw, 1170px" />      </div> <!-- .item-media -->
                                            </div> <!-- .item-media-wrap -->

                                            <div class="media-links">
                                                <div class="links-wrap">
                                                    <a class="p-view prettyPhoto " title=""
                                                       data-gal="prettyPhoto[gal-5b5478714580a]"
                                                       href="<?php echo $image; ?>"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4 class="item-meta">
                                                <a href="<?php echo $image; ?>">
                                                    <?php echo $details; ?>         </a>
                                            </h4>
                                        </div>
                                    </div>          </div>
                                <?php } ?>
                                <div class="isotope-item item-layout-item-regular col-lg-4 col-md-4 col-sm-6 col-xs-12 graduation ">
                                    <div class="vertical-item gallery-item content-absolute text-center ds">
                                        <div class="item-media">
                                            <div class="item-media-wrap">
                                                <div class="item-media entry-thumbnail post-thumbnail">
                                                    <img width="1170" height="780" src="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/11.jpg" class="attachment- size- wp-post-image" alt="" srcset="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/11.jpg 1170w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/11-300x200.jpg 300w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/11-768x512.jpg 768w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/11-1024x683.jpg 1024w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/11-775x517.jpg 775w" sizes="(max-width: 1170px) 100vw, 1170px" />     </div> <!-- .item-media -->
                                            </div> <!-- .item-media-wrap -->

                                            <div class="media-links">
                                                <div class="links-wrap">
                                                    <a class="p-view prettyPhoto " title=""
                                                       data-gal="prettyPhoto[gal-5b5478714580a]"
                                                       href="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/11.jpg"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4 class="item-meta">
                                                <a href="http://webdesign-finder.com/makeup/?fw-portfolio=landjaeger-salami-strip-steak-boudin-3">
                                                    Landjaeger salami strip steak boudin            </a>
                                            </h4>
                                        </div>
                                    </div>          </div>
                                <div
                                    class="isotope-item item-layout-item-regular col-lg-4 col-md-4 col-sm-6 col-xs-12 face ">
                                    <div class="vertical-item gallery-item content-absolute text-center ds">
                                        <div class="item-media">
                                            <div class="item-media-wrap">
                                                <div class="item-media entry-thumbnail post-thumbnail">
                                                    <img width="1170" height="780" src="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/10.jpg" class="attachment- size- wp-post-image" alt="" srcset="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/10.jpg 1170w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/10-300x200.jpg 300w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/10-768x512.jpg 768w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/10-1024x683.jpg 1024w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/10-775x517.jpg 775w" sizes="(max-width: 1170px) 100vw, 1170px" />     </div> <!-- .item-media -->
                                            </div> <!-- .item-media-wrap -->

                                            <div class="media-links">
                                                <div class="links-wrap">
                                                    <a class="p-view prettyPhoto " title=""
                                                       data-gal="prettyPhoto[gal-5b5478714580a]"
                                                       href="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/10.jpg"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4 class="item-meta">
                                                <a href="http://webdesign-finder.com/makeup/?fw-portfolio=short-ribs-jerky-ham-corned-beef-pork-2">
                                                    Short ribs jerky ham corned beef pork           </a>
                                            </h4>
                                        </div>
                                    </div>          </div>
                                <div
                                    class="isotope-item item-layout-item-regular col-lg-4 col-md-4 col-sm-6 col-xs-12 hair ">
                                    <div class="vertical-item gallery-item content-absolute text-center ds">
                                        <div class="item-media">
                                            <div class="item-media-wrap">
                                                <div class="item-media entry-thumbnail post-thumbnail">
                                                    <img width="1170" height="780" src="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/09.jpg" class="attachment- size- wp-post-image" alt="" srcset="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/09.jpg 1170w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/09-300x200.jpg 300w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/09-768x512.jpg 768w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/09-1024x683.jpg 1024w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/09-775x517.jpg 775w" sizes="(max-width: 1170px) 100vw, 1170px" />     </div> <!-- .item-media -->
                                            </div> <!-- .item-media-wrap -->

                                            <div class="media-links">
                                                <div class="links-wrap">
                                                    <a class="p-view prettyPhoto " title=""
                                                       data-gal="prettyPhoto[gal-5b5478714580a]"
                                                       href="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/09.jpg"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4 class="item-meta">
                                                <a href="http://webdesign-finder.com/makeup/?fw-portfolio=tenderloin-filet-mignon-doner-strip-steak-2">
                                                    Tenderloin filet mignon doner strip steak           </a>
                                            </h4>
                                        </div>
                                    </div>          </div>
                                <div class="isotope-item item-layout-item-regular col-lg-4 col-md-4 col-sm-6 col-xs-12 photoshoot ">
                                    <div class="vertical-item gallery-item content-absolute text-center ds">
                                        <div class="item-media">
                                            <div class="item-media-wrap">
                                                <div class="item-media entry-thumbnail post-thumbnail">
                                                    <img width="1170" height="780" src="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/08-1.jpg" class="attachment- size- wp-post-image" alt="" srcset="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/08-1.jpg 1170w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/08-1-300x200.jpg 300w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/08-1-768x512.jpg 768w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/08-1-1024x683.jpg 1024w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/08-1-775x517.jpg 775w" sizes="(max-width: 1170px) 100vw, 1170px" />     </div> <!-- .item-media -->
                                            </div> <!-- .item-media-wrap -->

                                            <div class="media-links">
                                                <div class="links-wrap">
                                                    <a class="p-view prettyPhoto " title=""
                                                       data-gal="prettyPhoto[gal-5b5478714580a]"
                                                       href="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/08-1.jpg"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4 class="item-meta">
                                                <a href="http://webdesign-finder.com/makeup/?fw-portfolio=doner-alcatra-flank-burgdoggen-chicken">
                                                    Doner alcatra flank burgdoggen chicken          </a>
                                            </h4>
                                        </div>
                                    </div>          </div>
                                <div
                                    class="isotope-item item-layout-item-regular col-lg-4 col-md-4 col-sm-6 col-xs-12 eye ">
                                    <div class="vertical-item gallery-item content-absolute text-center ds">
                                        <div class="item-media">
                                            <div class="item-media-wrap">
                                                <div class="item-media entry-thumbnail post-thumbnail">
                                                    <img width="1170" height="780" src="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/07-1.jpg" class="attachment- size- wp-post-image" alt="" srcset="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/07-1.jpg 1170w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/07-1-300x200.jpg 300w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/07-1-768x512.jpg 768w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/07-1-1024x683.jpg 1024w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/07-1-775x517.jpg 775w" sizes="(max-width: 1170px) 100vw, 1170px" />     </div> <!-- .item-media -->
                                            </div> <!-- .item-media-wrap -->

                                            <div class="media-links">
                                                <div class="links-wrap">
                                                    <a class="p-view prettyPhoto " title=""
                                                       data-gal="prettyPhoto[gal-5b5478714580a]"
                                                       href="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/07-1.jpg"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4 class="item-meta">
                                                <a href="http://webdesign-finder.com/makeup/?fw-portfolio=meatloaf-hamburger-tenderloin">
                                                    Meatloaf hamburger tenderloin           </a>
                                            </h4>
                                        </div>
                                    </div>          </div>
                                <div
                                    class="isotope-item item-layout-item-regular col-lg-4 col-md-4 col-sm-6 col-xs-12 hair ">
                                    <div class="vertical-item gallery-item content-absolute text-center ds">
                                        <div class="item-media">
                                            <div class="item-media-wrap">
                                                <div class="item-media entry-thumbnail post-thumbnail">
                                                    <img width="1170" height="780" src="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/06-1.jpg" class="attachment- size- wp-post-image" alt="" srcset="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/06-1.jpg 1170w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/06-1-300x200.jpg 300w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/06-1-768x512.jpg 768w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/06-1-1024x683.jpg 1024w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/06-1-775x517.jpg 775w" sizes="(max-width: 1170px) 100vw, 1170px" />     </div> <!-- .item-media -->
                                            </div> <!-- .item-media-wrap -->

                                            <div class="media-links">
                                                <div class="links-wrap">
                                                    <a class="p-view prettyPhoto " title=""
                                                       data-gal="prettyPhoto[gal-5b5478714580a]"
                                                       href="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/06-1.jpg"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4 class="item-meta">
                                                <a href="http://webdesign-finder.com/makeup/?fw-portfolio=tri-tip-tongue-kielbasa-rump-2">
                                                    Tri-tip tongue kielbasa rump            </a>
                                            </h4>
                                        </div>
                                    </div>          </div>
                                <div class="isotope-item item-layout-item-regular col-lg-4 col-md-4 col-sm-6 col-xs-12 graduation ">
                                    <div class="vertical-item gallery-item content-absolute text-center ds">
                                        <div class="item-media">
                                            <div class="item-media-wrap">
                                                <div class="item-media entry-thumbnail post-thumbnail">
                                                    <img width="1170" height="780" src="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/05-1.jpg" class="attachment- size- wp-post-image" alt="" srcset="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/05-1.jpg 1170w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/05-1-300x200.jpg 300w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/05-1-768x512.jpg 768w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/05-1-1024x683.jpg 1024w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/05-1-775x517.jpg 775w" sizes="(max-width: 1170px) 100vw, 1170px" />     </div> <!-- .item-media -->
                                            </div> <!-- .item-media-wrap -->

                                            <div class="media-links">
                                                <div class="links-wrap">
                                                    <a class="p-view prettyPhoto " title=""
                                                       data-gal="prettyPhoto[gal-5b5478714580a]"
                                                       href="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/05-1.jpg"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4 class="item-meta">
                                                <a href="http://webdesign-finder.com/makeup/?fw-portfolio=landjaeger-salami-strip-steak-boudin-2">
                                                    Landjaeger salami strip steak boudin            </a>
                                            </h4>
                                        </div>
                                    </div>          </div>
                                <div
                                    class="isotope-item item-layout-item-regular col-lg-4 col-md-4 col-sm-6 col-xs-12 eye ">
                                    <div class="vertical-item gallery-item content-absolute text-center ds">
                                        <div class="item-media">
                                            <div class="item-media-wrap">
                                                <div class="item-media entry-thumbnail post-thumbnail">
                                                    <img width="1170" height="780" src="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/04-1.jpg" class="attachment- size- wp-post-image" alt="" srcset="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/04-1.jpg 1170w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/04-1-300x200.jpg 300w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/04-1-768x512.jpg 768w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/04-1-1024x683.jpg 1024w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/04-1-775x517.jpg 775w" sizes="(max-width: 1170px) 100vw, 1170px" />     </div> <!-- .item-media -->
                                            </div> <!-- .item-media-wrap -->

                                            <div class="media-links">
                                                <div class="links-wrap">
                                                    <a class="p-view prettyPhoto " title=""
                                                       data-gal="prettyPhoto[gal-5b5478714580a]"
                                                       href="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/04-1.jpg"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4 class="item-meta">
                                                <a href="http://webdesign-finder.com/makeup/?fw-portfolio=short-ribs-jerky-ham-corned-beef-pork">
                                                    Short ribs jerky ham corned beef pork           </a>
                                            </h4>
                                        </div>
                                    </div>          </div>
                                <div class="isotope-item item-layout-item-regular col-lg-4 col-md-4 col-sm-6 col-xs-12 photoshoot ">
                                    <div class="vertical-item gallery-item content-absolute text-center ds">
                                        <div class="item-media">
                                            <div class="item-media-wrap">
                                                <div class="item-media entry-thumbnail post-thumbnail">
                                                    <img width="1170" height="780" src="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/03-2.jpg" class="attachment- size- wp-post-image" alt="" srcset="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/03-2.jpg 1170w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/03-2-300x200.jpg 300w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/03-2-768x512.jpg 768w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/03-2-1024x683.jpg 1024w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/03-2-775x517.jpg 775w" sizes="(max-width: 1170px) 100vw, 1170px" />     </div> <!-- .item-media -->
                                            </div> <!-- .item-media-wrap -->

                                            <div class="media-links">
                                                <div class="links-wrap">
                                                    <a class="p-view prettyPhoto " title=""
                                                       data-gal="prettyPhoto[gal-5b5478714580a]"
                                                       href="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/03-2.jpg"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4 class="item-meta">
                                                <a href="http://webdesign-finder.com/makeup/?fw-portfolio=tenderloin-filet-mignon-doner-strip-steak">
                                                    Tenderloin filet mignon doner strip steak           </a>
                                            </h4>
                                        </div>
                                    </div>          </div>
                                <div class="isotope-item item-layout-item-regular col-lg-4 col-md-4 col-sm-6 col-xs-12 graduation ">
                                    <div class="vertical-item gallery-item content-absolute text-center ds">
                                        <div class="item-media">
                                            <div class="item-media-wrap">
                                                <div class="item-media entry-thumbnail post-thumbnail">
                                                    <img width="1170" height="780" src="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/01-2.jpg" class="attachment- size- wp-post-image" alt="" srcset="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/01-2.jpg 1170w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/01-2-300x200.jpg 300w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/01-2-768x512.jpg 768w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/01-2-1024x683.jpg 1024w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/01-2-775x517.jpg 775w" sizes="(max-width: 1170px) 100vw, 1170px" />     </div> <!-- .item-media -->
                                            </div> <!-- .item-media-wrap -->

                                            <div class="media-links">
                                                <div class="links-wrap">
                                                    <a class="p-view prettyPhoto " title=""
                                                       data-gal="prettyPhoto[gal-5b5478714580a]"
                                                       href="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/01-2.jpg"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4 class="item-meta">
                                                <a href="http://webdesign-finder.com/makeup/?fw-portfolio=landjaeger-salami-strip-steak-boudin">
                                                    Landjaeger salami strip steak boudin            </a>
                                            </h4>
                                        </div>
                                    </div>          </div>
                                <div
                                    class="isotope-item item-layout-item-regular col-lg-4 col-md-4 col-sm-6 col-xs-12 eye ">
                                    <div class="vertical-item gallery-item content-absolute text-center ds">
                                        <div class="item-media">
                                            <div class="item-media-wrap">
                                                <div class="item-media entry-thumbnail post-thumbnail">
                                                    <img width="1170" height="780" src="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/02-2.jpg" class="attachment- size- wp-post-image" alt="" srcset="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/02-2.jpg 1170w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/02-2-300x200.jpg 300w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/02-2-768x512.jpg 768w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/02-2-1024x683.jpg 1024w, http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/02-2-775x517.jpg 775w" sizes="(max-width: 1170px) 100vw, 1170px" />     </div> <!-- .item-media -->
                                            </div> <!-- .item-media-wrap -->

                                            <div class="media-links">
                                                <div class="links-wrap">
                                                    <a class="p-view prettyPhoto " title=""
                                                       data-gal="prettyPhoto[gal-5b5478714580a]"
                                                       href="http://webdesign-finder.com/makeup/wp-content/uploads/2017/08/02-2.jpg"></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-content">
                                            <h4 class="item-meta">
                                                <a href="http://webdesign-finder.com/makeup/?fw-portfolio=tri-tip-tongue-kielbasa-rump">
                                                    Tri-tip tongue kielbasa rump            </a>
                                            </h4>
                                        </div>
                                    </div>          </div>
                            </div><!-- eof .isotope_container -->
                        </div><!-- eof .columns_padding_* -->           </div><!--eof #content -->

                </div><!-- eof .row-->
            </div><!-- eof .container -->
        </section><!-- eof .page_content -->
        <section class="ls page_copyright section_padding_top_30 section_padding_bottom_30 table_section table_section_md">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-push-4 text-center">
                        <img src="logo.png">
                    </div>
                    <div class="col-sm-6 col-md-4 col-md-pull-4 text-center">
                        <p class="small-text">
                            makeup artist                </p>
                    </div>
                    <div class="col-sm-6 col-md-4 text-center">
                        <p class="small-text">
                            &copy; 2018 Stephanie                </p>
                    </div>
                </div>
            </div>
        </section>
</div><!-- eof #canvas -->
    <script type='text/javascript' src='http://webdesign-finder.com/makeup/wp-content/themes/makeup/js/compressed.js?ver=1.0.2'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/makeup/wp-content/themes/makeup/js/plugins.js?ver=1.0.2'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/makeup/wp-content/themes/makeup/js/main.js?ver=1.0.2'></script>
    <script type='text/javascript' src='http://webdesign-finder.com/makeup/wp-includes/js/wp-embed.min.js?ver=4.8.6'></script>
</body>
</html>
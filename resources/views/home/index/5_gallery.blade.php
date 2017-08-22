<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>5: Gallery</title>

    <link rel="stylesheet" href="assets/header.css">

    <style>

        /*  Page styles  */

        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body{
            font: normal 14px/1.4 Arial, Helvetica, sans-serif;
        }

        .skrollr-desktop body {
            height:100% !important;
        }

        #skrollr-body {
            height:100%;
            overflow:visible;
            position:relative;
        }


        /*  Styles for this example */

        .dummy-content{
            padding: 150px 0;
            background: radial-gradient(white, #EEF6F9);
            color: #3FA564;
            font-size: 24px;
            height: 100vh;
            text-align: center;
        }

        .dummy-content h2{
            font-weight: normal;
        }


        .gallery{
            background-color: #fff;
            color: #221f51;
            font: normal 24px sans-serif;
            min-height: 300vh;
            text-align: center;
            overflow: hidden;
        }

        .scroll-pause{
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            padding-top: 20vh;
        }


        .scroll-pause .row{
            width: 200vw;
            height: 30vh;
            overflow: hidden;
        }

        .scroll-pause .row div{
            width: 11.5%;
            height: 90%;
            float: left;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            margin: 0.5%;
            border-radius: 10px;
        }

        .scroll-pause .row div:first-child{
            margin-left: 0.4%;
        }

        .scroll-pause .row div:last-child{
            margin-right: 0.4%;
        }



    </style>
</head>
<body>

<div id="skrollr-body">

    <header>
        <h1>使用6种不同视觉差特效的HTML5页面设计效果</h1>
    </header>

    <ul>
        <li><a href="1_parallax_intro.html">Parallax Intro</a></li>
        <li><a href="2_body_text.html">Body Text</a></li>
        <li><a href="3_feature_list.html">Feature List</a></li>
        <li><a href="4_about_us.html">About us</a></li>
        <li><a href="5_gallery.html" class="active">Gallery</a></li>
        <li><a href="6_footer.html">Footer</a></li>
    </ul>


    <div class="dummy-content">

        <h2>Scroll to see the effect!</h2>

    </div>

    <div class="gallery"></div>

</div>

<div class="scroll-pause" data-anchor-target=".gallery" data-100p-top-top="transform:translateY(100%);" data-top-top="transform:translateY(0%)" data--150p-top-top="" data--300p-top-top="transform:translateY(-100%)">

    <div class="row" data-anchor-target=".gallery" data-top-top="transform: translateX(0%);" data--150p-top-top="transform: translateX(-50%);">
        <div style="background-image:url(assets/images/small/coast.jpg);" ></div>

        <div style="background-image:url(assets/images/small/palmtrees.jpg);" ></div>

        <div style="background-image:url(assets/images/small/bay.jpg);" ></div>

        <div style="background-image:url(assets/images/small/sea.jpg);" ></div>

        <div style="background-image:url(assets/images/small/coast.jpg);" ></div>

        <div style="background-image:url(assets/images/small/palmtrees.jpg);" ></div>

        <div style="background-image:url(assets/images/small/bay.jpg);" ></div>

        <div style="background-image:url(assets/images/small/sea.jpg);" ></div>
    </div>


    <div class="row" data-anchor-target=".gallery" data-top-top="transform: translateX(-50%);" data--150p-top-top="transform: translateX(0);">

        <div style="background-image:url(assets/images/small/sea.jpg);" ></div>

        <div style="background-image:url(assets/images/small/bay.jpg);" ></div>

        <div style="background-image:url(assets/images/small/palmtrees.jpg);" ></div>

        <div style="background-image:url(assets/images/small/coast.jpg);" ></div>

        <div style="background-image:url(assets/images/small/sea.jpg);" ></div>

        <div style="background-image:url(assets/images/small/bay.jpg);" ></div>

        <div style="background-image:url(assets/images/small/palmtrees.jpg);" ></div>

        <div style="background-image:url(assets/images/small/coast.jpg);" ></div>

    </div>

</div>

<script src="assets/skrollr.min.js"></script>

<script>
    skrollr.init();
</script>


</body>
</html>
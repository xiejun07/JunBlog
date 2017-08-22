<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>3: Feature List</title>

    <link href="https://fonts.useso.com/icon?family=Material+Icons" rel="stylesheet">

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

        .features-list{
            padding: 150px 0;
            background-color: #fff;
            color: #25373C;
            font-size: 18px;
            min-height: 100vh;
            text-align: center;
        }

        .features-list h2{
            font-size: 42px;
            margin-bottom: 80px;
            font-weight: normal;
        }

        .features-list div{
            display: inline-block;
            width: 30%;
            margin: 5px;
            border: 1px solid #ccc;
            padding: 45px;
            box-shadow: 1px 1px 1px #ccc, 0 0 30px #eee inset;
        }

        .features-list div i{
            font-size: 150px;
            margin-bottom: 40px;
            color: #50B575;
        }

        .features-list div h4{
            font-size: 18px;
            text-transform: uppercase;
            color: #425F67;
            font-weight: normal;
        }


        @media (max-width: 900px){

            .features-list div{
                width: 90%;
                margin-bottom: 30px;
            }

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
        <li><a href="3_feature_list.html"  class="active">Feature List</a></li>
        <li><a href="4_about_us.html">About us</a></li>
        <li><a href="5_gallery.html">Gallery</a></li>
        <li><a href="6_footer.html">Footer</a></li>
    </ul>

    <div class="dummy-content">

        <h2>Scroll to see the effect!</h2>

    </div>

    <div class="features-list">

        <h2>Features</h2>

        <div data-100-bottom-top="transform: translateX(-200px); opacity: 0" data-center-top="transform: translateX(0px); opacity: 1">
            <i class="material-icons">cloud_done</i>
            <h4>10 GB of free <b>cloud storage</b></h4>
        </div>

        <div data-100-bottom-top="transform: translateY(200px); opacity: 0" data-center-top="transform: translateY(0px); opacity: 1">
            <i class="material-icons">public</i>
            <h4>Servers in over <b>45 locations</b></h4>
        </div>

        <div data-100-bottom-top="transform: translateX(200px); opacity: 0" data-center-top="transform: translateX(0px); opacity: 1">
            <i class="material-icons">security</i>
            <h4>Guaranteed <b>data protection</b></h4>
        </div>

    </div>

</div>

<script src="assets/skrollr.min.js"></script>

<script>
    skrollr.init();
</script>

</body>
</html>
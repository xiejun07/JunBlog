<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>6: Footer</title>

    <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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

        footer{
            background-color: rgb(255, 255, 255);
            box-shadow: 0 -1px 1px 0 rgba(0, 0, 0, 0.04);
            box-sizing: border-box;
            width: 100%;
            font: bold 16px sans-serif;
            text-align: left;
            padding: 50px 60px 55px;
            overflow: hidden;
        }

        /* Footer left */

        footer .footer-left{
            float: left;
        }

        footer h3{
            color:  #5383d3;
            font: normal 36px 'Cookie', cursive;
            margin: 0;
        }

        footer .footer-links{
            color: #95A4A9;
            margin: 22px 0 14px;
            padding: 0;
        }

        footer .footer-links a{
            display: inline-block;
            text-decoration: none;
            color: #50B575;
        }

        footer .footer-company-name{
            color:  #8f9296;
            font-size: 14px;
            font-weight: normal;
            margin: 0;
        }


        /* Footer right */

        footer .footer-right{
            float: right;
            width: 100%;
        }

        /* The search form */

        footer form{
            position: relative;
        }

        footer form input{
            display: block;
            box-sizing: border-box;
            font: inherit;
            font-size: 14px;
            font-weight: normal;
            color: #32383A;
            width: 100%;
            padding: 18px 50px 18px 18px;
            outline: none;
            border: 1px solid #e0e0e0;
            border-radius: 2px;
            box-shadow: 0 1px 1px #eee;
        }

        footer form input:focus{
            border-color:#ccc;
        }

        /* Changing the placeholder color */

        footer form input::-webkit-input-placeholder {
            color:  #5c666b;
        }

        footer form input::-moz-placeholder {
            opacity: 1;
            color:  #5c666b;
        }

        footer form input:-ms-input-placeholder{
            color:  #5c666b;
        }

        /* The magnify glass icon */

        footer form i{
            width: 20px;
            height: 20px;
            position: absolute;
            top: 16px;
            right: 18px;

            color: #d1d2d2;
            font-size: 20px;
        }

        /* If you don't want the footer to be responsive, remove these media queries */

        @media (max-width: 1100px) {

            footer .footer-left{
                margin-bottom: 50px;
            }

            footer .footer-right{
                float: left;
                clear: left;
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
        <li><a href="3_feature_list.html">Feature List</a></li>
        <li><a href="4_about_us.html">About us</a></li>
        <li><a href="5_gallery.html">Gallery</a></li>
        <li><a href="6_footer.html" class="active">Footer</a></li>
    </ul>


    <div class="dummy-content">

        <h2>Scroll to see the effect!</h2>

    </div>


    <footer>

        <div class="footer-left">

            <h3>Companylogo</h3>

            <p class="footer-links">
                <a href="#">Home</a>
                ·
                <a href="#">Blog</a>
                ·
                <a href="#">Pricing</a>
                ·
                <a href="#">About</a>
                ·
                <a href="#">Faq</a>
                ·
                <a href="#">Contact</a>
            </p>

            <p class="footer-company-name">Company Name &copy; 2015</p>

        </div>

        <div class="footer-right"  data-bottom-top="max-width: 200px;" data-bottom-bottom="max-width: 600px;">

            <form method="get" action="#">
                <input placeholder="Search our website"  />
                <i class="material-icons">search</i>
            </form>

        </div>

    </footer>


</div>

<script src="assets/skrollr.min.js"></script>

<script>
    skrollr.init();
</script>

</body>
</html>
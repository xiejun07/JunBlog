<!doctype html>
<html lang="zh">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>使用6种不同视觉差特效的HTML5页面设计效果|DEMO_jQuery之家-自由分享jQuery、html5、css3的插件库</title>
	<link href='https://fonts.useso.com/css?family=Droid+Serif' rel='stylesheet' type='text/css'>
	<link href='https://fonts.useso.com/css?family=Cookie' rel='stylesheet' type='text/css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css'>
	<link rel="stylesheet" type="text/css" href="{{asset('home/index/css/normalize.css')}}" />
	<link rel="stylesheet" type="text/css" href="{{asset('home/index/css/default.css')}}">
	<link href="{{asset('home/index/assets/demo.css')}}" rel="stylesheet">
	<link href="{{asset('home/index/assets/header.css')}}" rel="stylesheet">
	
	<!--[if IE]>
		<script src="http://libs.useso.com/js/html5shiv/3.7/html5shiv.min.js"></script>
	<![endif]-->
</head>
<body>
	<div
        class="parallax-image-wrapper"
        data-anchor-target="#page-intro"
        data-bottom-top="transform:translateY(200%)"
        data-top-bottom="transform:translateY(0)">

    <div
            class="parallax-image"
            style="background-image:url(home/index/assets/images/coast.jpg)"
            data-anchor-target="#page-intro"
            data-bottom-top="transform: translateY(-80%);"
            data-top-bottom="transform: translateY(80%);"
            >

    </div>
</div>
<div
        class="parallax-image-wrapper"
        data-anchor-target=".body-text + .gap"
        data-bottom-top="transform:translateY(200%)"
        data-top-bottom="transform:translateY(0)">

    <div
            class="parallax-image"
            style="background-image:url(home/index/assets/images/palmtrees.jpg)"
            data-anchor-target=".body-text + .gap"
            data-bottom-top="transform: translateY(-80%);"
            data-top-bottom="transform: translateY(80%);"
            >

    </div>
</div>
<div
        class="parallax-image-wrapper"
        data-anchor-target=".features-list + .gap"
        data-bottom-top="transform:translateY(200%)"
        data-top-bottom="transform:translateY(0)">

    <div
            class="parallax-image"
            style="background-image:url(home/index/assets/images/bay.jpg)"
            data-anchor-target=".features-list + .gap"
            data-bottom-top="transform: translateY(-80%);"
            data-top-bottom="transform: translateY(80%);"
            >

    </div>
</div>
<div
        class="parallax-image-wrapper"
        data-anchor-target=".about-us + .gap"
        data-bottom-top="transform:translateY(200%)"
        data-top-bottom="transform:translateY(0)">

    <div
            class="parallax-image"
            style="background-image:url(home/index/assets/images/sea.jpg)"
            data-anchor-target=".about-us + .gap"
            data-bottom-top="transform: translateY(-80%);"
            data-top-bottom="transform: translateY(80%);"
            >

    </div>
</div>

<div id="skrollr-body">

    <div id="page-intro" class="gap" style="background-image:url(home/index/assets/images/coast.jpg); ">
        <div class="htmleaf-header">
		<h1>使用6种不同视觉差特效的HTML5页面设计效果 <span>6 Practical Examples For Building Parallax Websites</span></h1>
		<div class="htmleaf-links">
			<a class="htmleaf-icon icon-htmleaf-home-outline" href="http://www.htmleaf.com/" title="jQuery之家" target="_blank"><span> jQuery之家</span></a>
			<a class="htmleaf-icon icon-htmleaf-arrow-forward-outline" href="http://www.htmleaf.com/html5/html5muban/201510102653.html" title="返回下载页" target="_blank"><span> 返回下载页</span></a>
		</div>
	</div>
    </div>

    <div class="body-text content">

        <h2>Body Text</h2>

        <p data-300-center-top="transform: scale(0.8); opacity: 0" data-300-center-center="transform: scale(1); opacity: 1">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida in odio vel tincidunt. Fusce quis lectus accumsan, accumsan nibh sed, aliquet purus. In vitae velit eu est cursus malesuada sed ut nibh. Curabitur a leo enim.
        </p>


        <p data-200-center-top="transform: scale(0.8); opacity: 0" data-200-center-center="transform: scale(1); opacity: 1">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida in odio vel tincidunt. Fusce quis lectus accumsan, accumsan nibh sed, aliquet purus. In vitae velit eu est cursus malesuada sed ut nibh. Curabitur a leo enim.
        </p>

        <p data-100-center-top="transform: scale(0.8); opacity: 0" data-100-center-center="transform: scale(1); opacity: 1">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras gravida in odio vel tincidunt. Fusce quis lectus accumsan, accumsan nibh sed, aliquet purus. In vitae velit eu est cursus malesuada sed ut nibh. Curabitur a leo enim.
        </p>

    </div>

    <div class="gap" style="background-image:url(home/index/assets/images/palmtrees.jpg); "></div>

    <div class="features-list">

        <h2>Features</h2>

        <div data-100-bottom-top="transform: translateX(-200px); opacity: 0" data-center-top="transform: translateX(0px); opacity: 1">
            <i class="fa fa-cloud-download"></i>
            <h4>10 GB of free <b>cloud storage</b></h4>
        </div>

        <div data-100-bottom-top="transform: translateY(200px); opacity: 0" data-center-top="transform: translateY(0px); opacity: 1">
            <i class="fa fa-globe"></i>
            <h4>Servers in over <b>45 locations</b></h4>
        </div>

        <div data-100-bottom-top="transform: translateX(200px); opacity: 0" data-center-top="transform: translateX(0px); opacity: 1">
            <i class="fa fa-shield"></i>
            <h4>Guaranteed <b>data protection</b></h4>
        </div>

    </div>

    <div class="gap" style="background-image:url(home/index/assets/images/bay.jpg); "></div>


    <div class="about-us">

        <h2>About us</h2>

        <div data-150-bottom-center="transform: rotate(-90deg); opacity: 0" data-150-center-center="transform: rotate(0); opacity: 1">
            <img src="{{asset('home/index/assets/images/avatars/1.jpg')}}" alt="avatar">
        </div>

        <div data-100-bottom-center="transform: rotate(-90deg); opacity: 0" data-100-center-center="transform: rotate(0); opacity: 1">
            <img src="{{asset('home/index/assets/images/avatars/2.jpg')}}" alt="avatar">
        </div>

        <div data-50-bottom-center="transform: rotate(-90deg); opacity: 0" data-50-center-center="transform: rotate(0); opacity: 1">
            <img src="{{asset('home/index/assets/images/avatars/3.jpg')}}" alt="avatar">
        </div>

        <div data-150-bottom-center="transform: rotateY(-90deg); opacity: 0" data-150-center-center="transform: rotate(0); opacity: 1">
            <img src="{{asset('home/index/assets/images/avatars/4.jpg')}}" alt="avatar">
        </div>

        <div data-100-bottom-center="transform: rotateY(-90deg); opacity: 0" data-100-center-center="transform: rotate(0); opacity: 1">
            <img src="{{asset('home/index/assets/images/avatars/5.jpg')}}" alt="avatar">
        </div>

        <div data-50-bottom-center="transform: rotateY(-90deg); opacity: 0" data-50-center-center="transform: rotate(0); opacity: 1">
            <img src="{{asset('home/index/assets/images/avatars/6.jpg')}}" alt="avatar">
        </div>

        <a class="attribution" href="http://www.freepik.com/free-photos-vectors/icon">Icon vectors designed by Freepik</a>

    </div>

    <div class="gap" style="background-image:url(home/index/assets/images/sea.jpg);"></div>

    <div class="gallery"></div>


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
                <i class="fa fa-search "></i>
            </form>

        </div>

    </footer>


</div>




<div class="scroll-pause" data-anchor-target=".gallery" data-100p-top-top="transform:translateY(100%);" data-top-top="transform:translateY(0%)" data--150p-top-top="" data--300p-top-top="transform:translateY(-100%)">

    <div class="row" data-anchor-target=".gallery" data-top-top="transform: translateX(0%);" data--150p-top-top="transform: translateX(-50%);">
        <div style="background-image:url(home/index/assets/images/small/coast.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/palmtrees.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/bay.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/sea.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/coast.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/palmtrees.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/bay.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/sea.jpg);" ></div>
    </div>


    <div class="row" data-anchor-target=".gallery" data-top-top="transform: translateX(-50%);" data--150p-top-top="transform: translateX(0);">

        <div style="background-image:url(home/index/assets/images/small/sea.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/bay.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/palmtrees.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/coast.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/sea.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/bay.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/palmtrees.jpg);" ></div>

        <div style="background-image:url(home/index/assets/images/small/coast.jpg);" ></div>

    </div>

</div>
	
	<script src="{{asset('home/index/assets/skrollr.min.js')}}"></script>
	<script>
	    skrollr.init();
	</script>
</body>
</html>
<!doctype html>
<!--[if lt IE 7 ]> <html lang="en" class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>
<meta name="viewport" content="width = 1050, user-scalable = no" />
<script type="text/javascript" src="{{asset('turnjs4/extras/jquery.min.1.7.js')}}"></script>
<script type="text/javascript" src="{{asset('turnjs4/extras/modernizr.2.5.3.min.js')}}"></script>

</head>
<body>

<div class="flipbook-viewport" style="width:100%">
	<div class="container">
		<div class="flipbook">
			<div style="background-image:url({{asset('turnjs4/samples/basic/pages/1.jpg')}})"></div>
			<div style="background-image:url({{asset('turnjs4/samples/basic/pages/2.jpg')}})"></div>
			<div style="background-image:url({{asset('turnjs4/samples/basic/pages/3.jpg')}})"></div>
			<div style="background-image:url({{asset('turnjs4/samples/basic/pages/4.jpg')}})"></div>
			<div style="background-image:url({{asset('turnjs4/samples/basic/pages/5.jpg')}})"></div>
			<div style="background-image:url({{asset('turnjs4/samples/basic/pages/6.jpg')}})"></div>
			<div style="background-image:url({{asset('turnjs4/samples/basic/pages/7.jpg')}})"></div>
			<div style="background-image:url({{asset('turnjs4/samples/basic/pages/8.jpg')}})"></div>
			<div style="background-image:url({{asset('turnjs4/samples/basic/pages/9.jpg')}})"></div>
			<div style="background-image:url({{asset('turnjs4/samples/basic/pages/10.jpg')}})"></div>
			<div style="background-image:url({{asset('turnjs4/samples/basic/pages/11.jpg')}})"></div>
			<div style="background-image:url({{asset('turnjs4/samples/basic/pages/12.jpg')}})"></div>
		</div>
	</div>
</div>


<script type="text/javascript">

function loadApp() {

	// Create the flipbook

	$('.flipbook').turn({
			// Width

			width:922,
			
			// Height

			height:600,

			// Elevation

			elevation: 50,
			
			// Enable gradients

			gradients: true,
			
			// Auto center this flipbook

			autoCenter: true

	});
}

// Load the HTML4 version if there's not CSS transform

yepnope({
	test : Modernizr.csstransforms,
	yep: ["{{asset('turnjs4/lib/turn.js')}}"],
	nope: ["{{asset('turnjs4/lib/turn.html4.min.js')}}"],
	both: ["{{asset('turnjs4/samples/basic/css/basic.css')}}"],
	complete: loadApp
});

</script>

</body>
</html>
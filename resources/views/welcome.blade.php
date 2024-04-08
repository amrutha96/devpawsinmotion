{{-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--tw-bg-opacity: 1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gray-100{--tw-bg-opacity: 1;background-color:rgb(243 244 246 / var(--tw-bg-opacity))}.border-gray-200{--tw-border-opacity: 1;border-color:rgb(229 231 235 / var(--tw-border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{--tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);--tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000),var(--tw-ring-shadow, 0 0 #0000),var(--tw-shadow)}.text-center{text-align:center}.text-gray-200{--tw-text-opacity: 1;color:rgb(229 231 235 / var(--tw-text-opacity))}.text-gray-300{--tw-text-opacity: 1;color:rgb(209 213 219 / var(--tw-text-opacity))}.text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}.text-gray-600{--tw-text-opacity: 1;color:rgb(75 85 99 / var(--tw-text-opacity))}.text-gray-700{--tw-text-opacity: 1;color:rgb(55 65 81 / var(--tw-text-opacity))}.text-gray-900{--tw-text-opacity: 1;color:rgb(17 24 39 / var(--tw-text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--tw-bg-opacity: 1;background-color:rgb(31 41 55 / var(--tw-bg-opacity))}.dark\:bg-gray-900{--tw-bg-opacity: 1;background-color:rgb(17 24 39 / var(--tw-bg-opacity))}.dark\:border-gray-700{--tw-border-opacity: 1;border-color:rgb(55 65 81 / var(--tw-border-opacity))}.dark\:text-white{--tw-text-opacity: 1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-gray-400{--tw-text-opacity: 1;color:rgb(156 163 175 / var(--tw-text-opacity))}.dark\:text-gray-500{--tw-text-opacity: 1;color:rgb(107 114 128 / var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
    </body>
</html> --}}





<!DOCTYPE html>
<html  >
    @include('includes.head')
<body>
  
    @include('includes.defaultheader')

<section data-bs-version="5.1" class="features4 cid-tMlEXTHLbS" id="features04-w">
	
	
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 content-head">
				<div class="mbr-section-head mb-5">
					<h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Our Services</strong></h4>
					<h5 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-4 display-7">Hover over pictures to add more cards or rearrange them with the Tools panel. Add multiple cards by selecting multiple images. You can set the number of columns in Block Parameters.</h5>
					
				</div>
			</div>
		</div>
		<div class="row">
			<div class="item features-image col-12 col-md-6 col-lg-4">
				<div class="item-wrapper">
					<div class="item-img">
						<img src="assets/images/mbr-815x755.jpg" alt="Mobirise Website Builder">
					</div>
					<div class="item-content">
						<h5 class="item-title mbr-fonts-style display-5">
							<strong>Dog Walking</strong></h5>
						
						<p class="mbr-text mbr-fonts-style display-7">
							Service Description. You can show/hide the title, subtitle, text, button in the Block Parameters
						</p>
						<div class="mbr-section-btn item-footer"><a href="" class="btn item-btn btn-primary display-7">Learn more</a></div>
					</div>

				</div>
			</div>
			
			
		</div>
	</div>
</section>

<section data-bs-version="5.1" class="gallery1 mbr-gallery cid-tMlDYtQ5fF" id="gallery02-v">
    

    
    

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 content-head">
                <div class="mbr-section-head mb-5">
                    <h3 class="mbr-section-title mbr-fonts-style align-center m-0 display-2"><strong>Gallery with Masonry Grid and Popup Slider</strong></h3>
                    <h4 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-4 display-7">Use images of different sizes in this gallery. Click on the image to change it. Click on the + (Add Items) button to add multiple pictures at once.</h4>
                </div>
            </div>
        </div>
        <div class="row mbr-gallery mbr-masonry" data-masonry="{&quot;percentPosition&quot;: true }">
            <div class="col-12 col-md-6 col-lg-3 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#u8jGX4EUDD-modal" data-bs-target="#u8jGX4EUDD-modal">
                    <img class="w-100" src="assets/images/mbr-646x431.jpg" alt="Mobirise Website Builder" data-slide-to="0" data-bs-slide-to="0" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD">
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mobi-mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-md-6 col-lg-3 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#u8jGX4EUDD-modal" data-bs-target="#u8jGX4EUDD-modal">
                    <img class="w-100" src="assets/images/mbr-646x429.jpg" alt="Mobirise Website Builder" data-slide-to="1" data-bs-slide-to="1" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD">
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mobi-mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-md-6 col-lg-3 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#u8jGX4EUDD-modal" data-bs-target="#u8jGX4EUDD-modal">
                    <img class="w-100" src="assets/images/mbr-646x591.jpg" alt="Mobirise Website Builder" data-slide-to="2" data-bs-slide-to="2" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD">
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mobi-mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-md-6 col-lg-3 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#u8jGX4EUDD-modal" data-bs-target="#u8jGX4EUDD-modal">
                    <img class="w-100" src="assets/images/mbr-646x485.jpg" alt="Mobirise Website Builder" data-slide-to="3" data-bs-slide-to="3" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD">
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mobi-mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-md-6 col-lg-3 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#u8jGX4EUDD-modal" data-bs-target="#u8jGX4EUDD-modal">
                    <img class="w-100" src="assets/images/mbr-646x646.jpg" alt="Mobirise Website Builder" data-slide-to="4" data-bs-slide-to="4" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD">
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mobi-mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-md-6 col-lg-3 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#u8jGX4EUDD-modal" data-bs-target="#u8jGX4EUDD-modal">
                    <img class="w-100" src="assets/images/mbr-1-646x431.jpg" alt="Mobirise Website Builder" data-slide-to="5" data-bs-slide-to="5" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD">
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mobi-mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                    </div>
                </div>
                
            </div>
            <div class="col-12 col-md-6 col-lg-3 item gallery-image">
                <div class="item-wrapper" data-toggle="modal" data-bs-toggle="modal" data-target="#u8jGX4EUDD-modal" data-bs-target="#u8jGX4EUDD-modal">
                    <img class="w-100" src="assets/images/mbr-2-646x431.jpg" alt="Mobirise Website Builder" data-slide-to="6" data-bs-slide-to="6" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD">
                    <div class="icon-wrapper">
                        <span class="mobi-mbri mobi-mbri-search mbr-iconfont mbr-iconfont-btn"></span>
                    </div>
                </div>
                
            </div>
        </div>

        <div class="modal mbr-slider" tabindex="-1" role="dialog" aria-hidden="true" id="u8jGX4EUDD-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="carousel slide" id="lb-u8jGX4EUDD" data-interval="5000" data-bs-interval="5000">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img class="d-block w-100" src="assets/images/mbr-646x431.jpg" alt="Mobirise Website Builder">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="assets/images/mbr-646x429.jpg" alt="Mobirise Website Builder">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="assets/images/mbr-646x591.jpg" alt="Mobirise Website Builder">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="assets/images/mbr-646x485.jpg" alt="Mobirise Website Builder">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="assets/images/mbr-646x646.jpg" alt="Mobirise Website Builder">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="assets/images/mbr-1-646x431.jpg" alt="Mobirise Website Builder">
                                </div>
                                <div class="carousel-item">
                                    <img class="d-block w-100" src="assets/images/mbr-2-646x431.jpg" alt="Mobirise Website Builder">
                                </div>
                            </div>
                            <ol class="carousel-indicators">
                                <li data-slide-to="0" data-bs-slide-to="0" class="active" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD"></li>
                                <li data-slide-to="1" data-bs-slide-to="1" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD"></li>
                                <li data-slide-to="2" data-bs-slide-to="2" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD"></li>
                                <li data-slide-to="3" data-bs-slide-to="3" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD"></li>
                                <li data-slide-to="4" data-bs-slide-to="4" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD"></li>
                                <li data-slide-to="5" data-bs-slide-to="5" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD"></li>
                                <li data-slide-to="6" data-bs-slide-to="6" data-target="#lb-u8jGX4EUDD" data-bs-target="#lb-u8jGX4EUDD"></li>
                            </ol>
                            <a role="button" href="" class="close" data-dismiss="modal" data-bs-dismiss="modal" aria-label="Close">
                            </a>
                            <a class="carousel-control-prev carousel-control" role="button" data-slide="prev" data-bs-slide="prev" href="#lb-u8jGX4EUDD">
                                <span class="mobi-mbri mobi-mbri-arrow-prev" aria-hidden="true"></span>
                                <span class="sr-only visually-hidden">Previous</span>
                            </a>
                            <a class="carousel-control-next carousel-control" role="button" data-slide="next" data-bs-slide="next" href="#lb-u8jGX4EUDD">
                                <span class="mobi-mbri mobi-mbri-arrow-next" aria-hidden="true"></span>
                                <span class="sr-only visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section data-bs-version="5.1" class="header09 cid-tLAX5BnXkJ" id="header09-q">
	
	
	<div class="container">
		<div class="row">
			<div class="content-wrap col-12 col-md-8">
				<h1 class="mbr-section-title mbr-fonts-style mbr-white mb-4 display-1"><strong>Unlock boundless possibilities</strong></h1>
				
				<p class="mbr-fonts-style mbr-text mbr-white mb-4 display-7">
					Mobirise Free Website Maker is perfect for non-techies and great for pro-coders for fast prototyping and small customers' projects.
				</p>
				<div class="mbr-section-btn"><a class="btn btn-white-outline display-7" href="https://mobiri.se">Learn more</a></div>
			</div>
		</div>
	</div>
</section>

<section data-bs-version="5.1" class="header1 cid-tJS9vXDdRK" id="header01-7">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12 col-md-12 col-lg-7 image-wrapper">
				<img class="w-100" src="assets/images/gallery01.jpg" alt="Mobirise Website Builder">
			</div>
			<div class="col-12 col-lg col-md-12">
				<div class="text-wrapper align-left">
					<h1 class="mbr-section-title mbr-fonts-style mb-4 display-2"><strong>About us</strong></h1>
					<p class="mbr-text mbr-fonts-style mb-4 display-7">
						Most blocks can be used with various types of backgrounds: color, pictures, or videos. It can be set in Block Parameters.&nbsp;You can show/hide the title, subtitle, text, button in the Block Parameters (blue gear icon at the top right corner of the block).&nbsp;</p>
					<div class="mbr-section-btn mt-3"><a class="btn btn-primary display-7" href="https://mobiri.se">Start now</a></div>
				</div>
			</div>
		</div>
	</div>
</section>
<section data-bs-version="5.1" class="features15 cid-tLek7gQhG7" id="features015-m">
	<div class="container">
		<div class="mbr-section-head mb-5">
			<h4 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
			  <strong>Why us?</strong></h4>
		  </div>
		<div class="row justify-content-center">
			<div class="item features-without-image col-12 col-lg-4">
				<div class="item-wrapper">
					<div class="img-wrapper">
						<img src="assets/images/shop1.jpg" alt="Mobirise Website Builder">
					</div>
					<div class="card-box">
						<h4 class="card-title mbr-fonts-style mb-3 display-5">
							<strong>Free</strong></h4>
						<h5 class="card-text mbr-fonts-style display-7">
							Mobirise is a free website builder. Mobirise is a free website builder. Mobirise is a free website builder.</h5>
					</div>
				</div>
			</div>
			<div class="item features-without-image col-12 col-lg-4">
				<div class="item-wrapper">
					<div class="img-wrapper">
						<img src="assets/images/shop2.jpg" alt="Mobirise Website Builder">
					</div>
					<div class="card-box">
						<h4 class="card-title mbr-fonts-style mb-3 display-5">
							<strong>Easy</strong></h4>
						<h5 class="card-text mbr-fonts-style display-7">
							Create landing pages with ease. Create landing pages with ease. Create landing pages with ease.<br><br></h5>
					</div>
				</div>
			</div>
			<div class="item features-without-image col-12 col-lg-4">
				<div class="item-wrapper">
					<div class="img-wrapper">
						<img src="assets/images/shop3.jpg" alt="Mobirise Website Builder">
					</div>
					<div class="card-box">
						<h4 class="card-title mbr-fonts-style mb-3 display-5">
							<strong>Beautiful</strong></h4>
						<h5 class="card-text mbr-fonts-style display-7">
							Build a website with Mobirise. Build a web page with Mobirise. Create a website with Mobirise.</h5>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<section data-bs-version="5.1" class="form5 cid-tJS9pBcTSa" id="form02-6">   
    <div class="container">
        <div class="mbr-section-head mb-5">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>Contact Form</strong></h3>
            <h4 class="mbr-section-subtitle mbr-fonts-style align-center mb-0 mt-4 display-7">To change your notification email, click on any form field below.
<div>The number of submissions is limited to 10 per day without the Form Builder.</div></h4>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                <form action="https://mobirise.eu/" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="2ge4lmpdFygok+rBLQXpe1JGXXt1O4XDeq1qmR/i8iDijc0tAtVuXGYKSdVwheM3+VuYHM5EfdgLku0bpLraHP/53MRQ260TIFBbSv+LEnQ0bzBE9yruBE3kw+isKofh">
                    <div class="row">
                        <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for filling out the form!</div>
                        <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                            Oops...! some problem!
                        </div>
                    </div>
                    <div class="dragArea row">
                        <div class="col-md col-sm-12 form-group mb-3" data-for="name">
                            <input type="text" name="name" placeholder="Name" data-form-field="name" class="form-control" value="" id="name-form02-6">
                        </div>
                        <div class="col-md col-sm-12 form-group mb-3" data-for="email">
                            <input type="email" name="email" placeholder="Email" data-form-field="email" class="form-control" value="" id="email-form02-6">
                        </div>
                        <div class="col-12 form-group mb-3" data-for="phone">
                            <input type="tel" name="phone" placeholder="Phone" data-form-field="phone" class="form-control" value="" id="phone-form02-6">
                        </div>
                        <div class="col-12 form-group mb-3" data-for="textarea">
                            <textarea name="textarea" placeholder="Message" data-form-field="textarea" class="form-control" id="textarea-form02-6"></textarea>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn">
                            <button type="submit" class="btn btn-primary display-7">Send message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section data-bs-version="5.1" class="contacts2 map1 cid-tLdYHD757A" id="contacts02-9">
    <div class="container">
        <div class="mbr-section-head mb-5">
            <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                <strong>Contacts</strong>
            </h3> 
        </div>
        <div class="row justify-content-center mt-4">
            <div class="card col-12 col-md-5">
                <div class="card-wrapper">
                    <div class="text-wrapper">
                        <h5 class="cardTitle mbr-fonts-style mb-2 display-5">
                        <strong>Get in touch</strong></h5>
                    <ul class="list mbr-fonts-style display-7">
                        <li class="mbr-text item-wrap"><span style="font-size: 1.4rem;">Phone: </span><a href="tel:+12345678910" class="text-primary" style="font-size: 1.4rem;">0 (800) 123 45 67</a><br></li>
                        <li class="mbr-text item-wrap">WhatsApp: <a href="https://wa.me/12345678910" class="text-primary">0 (800) 123 45 67</a></li>
                        <li class="mbr-text item-wrap">Email: <a href="mailto:info@site.com" class="text-primary">info@site.com</a></li><li class="mbr-text item-wrap"><br></li>
                        <li class="mbr-text item-wrap">Address: </li><li class="mbr-text item-wrap">350 5th Ave, New York, NY 10118</li><li class="mbr-text item-wrap"><span style="font-size: 1.4rem;">Working hours:</span><br></li><li class="mbr-text item-wrap">9:00AM - 6:00PM</li>
                    </ul>
                    </div>
                </div>
            </div>
            <div class="map-wrapper col-12 col-md-7">
                <div class="google-map"><iframe frameborder="0" style="border:0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6045.3003145248895!2d-73.9884657!3d40.7477229!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9ac1f1b85%3A0x7e33d1c0e7af3be4!2zMzUwIDV0aCBBdmUsIE5ldyBZb3JrLCBOWSAxMDExOCwg0KHQqNCQ!5e0!3m2!1sru!2sru!4v1689597362021!5m2!1sen!2sen" allowfullscreen=""></iframe></div>
            </div>
        </div>
    </div>
</section>
@include('includes.footer')
  <input name="animation" type="hidden">
  </body>
</html>
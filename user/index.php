<!-- connection -->
<?php require_once("../config/connection.php"); ?>
<!-- header -->
<?php include("../include/header.php"); ?>   
<!-- nav -->
<?php include("../include/navbar.php"); ?>
<!-- sub nav -->
<?php //include("include/nav_sub.php"); ?>   

<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3 text-white-50 bg-purple rounded box-shadow">
        <img class="mr-3" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-outline.svg" alt="" width="48" height="48">
        <div class="lh-100">
        <h6 class="mb-0 text-white lh-100">Matcha</h6>
        <small>Since 2020</small>
        </div>
    </div>
    
    <!-- Main -->
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="row">
		    <!-- Photo profile -->
            <div class="col-md-4">
                <div class="card mb-2">
                    <img class="card-img-top rounded" src="<?php echo $url; ?>/assets/img/slide/01.jpg" alt="Slide 1">
                </div>
            </div>

		    <!-- About profile -->
            <div class="col-md-8">
				<div class="my-3 p-3 bg-white rounded box-shadow">
			        <h6 class="border-bottom border-gray pb-2 mb-0">About Us</h6>
			        <div class="media text-muted pt-3">
				        <img src="<?php echo $url; ?>/assets/img/slide/01.jpg/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">@username</strong>
				            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
				        </p>
			        </div>
			        <div class="media text-muted pt-3">
				        <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">@username</strong>
				            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
				        </p>
			        </div>
			        <div class="media text-muted pt-3">
				        <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
				        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
				            <strong class="d-block text-gray-dark">@username</strong>
				            Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
				        </p>
			        </div>
			        <small class="d-block text-right mt-3">
				        <a href="#">All updates</a>
			        </small>
			    </div>
            </div>
        </div>
    </div>
</main>

<!-- footer -->
<?php include("../include/footer.php"); ?>
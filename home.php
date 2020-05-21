<!-- not include 'include/session.php' because not loged yet-->
<?php session_start(); ?>
<!-- connection -->
<?php require_once("config/connection.php"); ?>
<!-- header -->
<?php include("include/header.php"); ?>   
<!-- nav -->
<?php include("include/navbar_visitor.php"); ?>
<!-- if logged -> redirect to app -->
<?php if (isset($_SESSION['username']))  { header("location:user/index.php");} ?>  

<!-- start container -->
<main role="main" class="container">
    <?php include("include/title.php") ;?>
    <!-- about -->
    <div class="my-3 p-3 bg-white rounded box-shadow">
        <div class="media text-muted pt-3">
        <img data-src="holder.js/32x32?theme=thumb&bg=007bff&fg=007bff&size=1" alt="" class="mr-2 rounded">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Match</strong>
            Welcome to Matcha the largest community of singles in the world. 
            Matcha is easy and fun,  use the "Like" feature to Like someone or the "Nope" feature to pass. 
            If someone likes you back, It’s a Match! 
        </p>
        </div>
        <div class="media text-muted pt-3">
        <img data-src="holder.js/32x32?theme=thumb&bg=e83e8c&fg=e83e8c&size=1" alt="" class="mr-2 rounded">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Chat</strong>
            We invented the double opt-in so that two people will only match when there’s a mutual interest.</br>
            No stress. No rejection. Just tap through the profiles you’re interested in and chat online with your matches.
        </p>
        </div>
        <div class="media text-muted pt-3">
        <img data-src="holder.js/32x32?theme=thumb&bg=6f42c1&fg=6f42c1&size=1" alt="" class="mr-2 rounded">
        <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
            <strong class="d-block text-gray-dark">Date</strong>
            Step away from your phone, meet up in the real world and spark something new.
        </p>
        </div>
        <small class="d-block text-right mt-3"></small>
    </div>

    <!-- slide -->
    <?php include("include/slide.php"); ?>
</main>

<!-- footer -->
<?php include("include/footer.php"); ?>
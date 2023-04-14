<?php

  require('../../app/init.php');

  // Check if user is logged in
  $session->is_logged_in();

  if($_SERVER['REQUEST_METHOD'] === "POST") {

    // Logout & destroy session info
    $session->logout();
    
    redirect('/users/login.php');
    
  }

?><!DOCTYPE html>
<html lang="en">
    <!-- Head-->
    <?php require(get_path('public/partials/head.php')); ?>
    <!-- End: Head -->

    <body class="flex flex-col min-h-screen mx-14 font-fira bg-navy text-white">

        <!-- Global Header -->
        <?php include(get_path('public/partials/header.php')); ?>
        <!-- End: Global Header -->

        <!-- Page Content -->
        <div class="flex-grow">
            <div class="container mx-auto py-16">

            <!-- Index Header -->
            <div class="grid grid-cols-12 border-b border-periwinkle pb-6">
                <div class="col-span-12 flex items-center">
                    <h1 class="font-bold text-4xl flex-grow">Log Out</h1>
                </div>
            </div>
            <!-- End: Index Header -->

            <!-- Logout Form -->
            <div class="grid grid-cols-12 mt-10">
                <div class="col-span-12">

                    <form action="<?php echo get_public_url('/users/logout.php'); ?>" method="POST">
                        <p class="mb-8">Are you sure you want to <strong>log out</strong>?</p>
                        <button class="bg-pink/90 hover:bg-pink hover:scale-105 rounded-full py-1 px-4 text-white text-lg font-bold" type="submit">Yes, I'm sure!</button>                        
                    </form>

                </div>
            </div>
            <!-- End: Logout Form -->          
        
        </div>
        </div>
        <!-- End: Page Content -->

        <!-- Global Footer -->
        <?php include(get_path('public/partials/footer.php')); ?>

    </body>

</html>
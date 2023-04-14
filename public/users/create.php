<?php

    require('../../app/init.php');

    if($_SERVER['REQUEST_METHOD'] === "POST") {

        // Create a new User object to create users in the db
        $user = new User($_POST);
        // Call the method
        $result = $user->create();

        // If signup successful, redirect users to login page
        if($result) {
            redirect('/users/login.php');
        // Otherwise display error message
        } else {
            $session->set_errors($user->errors);
        }

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

            <!-- Header -->
            <div class="grid grid-cols-12 border-b border-periwinkle pb-6">
                <div class="col-span-12 flex items-center">
                    <h1 class="font-bold text-4xl flex-grow">Sign Up</h1>
                </div>
            </div>
            <!-- End: Header -->

            <!-- Create Form -->
            <div class="grid grid-cols-12 mt-10">
                <div class="col-span-12">

                    <!-- Display error message -->
                    <?php echo $session->get_errors_html(); ?>

                    <!-- Important to use "POST" method as we are sending sensistive data -->
                    <form id="sign-up" action="<?php echo get_public_url('/users/create.php'); ?>" method="POST">
                        
                        <div class="mb-4">
                            <!-- Label provides context to the form -->
                            <!-- for attribute should be the same as the id attribute of the input to focus the input -->
                            <label class="block text-md font-bold mb-4" for="user_email">Email</label>
                            <input class="shadow border rounded w-full py-2 px-3 text-navy/60" id="user_email" type="email" name="email">
                        </div>      
                        
                        <div class="mb-4">
                            <label class="block text-md font-bold mb-4" for="user_name">Name</label>
                            <input class="shadow border rounded w-full py-2 px-3 text-navy/60" id="user_name" type="text" name="name">
                        </div>   

                        <div class="mb-4">
                            <label class="block text-md font-bold mb-4" for="user_password">Password</label>
                            <input class="shadow border rounded w-full py-2 px-3 text-navy/60" id="user_password" type="password" name="password">
                        </div>         

                        <div class="mb-4">
                            <label class="block text-md font-bold mb-4" for="retype_password">Re-type Password</label>
                            <input class="shadow border rounded w-full py-2 px-3 text-navy/60" id="retype_password" type="password" name="retype_password">
                        </div>                              
                        
                        <button class="bg-turquoise/90 hover:bg-turquoise hover:scale-105 rounded-full py-1 px-4 mt-6 text-white text-lg font-medium" type="submit">Sign Up</button>

                    </form>

                </div>
            </div>
            <!-- End: Create Form -->        
            
        </div>
        </div>
        <!-- End: Page Content -->

        <!-- Global Footer -->
        <?php include(get_path('public/partials/footer.php')); ?>

    </body>
</html>
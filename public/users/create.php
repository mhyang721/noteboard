<?php

    require('../../app/init.php');

    if($_SERVER['REQUEST_METHOD'] === "POST") {

        // Create a new User object to create users in the db
        $user = new User($_POST);
        // Call the method
        $user->create();

        redirect('/users/login.php');

    }

?><!DOCTYPE html>
<html lang="en">
    <!-- Head-->
    <?php require(get_path('public/partials/head.php')); ?>
    <!-- End: Head -->

    <body class="flex flex-col min-h-screen">

        <!-- Global Header -->
        <?php include(get_path('public/partials/header.php')); ?>
        <!--  End: Global Header -->

        <!-- Page Content -->
        <div class="flex-grow container mx-auto">
        <div class="max-w-screen-2xl px-8 mx-auto py-20">

            <!-- Index Header -->
            <div class="grid grid-cols-12 border-b pb-6">
            <div class="col-span-12 flex items-center">
                <h1 class="font-bold text-4xl flex-grow">Sign Up</h1>
            </div>
            </div>
            <!-- End: Index Header -->

            <!-- Create Form -->
            <div class="grid grid-cols-12 mt-10">
                <div class="col-span-12">

                    <!-- Important to use "POST" method as we are sending sensistive data -->
                    <form action="<?php echo get_public_url('/users/create.php'); ?>" method="POST">
                        
                        <div class="mb-4">
                            <!-- Label provides context to the form -->
                            <!-- for attribute should be the same as the id attribute of the input to focus the input -->
                            <label class="block text-sm font-bold mb-2" for="user_email">Email</label>
                            <input class="shadow border rounded w-full py-2 px-3 text-gray-700" id="user_email" type="email" name="email">
                        </div>      
                        
                        <div class="mb-4">
                            <label class="block text-sm font-bold mb-2" for="user_name">Name</label>
                            <input class="shadow border rounded w-full py-2 px-3 text-gray-700" id="user_name" type="text" name="name">
                        </div>   

                        <div class="mb-4">
                            <label class="block text-sm font-bold mb-2" for="user_password">Password</label>
                            <input class="shadow border rounded w-full py-2 px-3 text-gray-700" id="user_password" type="password" name="password">
                        </div>                              
                        
                        <button class="bg-emerald-500 rounded-full py-2 px-4 text-white font-bold" type="submit">Sign Up</button>

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
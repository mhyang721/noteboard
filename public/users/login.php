<?php

    require('../../app/init.php');

    // Check if a post request was sent
    if($_SERVER['REQUEST_METHOD'] === "POST") {

        // See if there is a user with the submitted email in our db
        $user = User::find_user_by_email($_POST['email']);

        // If 1 single user was found, continue to login
        if($user->num_rows === 1) {

            // Create a new user object with the returned data
            // $user->fetch_assoc() returns an associative array with the key-value pairs of the users in the db
            $user_obj = new User($user->fetch_assoc());
            
            // Validate password against the submitted password
            if($user_obj->validate_password($_POST['password'])) {

                // Call the login method of the session object
                // This saves the id returned from our $user->fetch_assoc() to the session
                $session->login($user_obj->id);

                // Redirect to homepage
                redirect('/');

            // Display error msg if password validation fails
            } else {
                $session->set_errors(["Incorrect email and/or password"]);
            }

        // Display msg if user is not found
        } else {
            $session->set_errors(["Incorrect email and/or password"]);
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
                    <h1 class="font-bold text-4xl flex-grow">Log In</h1>
                </div>
            </div>
            <!-- End: Header -->

            <!-- Login Form -->
            <div class="grid grid-cols-12 mt-10">
                <div class="col-span-12">

                    <!-- Display error message -->
                    <?php echo $session->get_errors_html(); ?>

                    <form id="log-in" action="<?php echo get_public_url('/users/login.php'); ?>" method="POST">

                        <div class="mb-4">
                            <label class="block text-md font-bold mb-4" for="user_email">Email</label>
                            <input class="shadow border rounded w-full py-2 px-3 text-navy/60" id="user_email" type="email" name="email">
                        </div>      
                        
                        <div class="mb-4">
                            <label class="block text-md font-bold mb-4" for="user_password">Password</label>
                            <input class="shadow border rounded w-full py-2 px-3 text-navy/60" id="user_password" type="password" name="password">
                        </div>             
                        
                        <button class="bg-turquoise/90 hover:bg-turquoise hover:scale-105 rounded-full py-1 px-4 mt-6 text-white text-lg font-medium" type="submit">Log In</button>                        
                    
                    </form>

                </div>
            </div>
            <!-- End: Login Form -->         
        
        </div>
        </div>
        <!-- End: Page Content -->

        <!-- Global Footer -->
        <?php include(get_path('public/partials/footer.php')); ?>

    </body>

</html>
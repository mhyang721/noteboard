<?php

    require('../../app/init.php');
    $title_tag = "Create Note";

    // Must be logged in to access this page
    $session->is_logged_in();

    // Check if data has been submitted to a page
    if(is_post_request()) {
        
        // Will return the user's user_id
        $user_id = $session->get_user_id();

        $args = $_POST;
        $args['user_id'] = $user_id;
        // Create a new note object from the form data
        // $_POST = PHP super global variable
        // It collects form data after subitting an HTML form with the method="post"
        // The information is passed via key/value pairs
        $note = new Note($args);

        // Call the create method 
        $result = $note->create();

        // If note created successful, redirect to homepage
        if($result) {
            redirect('/');
        // Otherwise display error message
        } else {
            $session->set_errors($note->errors);
        }
        
    }

?><!DOCTYPE html>
<html lang="en">
    <!-- Head-->
    <?php require(get_path('public/partials/head.php')); ?>
    <!-- End: Head -->

    <body class="flex flex-col min-h-screen mx-14 font-fira bg-navy text-white">

        <!-- Global Header -->
        <?php require(get_path('public/partials/header.php')); ?>
        <!--  End: Global Header -->

        <!-- Page Content -->
        <div class="flex-grow">
            <div class="container mx-auto py-16">

                <!-- Create Header -->
                <div class="grid grid-cols-12 border-b pb-6">
                    <div class="col-span-12 flex items-center">
                        <div class="flex-grow">
                            <p class="text-turquoise mb-6"><a class="text-periwinkle hover:text-periwinkle/80" href="<?php echo get_public_url('/'); ?>">notes.</a> / <span>create.</span></p>
                            <h1 class="font-bold text-4xl mt-2">create.</h1>
                        </div>
                    </div>
                </div>
                <!-- End: Create Header -->

                <!-- Create Form -->
                <div class="grid grid-cols-12 mt-10">
                    <div class="col-span-12">

                        <!-- Display error message -->
                        <?php echo $session->get_errors_html(); ?>

                        <!-- Add 'action' attribute so the form knows where to send data -->
                        <!-- Add 'method' attribute to specify the HTTP method used to send form data (either GET or POST) -->
                        <form id="create-note" action="<?php echo get_public_url('/notes/create.php'); ?>" method="POST">
                    
                            <!-- Text:input -->
                            <div class="mb-8">
                                    <!-- Add 'for' attribute -->
                                <label class="block text-md font-bold mb-4" for="note_name">Name</label>
                                    <!-- Add id and 'name' attribute -->
                                <input class="shadow border rounded w-full py-2 px-3 text-navy/60" id="note_name" type="text" name="name">
                            </div>
                            <!-- End text:input -->

                            <!-- Textarea -->
                            <div class="mb-8">
                                <label class="block text-md font-bold mb-4" for="note_body">Body</label>
                                <textarea class="shadow border rounded w-full py-2 px-3 text-navy/60  h-28" id="note_body" name="body"></textarea>
                            </div>
                            <!-- End textarea -->

                            <!-- Text:input -->
                            <div class="mb-8">
                                <label class="block text-md font-bold mb-4" for="note_course_number">Course Number</label>
                                <input class="shadow border rounded w-full py-2 px-3 text-navy/60 bg-white" id="note_course_number" type="text" name="course_number">
                            </div>
                            <!-- End text:input -->


                            <!-- Button -->
                            <button class="bg-turquoise/90 hover:bg-turquoise hover:scale-105 rounded-full py-1 px-4 text-white text-lg font-bold" type="submit">Save</button>
                            <!-- End button -->

                        </form>

                    </div>
                </div>
                <!-- End: Create Form -->

            </div>
        </div>
        <!-- End: Page Content -->

        <!-- Global Footer -->
        <?php require(get_path('public/partials/footer.php')); ?>
        <!-- End: Global Footer -->

    </body>
</html>
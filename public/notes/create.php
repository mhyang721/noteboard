<?php

    require('../../app/init.php');
    $title_tag = "Create Note";

    // Check if data has been submitted to a page
    if(is_post_request()) {
        
        // Create a new note object from the form data
        $note = new Note($_POST);

        // echo wrap_pre($note);
        // dd($_POST);

        // Call the create method that runs the SQL on the db
        $note->create();

        // Redirect to the home page.
        redirect("/");
        
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
                            <p class="text-turquoise mb-6"><a class="text-periwinkle" href="<?php echo get_public_url('/'); ?>">My Notes</a> / <span>Add New Note</span></p>
                            <h1 class="font-bold text-4xl mt-2">Add New Note</h1>
                        </div>
                    </div>
                </div>
                <!-- End: Create Header -->

                <!-- Create Form -->
                <div class="grid grid-cols-12 mt-10">
                    <div class="col-span-12">

                        <form action="<?php echo get_public_url('/notes/create.php'); ?>" method="POST">
                    
                            <!-- Text:input -->
                            <div class="mb-8">
                                <label class="block text-md font-bold mb-4" for="note_name">Name</label>
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
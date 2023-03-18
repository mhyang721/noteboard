<?php

    require('../../app/init.php');
    $title_tag = "Edit Note";

    // Checks if an id was passed in the url via the $_GET superglobal
    // If no value was assigned to id, it will be null
    $id = $_GET['id'] ?? null;
 
    // Call our find() method to retrieve the note from our database with the matching id value
	$note = Note::find($id);

    // If the form was submitted using $_POST,
    if(is_post_request()) {
	
        // the data from the form will be used to create a new Note object
        // This new Note object is just a containerto hold the
        // updated data that will be used to update the existing note
        $note = new Note($_POST);

        // Now we update the existing note
        $note->update();
     
        // Redirect to the homepage
        redirect('/');
     
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

                <!-- Edit Header -->
                <div class="grid grid-cols-12 border-b pb-6">
                    <div class="col-span-12 flex items-center">
                        <div class="flex-grow">
                            <p class="text-turquoise mb-6"><a class="text-periwinkle" href="<?php echo get_public_url('/'); ?>">My Notes</a> / <span>Edit Note</span></p>
                            <h1 class="font-bold text-4xl mt-2">Edit: <?php echo h($note['name']); ?></h1>
                        </div>
                    </div>
                </div>
                <!-- End: Edit Header -->

                <!-- Edit Form -->
                <div class="grid grid-cols-12 mt-10">
                    <div class="col-span-12">

                        <form action="<?php echo get_public_url('/notes/edit.php?id=' . h($note['id'])); ?>" method="POST">

                            <input type="hidden" name="id" value="<?php echo h($note['id']); ?>">
                            <!-- Text:input -->
                            <div class="mb-8">
                                <label class="block text-md font-bold mb-4" for="note_name">Name</label>
                                <input class="shadow border rounded w-full py-2 px-3 text-navy/60" id="note_name" type="text" name="name" value="<?php echo h($note['name']); ?>">
                            </div>
                            <!-- End text:input -->

                            <!-- Textarea -->
                            <div class="mb-8">
                                <label class="block text-md font-bold mb-4" for="note_body">Body</label>
                                <textarea class="shadow border rounded w-full py-2 px-3 text-navy/60  h-28" id="note_body" name="body"><?php echo h($note['body']); ?></textarea>
                            </div>
                            <!-- End: textarea -->

                            <!-- Text:input -->
                            <div class="mb-8">
                                <label class="block text-md font-bold mb-4" for="note_course_number">Course Number</label>
                                <input class="shadow border rounded w-full py-2 px-3 text-navy/60 bg-white" id="note_course_number" type="text" name="course_number" value="<?php echo h($note['course_number']); ?>">
                            </div>
                            <!-- End text:input -->

                            <!-- Button -->
                            <button class="bg-lt-blue/90 hover:bg-lt-blue hover:scale-105 rounded-full py-1 px-4 text-white text-lg font-bold">Save</button>
                            <!-- End button -->

                        </form>

                    </div>
                </div>
                <!-- End: Edit Form -->

            </div>
        </div>
        <!-- End Page Content -->

        <!-- Global Footer -->
        <?php require(get_path('public/partials/footer.php')); ?>
        <!-- End: Global Footer -->

    </body>
</html>
<?php

    require('../../app/init.php');
    $title_tag = "Delete Note";

    // GET requests pass information via the url
    $id = $_GET['id'] ?? '';
    if(!$id) redirect('/');
  
    // Check if user is logged in
    $session->is_logged_in();
    
    // Store the current session user_id in a var
    $user_id = $session->get_user_id();

    // Call our find() method to retrieve the note from our database with the matching id value
    $note = Note::find($id, $user_id);
    
    // This $note_record stores the note we intend to delete
    // with the matching id & user_id value from the Notes table in our database
    $note_record = Note::find($id, $user_id);

    if(is_post_request()) {

        $args = $_POST;
        $args['user_id'] = $user_id;
        // This $note_record is updated based on the id from the form submission POST method
        // $note_record = Note::find($_POST['id']);

        $note = new Note($note_record);

        // Now we delete the existing note
        $note->delete();

        // Redirect to the home page
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

                <div class="grid grid-cols-12 border-b pb-6">
                    <div class="col-span-12 flex items-center">
                        <div class="flex-grow">
                            <p class="text-pink mb-6"><a class="text-periwinkle" href="<?php echo get_public_url('/'); ?>">My Notes</a > / <span>Delete Note</span></p>
                            <h1 class="font-bold text-4xl mt-2">Delete: <?php echo h($note['name']); ?></h1>
                        </div>
                    </div>
                </div>
                <!-- End: Delete Header -->

                <!-- Delete Form -->
                <div class="grid grid-cols-12 mt-10">
                    <div class="col-span-12">
                        <form action="<?php echo get_public_url('/notes/delete.php?id=' . h($note_record['id'])); ?>" method="POST">
                            <p class="mb-8">Are you sure you want to delete <strong class="font-bold"><?php echo h($note_record['name']); ?></strong>?</p>
                            <input type="hidden" name="id" value="<?php echo h($note_record['id']); ?>">
                            <button class="bg-pink/90 hover:bg-pink hover:scale-105 rounded-full py-1 px-4 text-white text-lg font-bold">Yes, I'm sure</button>
                        </form>
                    </div>
                </div>
                <!-- End: Delete Form -->

            </div>
        </div>
        <!-- End: Page Content -->

        <!-- Global Footer -->
        <?php require(get_path('public/partials/footer.php')); ?>
        <!-- End: Global Footer -->

    </body>
</html>
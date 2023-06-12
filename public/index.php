<?php

    require('../app/init.php');
    $title_tag = "Notes Application";

    // Check if user is logged in
    $session->is_logged_in();

    // Get the current user_id
    $user_id = $session->get_user_id();

    // find_all() returns an array of Note objects where each object represents a record from the Notes table
    // The array is assigned to the $notes variable
    $notes = Note::find_all($user_id);

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

                <!-- Header -->
                <div class="grid grid-cols-12">
                    <div class="col-span-12 lg:col-start-2 lg:col-span-10 flex flex-col sm:flex-row items-start sm:items-center border-b border-periwinkle pb-6">
                        <h1 class="font-bold text-4xl flex-grow">my notes.</h1>
                        <a class="bg-turquoise/90 hover:bg-turquoise hover:scale-105 rounded-full py-1 px-4 mt-4 sm:mt-0 text-white text-lg font-medium" href="<?php echo get_public_url('/notes/create.php'); ?>">Add New</a>
                    </div>
                </div>
                <!-- End: Header -->

                <!-- Index Loop -->
                <div class="grid gap-6 grid-cols-12 mt-6 lg:px-20 xl:px-28">
                        <!-- fetch_assoc() returns each row of data from the database as an associative array -->
                        <!-- $notes holds the result set or collection of rows -->
                        <!-- $note holds data for each individual row as it is retrieved -->
                        <!-- All of this is looped to display each entry of the Notes table from the database -->
                    <?php while($note = $notes->fetch_assoc()):
                        require(get_path('public/partials/notes/card.php'));
                    endwhile; ?>
                </div>
                <!-- End: Index Loop -->

            </div>
        </div>
        <!-- End: Page Content -->

        <!-- Global Footer -->
        <?php require(get_path('public/partials/footer.php')); ?>
        <!-- End: Global Footer -->

    </body>
</html>
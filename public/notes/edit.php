<?php

    require('../../app/init.php');

    $id = $_GET['id'] ?? null;
 
	$note = Note::find($id);

    if(is_post_request()) {
	
        $note = new Note($_POST);
        $note->update();
     
        redirect('/');
     
    }

?><!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MDIA 3294 - Note Application - Edit Note</title>

        <!-- tailwindcss -->
        <script src="https://cdn.tailwindcss.com"></script>

    </head>

    <body class="flex flex-col min-h-screen">

        <!-- Global Menu & Logo -->
        <div class="border-b">
            <nav class="flex items-center justify-between py-6 container mx-auto">
                <div class="flex">
                    <a class="no-underline" href="<?php echo get_public_url('/'); ?>">
                        <span class="text-2xl font-bold">MDIA 3294: Notes Application</span>
                    </a>
                </div>

                <div class="w-full flex-grow flex items-center w-auto">
                    <ul class="list-reset flex justify-end flex-1 items-center">
                        <li>
                            <a class="inline-block py-2 no-underline font-bold text-purple-500" href="<?php echo get_public_url('/'); ?>">Notes</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!--  End: Global Menu & Logo -->

        <!-- Page Content -->
        <div class="flex-grow">
            <div class="container mx-auto py-20">

                <!-- Edit Header -->
                <div class="grid grid-cols-12 border-b pb-6">
                    <div class="col-span-12 flex items-center">
                        <div class="flex-grow">
                            <p class="text-slate-400"><a class="text-purple-500" href="<?php echo get_public_url('/'); ?>">My Notes</a> / <span>Edit Note</span></p>
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
                            <!-- Sample tailwind text:input -->
                            <div class="mb-4">
                                <label class="block text-sm font-bold mb-2" for="note_name">Name</label>
                                <input class="shadow border rounded w-full py-2 px-3 text-gray-700" id="note_name" type="text" name="name" value="<?php echo h($note['name']); ?>">
                            </div>
                            <!-- End Sample tailwind text:input -->

                            <!-- Sample tailwind textarea -->
                            <div class="mb-4">
                                <label class="block text-sm font-bold mb-2" for="note_body">Body</label>
                                <textarea class="shadow border rounded w-full py-2 px-3 text-gray-700  h-28" id="note_body" name="body"><?php echo h($note['body']); ?></textarea>
                            </div>
                            <!-- End Sample tailwind textarea -->

                            <!-- Sample tailwind text:input -->
                            <div class="mb-4">
                                <label class="block text-sm font-bold mb-2" for="note_course_number">Course Number</label>
                                <input class="shadow border rounded w-full py-2 px-3 text-gray-700 bg-white" id="note_course_number" type="text" name="course_number" value="<?php echo h($note['course_number']); ?>">
                            </div>
                            <!-- End Sample tailwind text:input -->

                            <!-- Sample tailwind button -->
                            <button class="bg-emerald-500 rounded-full py-2 px-4 text-white font-bold">Save</button>
                            <!-- End Sample tailwind button -->

                        </form>

                    </div>
                </div>
                <!-- End: Edit Form -->

            </div>
        </div>
        <!-- End Page Content -->

        <!-- Global Footer -->
        <div class="border-t text-center p-6">
            <p class="text-slate-400 text-md font-light"> &copy; 2022</p>
        </div>
        <!-- End: Global Footer -->

    </body>
</html>
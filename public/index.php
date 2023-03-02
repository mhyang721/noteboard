<?php

require('../app/init.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MDIA 3294 - Notes Application</title>

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

                <!-- Header -->
                <div class="grid grid-cols-12 border-b pb-6">
                    <div class="col-span-12 flex items-center">
                        <h1 class="font-bold text-4xl flex-grow">My Notes</h1>
                        <a class="bg-emerald-500 rounded-full py-2 px-4 text-white font-bold" href="<?php echo get_public_url('/notes/create.php'); ?>">Add New</a>
                    </div>
                </div>
                <!-- End: Header -->

                <!-- Index Loop -->
                <div class="grid gap-6 grid-cols-12 mt-6">
                    <article class="col-span-4">
                        <div class="rounded overflow-hidden shadow-lg border">
                            <div class="px-6 py-4">
                                <div class="flex items-center">
                                    <h3 class="font-bold text-2xl mb-1 flex-grow">Name</h3>
                                    <span class="text-white rounded-full text-sm bg-green-500 px-3 py-1">MDIA 3294</span>
                                    <a href="<?php echo get_public_url('/notes/edit.php'); ?>" class="text-white rounded-full text-sm bg-purple-500 px-3 py-1 ml-2">Edit</a>
                                    <a href="<?php echo get_public_url('/notes/delete.php'); ?>" class="text-white rounded-full text-sm bg-red-500 px-3 py-1 ml-2">Delete</a>
                                </div>
                                <p class="text-xl my-4">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, soluta? Lorem ipsum dolor sit. </p>
                            </div>
                        </div>
                    </article>
                </div>
                <!-- End: Index Loop -->

            </div>
        </div>
        <!-- End: Page Content -->

        <!-- Global Footer -->
        <div class="border-t text-center p-6">
            <p class="text-slate-400 text-md font-light"> &copy; 2022</p>
        </div>
        <!-- End: Global Footer -->

    </body>
</html>
<?php

  require('../../app/init.php');

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MDIA 3294 - Note Application - Delete Note</title>

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

            <!-- Delete Header -->
            <div class="grid grid-cols-12 border-b pb-6">
                <div class="col-span-12 flex items-center">
                    <div class="flex-grow">
                        <p class="text-slate-400"><a class="text-purple-500" href="<?php echo get_public_url('/'); ?>">My Notes</a > / <span>Delete Note</span></p>
                        <h1 class="font-bold text-4xl mt-2">Delete: {{ NOTE NAME }}</h1>
                    </div>
                </div>
            </div>
            <!-- End: Delete Header -->

            <!-- Delete Form -->
            <div class="grid grid-cols-12 mt-10">
                <div class="col-span-12">
                    <form>
                        <p class="mb-4">Are you sure you want to delete <strong class="font-bold">NOTE NAME</strong>?</p>
                        <input value="NOTE ID">
                        <button class="bg-red-500 rounded-full py-2 px-4 text-white font-bold">Yes, I'm sure</button>
                    </form>
                </div>
            </div>
            <!-- End: Delete Form -->

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
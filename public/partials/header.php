<!-- Header section that was separated from the public/index.php file to keep things organized -->
<div class="border-b border-pink">
    <nav class="flex items-center justify-between py-6 container mx-auto">
        <div class="flex">
            <a class="no-underline" href="<?php echo get_public_url('/'); ?>">
                <span class="text-2xl font-bold text-pink">MDIA 3294: Notes Application</span>
            </a>
        </div>

        <div class="w-full flex-grow flex items-center w-auto">
            <ul class="list-reset flex justify-end flex-1 items-center">
                <li>
                    <a class="inline-block py-2 no-underline font-bold text-periwinkle hover:text-periwinkle/90" href="<?php echo get_public_url('/'); ?>">My Notes</a>
                </li>
                <li class="ml-24">
                    <a class="inline-block py-2 no-underline font-bold text-periwinkle hover:text-periwinkle/90" href="<?php echo get_public_url('/notes/create.php'); ?>">New Note</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
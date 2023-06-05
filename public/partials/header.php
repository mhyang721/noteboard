<!-- Header section that was separated from the public/index.php file to keep things organized -->
<div class="border-b border-periwinkle">
    <nav class="flex items-center justify-between py-6 container mx-auto">
        <div class="flex">

            <!-- If user is not logged in, clicking the logo will take the user to the login page -->
            <?php if(is_null($session->get_user_id())): ?>

                <a class="no-underline" href="<?php echo get_public_url('/users/login.php'); ?>">
                    <span class="text-2xl font-bold text-periwinkle hover:text-periwinkle/80">noteboard.</span>
                </a>

            <!-- If user is logged in, clicking the logo will the user to their notes -->
            <?php else: ?>

                <a class="no-underline" href="<?php echo get_public_url('/'); ?>">
                    <span class="text-2xl font-bold text-periwinkle hover:text-periwinkle/80">noteboard.</span>
                </a>

            <?php endif; ?>

        </div>

        <div class="w-full flex-grow flex items-center w-auto">
            <ul class="list-reset flex justify-end flex-1 items-center">

                <!-- If user is not logged in, show Sign Up & Log In in header -->
                <?php if(is_null($session->get_user_id())): ?>

                    <li>
                        <a class="inline-block py-2 no-underline font-bold text-pink hover:text-pink/80" href="<?php echo get_public_url('/users/create.php'); ?>">sign up.</a>
                    </li>
                    <li>
                        <a class="inline-block py-2 no-underline font-bold text-pink hover:text-pink/80 ml-12" href="<?php echo get_public_url('/users/login.php'); ?>">log in.</a>
                    </li>

                <!-- If user is logged in, show Log Out & My Notes in header -->
                <?php else: ?>

                    <li>
                        <a class="inline-block py-2 no-underline font-bold text-pink hover:text-pink/80" href="<?php echo get_public_url('/users/logout.php'); ?>">logout.</a>
                    </li>                 
                    
                <?php endif; ?>

            </ul>
        </div>
    </nav>
</div>
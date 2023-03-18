<!-- Looped card that was separated from the public/index.php file to keep things organized -->
<article class="col-span-12 md:col-span-6 lg:col-span-4">
    <div class="rounded overflow-hidden shadow-lg border border-pink bg-periwinkle/10">
        <div class="px-6 py-6">
            <!-- <div class="flex items-center"> -->
            <div class="flex flex-col items-center text-center">
                <div class="flex mt-3 mb-12 font-medium">
                        <!-- This ensures the url reflects the note id being edited -->
                        <!-- h() is used to sanitize the url -->
                    <a href="<?php echo get_public_url('/notes/edit.php?id=' . h($note['id'])); ?>" class="text-white rounded-full text-lg bg-lt-blue/90 hover:bg-lt-blue hover:scale-105 px-4 py-1">Edit</a>
                        <!-- This ensures the url reflects the note being deleted -->
                        <!-- h() is used to sanitize the url -->
                    <a href="<?php echo get_public_url('/notes/delete.php?id=' . h($note['id'])); ?>" class="text-white rounded-full text-lg bg-pink/90 hover:bg-pink hover:scale-105 px-4 py-1 ml-6">Delete</a>
                </div>
                <h3 class="font-bold text-2xl flex-grow"><?php echo h($note['name']); ?></h3>
                <p class="text-base my-4"><?php echo h($note['body']); ?></p>
                <div class="text-navy font-medium rounded-full text-md bg-periwinkle px-4 py-1 my-3"><?php echo h($note['course_number']); ?></div>
            </div>
        </div>
    </div>
</article>
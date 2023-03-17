<article class="col-span-12 md:col-span-6 lg:col-span-4">
    <div class="rounded overflow-hidden shadow-lg border border-pink">
        <div class="px-6 py-6">
            <!-- <div class="flex items-center"> -->
            <div class="flex flex-col items-center">
                <div class="flex mt-2 mb-8">
                    <a href="<?php echo get_public_url('/notes/edit.php?id=' . h($note['id'])); ?>" class="text-white rounded-full text-sm bg-lt-blue px-3 py-1">Edit</a>
                    <a href="<?php echo get_public_url('/notes/delete.php?id=' . h($note['id'])); ?>" class="text-white rounded-full text-sm bg-pink px-3 py-1 ml-4">Delete</a>
                </div>
                <h3 class="font-bold text-2xl mb-1 flex-grow"><?php echo h($note['name']); ?></h3>
                <p class="text-xl my-4"><?php echo h($note['body']); ?></p>
                <span class="text-navy text-center font-medium rounded w-full text-sm bg-periwinkle px-3 py-1 mt-6"><?php echo h($note['course_number']); ?></span>
            </div>
        </div>
    </div>
</article>
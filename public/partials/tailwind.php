<!-- Tailwind scripts that were separated from the public/index.php file to keep things organized -->
<!-- <script src="https://cdn.tailwindcss.com"></script> -->

<!-- Added custom colours & Google font -->
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    'navy': '#201b2d',
                    'pink': '#ed9cc2',
                    'periwinkle': '#a0a5d6',
                    'turquoise': '#5eb3bc',
                    'lt-blue': '#7098d4',
                },
                fontFamily: {
                    'fira': ['Fira Code', 'serif']
                }
            }
        }
    }
</script>
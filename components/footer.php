<?php
// Function to determine the image path based on the current directory
function getSource() {
    $currentDir = dirname($_SERVER['PHP_SELF']); // Get the current directory path
    
    // Check if the current directory is 'pages'
    if (strpos($currentDir, 'pages') !== false) {
        return "../test";  // Path to use if inside the 'pages' directory
    } else {
        return "";  // Path to use if outside the 'pages' directory
    }
}
?>
</main>

<footer class="bg-black w-full h-20   flex justify-center items-center ">

		
                         <h6 class="text-white w-fit">YouCode © 2024</h6>

		</footer>
	
       
    

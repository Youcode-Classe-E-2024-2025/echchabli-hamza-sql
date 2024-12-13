<?php 
 include("data/createDATABase.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>

</head>
<body class="w-full h-full">
<header class="w-full  one h-20  px-8">
        
        <h1 class="text-4xl font-bold text-white w-1/4 ">
            <a href="http://localhost/echchabli-hamza-sql/index.php">JS</a>
        </h1>

        <!-- Navigation -->
        <nav class="flex justify-evenly  text-white text-lg font-medium w-2/4">
            <a href="http://localhost/echchabli-hamza-sql/pages/add.php" class="hover:text-gray-200 mr-40 cursor-pointer">ADD</a>
            <a href="http://localhost/echchabli-hamza-sql/pages/add.php" class="hover:text-gray-200">UPDATE</a>
        </nav>
    </header>

    <main class="w-full h-fit">
       
    

    <section class="w-full h-10 flex items-center mb-4">
            <div class="relative w-2/6 mx-auto mt-6 flex">
                <input type="text" placeholder="Search products"  class="w-full h-10 pl-4 pr-10 border border-[#EF8887] rounded-lg border-1" id="ProductInput"/>
                <div class="absolute inset-y-0 right-2 bottom-2  flex items-center">
                    <img src="img/image.png" class="object-cover h-6 cursor-pointer max-800:h-4"  alt="Search Icon" id="serachIcon">
                </div>
            </div>
        </section>

<?php


// echo"TTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTTT";


// include("components/search.php");

include("data/CRUD.php");


?>

<section id="displayP" class="   ">

    <?php 
    $res = getAll();
    include("components/card.php");
    foreach ($res as $row) {
       
            echo getPackageCard($row['package_name'] ,$row['package_description'] , $row['authors'] , $row['versions']);
        
    }
    ?>

</section>
<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="max-w-screen-md">
            <h2 class="mb-4 text-4xl  tracking-tight font-extrabold text-gray-900 dark:text-white">Let's find more that brings us together.</h2>
            <p class="mb-8 font-light text-gray-500 sm:text-xl dark:text-gray-400">Flowbite helps you connect with friends, family and communities of people who share your interests. Connecting with your friends and family as well as discovering new ones is easy with features like Groups, Watch and Marketplace.</p>
            <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0 sm:space-x-4">
                <a href="#" class="inline-flex items-center justify-center px-4 py-2.5 text-base font-medium text-center text-white bg-primary-700 rounded-lg hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Get started
                </a>
                <a href="#" class="inline-flex items-center justify-center px-4 py-2.5 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                    <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"></path></svg>
                    View more
                </a>  
            </div>
        </div>
    </div>
</section>

</main>


<?php

include("components/footer.php");

?>

<script src="js/script.js"></script>

</body>
</html>
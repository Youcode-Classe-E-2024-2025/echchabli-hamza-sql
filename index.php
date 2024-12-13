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
<header class="w-full h-20  px-8 bg-gradient-to-r from-purple-400 via-blue-500 to-purple-500 shadow-lg border-b-4 border-blue-300 flex items-center justify-between">
    <h1 class="text-4xl font-bold text-white">
        <a href="http://localhost/echchabli-hamza-sql/index.php" class="hover:text-blue-200 transition duration-300">JS</a>
    </h1>

    <!-- Navigation -->
    <nav class="flex space-x-8 text-white text-lg font-medium">
        <a href="http://localhost/echchabli-hamza-sql/pages/add.php" 
           class="hover:text-blue-200 hover:bg-white hover:bg-opacity-20 px-4 py-2 rounded transition duration-300">ADD</a>
    </nav>
</header>


    <main class="w-full h-fit">
       
    

    <section class="w-full h-10 flex items-center mb-4">
            <div class="relative w-2/6 mx-auto mt-6 flex ">
                <input type="text" placeholder="Search products"  class="w-full h-10 pl-4 pr-10 border-2 border-blue-900 rounded-lg focus:ring-2 focus:ring-blue-300" id="ProductInput"/>
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


</main>


<?php

include("components/footer.php");

?>

<script src="js/script.js"></script>

</body>
</html>
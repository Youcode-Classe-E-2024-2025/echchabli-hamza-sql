<?php

include("components/header.php");
include("components/search.php");

include("data/CRUD.php");


?>

<section id="displayP" class="">

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
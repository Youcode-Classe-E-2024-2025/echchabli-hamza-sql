<?php

include("components/header.php");

include("data/CRUD.php");


?>

<section id="displayP" class="">

    <?php 
    $res = getAll();
    include("components/card.php");
    foreach ($res as $row) {
        
        
            echo getPackageCard($row['nom'] ,$row['descriptionn'] , $row['auteur'] , $row['versio']);
        
        
    }
    ?>

</section>

</main>

<?php

include("components/footer.php");
?>
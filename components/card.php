<?php
function getPackageCard($name, $description, $author, $versions) {
    
    $card = '<div class="package-card">
                <h3>' . $name . '</h3>
                <p><strong>Description:</strong> ' . $description. '</p>
                <p><strong>Auteur:</strong> ' . str_replace(",", " / ", $author). '</p>
                <div class="versions">
                    <strong>Versions:</strong>';
            // $versions = explode(',', $versionsArray);
            
           
    // if (is_array($versions) && !empty($versions)) {
    //     foreach ($versions as $version) {
    //         echo "test " . $version ;
    //         if ($version) {
                $card .= '<span class="version-item">' .str_replace(",", " / ", $versions)  . '</span>';
    //         }
    //     }
    // } else {
      
    //     $card .= '<span class="version-item">No versions available</span>';
    // }

    $card .= '</div> </div>';

    return $card;
}

?>

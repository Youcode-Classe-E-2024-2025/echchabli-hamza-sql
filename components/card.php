<?php
function getPackageCard($name, $description, $author, $versions) {
    // Start the HTML for the card
    $card = '<div class="package-card">
                <h3>' . htmlspecialchars($name) . '</h3>
                <p><strong>Description:</strong> ' . htmlspecialchars($description) . '</p>
                <p><strong>Auteur:</strong> ' . htmlspecialchars($author) . '</p>
                <div class="versions">
                    <strong>Versions:</strong>';
    
    // Add each version to the card
    foreach ($versions as $version) {
        $card .= '<span class="version-item">' . htmlspecialchars($version) . '</span>';
    }

    // Close the HTML for the card
    $card .= '</div>';

    return $card;
}

?>

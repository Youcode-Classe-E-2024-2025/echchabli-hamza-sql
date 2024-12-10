<?php

include("../components/header.php");


include("../data/CRUD.php");


?>


<div class=" crud">
<button type="button" id="show_auteur_form" 
            class="buttonSize bg-blue-500 text-white px-6  py-2 rounded-lg hover:bg-blue-600 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-300"
            onclick="">
        Add Auteur
</button>
    
    <button type="button" id="show_package_form" 
            class="buttonSize bg-blue-500 text-white px-6  py-2 rounded-lg hover:bg-blue-600 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-300"
            onclick="">
        Add Package
    </button>

    <button type="button" id="show_version_form"       
            class="buttonSize bg-green-500   text-white px-6 py-2  rounded-lg hover:bg-green-600 transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-green-300"
            onclick="">
        Add Version
    </button>
</div>

<form action="../data/process_auteur_form.php" method="POST" id="auteur_form"  class="data_form ">

<fieldset>
    <legend>Auteur Information</legend>
    <label for="auteur_nom">Name:</label>
    <input type="text" id="auteur_nom" name="auteur_nom" required><br><br>

    <label for="auteur_email">Email:</label>
    <input type="email" id="auteur_email" name="auteur_email" required><br><br>
</fieldset>






<button type="submit" class="buttonSize">Submit</button>
</form>


<form action="../data/process_package_form.php" method="POST" id="package_form"  class="data_form hidden ">
        <fieldset>
            <legend>package Information</legend>
            <label for="package_nom">nome:</label>
            <label for="auteur_nom">Select Author:</label>
            <select id="drop_Down" name="auteur_nom" required></select>
            <input type="text" id="package_nom" name="package_nom" required><br><br>
            <label for="package_description">description:</label>
            <input type="text" id="package_description" name="package_description" required><br><br>

        </fieldset>
        <button type="submit" class="buttonSize" >Submit</button>
</form>


<form action="../data/process_version_form.php" method="POST" id="version_form" class="data_form hidden">

      <fieldset>
        <legend>Add Version</legend>

        <label for="version_number">Version Number:</label>
        <input type="text" id="version_number" name="version_number" required><br><br>

        <label for="package_nom">Package Name:</label>
        <input type="text" id="package_nom" name="package_nom" required><br><br>


        <label for="release_date">Release Date:</label>
        <input type="date" id="release_date" name="release_date" required><br><br>

    </fieldset>

    <button type="submit" class="buttonSize">Submit</button>
</form>


   


<?php

include("../components/footer.php");
?>

 <script src="../js/crud.js"></script>
</body>
</html>
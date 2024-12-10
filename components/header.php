<?php
// Function to determine the image path based on the current directory

function getCssSource() {
    $currentDir = dirname($_SERVER['PHP_SELF']); // Get the current directory path
    
    // Check if the current directory is 'pages'
    if (strpos($currentDir, 'pages') !== false) {
        return "../";  // Path to use if inside the 'pages' directory
    } else {
        return "";  // Path to use if outside the 'pages' directory
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo getCssSource() . 'css/output.css'; ?>">
    <link rel="stylesheet" href="<?php echo getCssSource() . 'css/card.css'; ?>">
    <link rel="stylesheet" href="<?php echo getCssSource() . 'css/style.css'; ?>">
   
    <title>Document</title>
</head>
<body class="w-full h-full">
    <header class="w-full bg-[#EF8887] h-20 flex justify-around items-center">
        <h1 class="text-6xl font-bold text-white"><a href="http://localhost/echchabli-hamza-sql/index.php">JS</a></h1>
        <nav class="flex justify-around items-center w-2/5 font-medium text-white text-xl">
            <div><a href="http://localhost/echchabli-hamza-sql/pages/add.php">ADD</a></div>
           
        </nav>
    </header>

    <main class="w-full h-fit">
       
    


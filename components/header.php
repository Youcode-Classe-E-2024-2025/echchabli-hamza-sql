<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/output.css">
    <link rel="stylesheet" href="css/card.css">
    <title>Document</title>
    
</head>
<body class=" w-full h-full">
    <header class="w-full bg-[#EF8887] h-20 flex justify-around items-center ">
        <h1 class="text-6xl  font-bold text-white ">JS</h1>
        <nav class="flex justify-around items-center w-2/5 font-medium text-white text-xl">
            <div>ADD</div>
            <div>UPDATE</div>
            <div>DELETE</div>
        </nav>

    </header>

    <main class=" w-full h-fit ">
        <section class="w-full h-10 flex items-center " id="search">
            <div class="relative w-2/6 mx-auto mt-6 flex">
                <input type="text" placeholder="Search products"  class="w-full h-10 pl-4 pr-10 border border-[#EF8887] rounded-lg border-1" id="ProductInput"/>
                <div class="absolute inset-y-0 right-2 flex items-center">
                    <img src="img/image.png" class="object-cover h-2/3 cursor-pointer max-800:h-4"  alt="Search Icon" id="serachIcon">
                </div>
            </div>
        </section>
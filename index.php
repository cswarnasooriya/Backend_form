<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form - Backend Task</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <!-- i using tailwind css playcdn for that styling also -->

</head>


<body class="bg-gray-200 flex items-center justify-center min-h-screen">
    <form action="submit.php" method="post" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
        <h1 class="text-2xl font-bold mb-4 pl-16 items-center text-gray-900">Backend Task Form</h1>
        <div class="mb-4">

            <label for="name" class="block text-gray-700">Enter Name:</label>
            <input type="text" id="name" name="name" required class="w-full p-2 border border-gray-300 rounded mt-1">

        </div>

        <div class="mb-4">

            <label for="email" class="block text-gray-700">Enter Email:</label>
            <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded mt-1">

        </div>

        <div class="mb-4">

            <label for="message" class="block text-gray-700">Type your Message:</label>
            <textarea id="message" name="message" required class="w-full p-2 border border-gray-300 rounded mt-1"></textarea>

        </div>


        <div class="mb-4">

            <label for="file" class="block text-gray-700">Upload File Here:</label>
            <input type="file" id="file" name="file" required class="w-full p-2 border border-gray-300 rounded mt-1">

        </div>


        <div>

            <button type="submit" class="w-full bg-green-300 text-black font-bold py-2 rounded hover:bg-blue-400">Submit</button>

        </div>
    </form>
</body>
</html>

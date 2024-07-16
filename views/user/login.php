<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-8 space-y-6 bg-white rounded-lg shadow-md">
        <?php if (!empty($errors)) : ?>
            <div class="text-red-500">
                <?php foreach ($errors as $error) : ?>
                    <p><?php echo $error; ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <h2 class="text-2xl font-bold text-center">Welcome Login</h2>
        <div class="md:w-1/2 p-2">
            <img src="../../../public/src/login.png" alt="" class="w-full h-auto rounded shadow-lg" srcset="">

        </div>

        <form method="POST" action="/public/index.php?action=login" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="username" id="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">password</label>
                <input type="password" name="password" id="reason" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required></textarea>
            </div>
            <div class="flex justify-center">
                <input type="submit" value="Login" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            </div>
        </form>


    </div>
</body>

</html>
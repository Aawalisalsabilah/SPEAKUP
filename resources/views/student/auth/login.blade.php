<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Mahasiswa - SPEAKUP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="bg-white shadow-lg p-8 w-96 rounded-xl">
        <h1 class="text-2xl font-bold mb-6 text-center text-red-700">Login Mahasiswa</h1>

        @if (session('error'))
            <div class="bg-red-200 text-red-800 p-3 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <label class="block mb-2 font-semibold">NIM</label>
            <input type="text" name="nim" class="w-full px-3 py-2 border rounded mb-4" required>

            <label class="block mb-2 font-semibold">Password</label>
            <input type="password" name="password" class="w-full px-3 py-2 border rounded mb-6" required>

            <button class="w-full bg-red-700 hover:bg-red-800 text-white py-2 rounded-lg">
                Login
            </button>
        </form>
    </div>

</body>
</html>

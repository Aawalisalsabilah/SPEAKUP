<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login SPEAKUP</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">

    <div class="bg-white shadow-lg p-8 w-96 rounded-xl">

        <h1 class="text-2xl font-bold mb-6 text-center text-red-600">
            Login SPEAKUP
        </h1>

        @if (session('error'))
            <div class="bg-red-200 text-red-800 p-3 mb-4 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <!-- ROLE SELECTION -->
            <label class="font-semibold">Login Sebagai</label>
            <select name="role"
                    class="w-full px-3 py-2 border rounded mb-4"
                    required>
                <option value="student">Mahasiswa</option>
                <option value="admin">Admin Kampus</option>
            </select>

            <label class="font-semibold">Username</label>
            <input type="text"
                   name="username"
                   class="w-full px-3 py-2 border rounded mb-4"
                   placeholder="NIM / Kode Pegawai"
                   required>

            <label class="font-semibold">Password</label>
            <input type="password"
                   name="password"
                   class="w-full px-3 py-2 border rounded mb-6"
                   required>

            <button class="w-full bg-red-600 text-white py-2 rounded-lg hover:bg-red-700">
                Login
            </button>
        </form>

    </div>

</body>
</html>

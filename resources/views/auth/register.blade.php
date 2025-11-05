<!DOCTYPE html>
<html lang="uz">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | Sahifa Topilmadi</title>
    <!-- Tailwind CSS CDN orqali yuklanadi -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Shrift va asosiy stil */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@700;900&family=Inter:wght@400;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6; /* Engil kulrang fon */
        }
        
        /* 404 raqami uchun maxsus stil */
        .error-number {
            font-family: 'Poppins', sans-serif;
            text-shadow: 
                0 0 5px rgba(255, 255, 255, 0.8),
                0 0 10px rgba(79, 70, 229, 0.5); /* Indigo rangida yengil soya */
            background: linear-gradient(135deg, #6366f1, #3b82f6); /* Chiroyli gradient */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Tugma uchun stil */
        .action-button {
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(79, 70, 229, 0.3);
        }
        .action-button:hover {
            box-shadow: 0 6px 20px rgba(79, 70, 229, 0.5);
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-6 text-center">

    <div class="max-w-xl mx-auto">
        
        <!-- Katta xato raqami -->
        <h1 class="error-number text-9xl md:text-[12rem] font-black leading-none">
            404
        </h1>
        
        <!-- Asosiy xabar -->
        <div class="mt-6">
            <h2 class="text-4xl md:text-5xl font-extrabold text-gray-800 tracking-tight">
                Uzr, bu sahifa topilmadi.
            </h2>
            <p class="mt-4 text-lg text-gray-600">
                Siz qidirayotgan manzil o‘zgartirilgan, o‘chirilgan yoki noto‘g‘ri kiritilgan bo‘lishi mumkin.
            </p>
        </div>

        <!-- Qo'shimcha ma'lumot (Ixtiyoriy) -->
        <div class="mt-8 p-6 bg-white border border-gray-200 rounded-xl shadow-lg">
            <p class="text-sm text-gray-500">
                Agar siz saytning asosiy menyusidan foydalanishni istasangiz, quyidagi tugmani bosing.
            </p>
        </div>

        <!-- Asosiy harakat tugmasi -->
        <div class="mt-10">
            <a href="/" class="inline-flex items-center px-8 py-4 border border-transparent text-lg font-semibold rounded-full text-white bg-indigo-600 hover:bg-indigo-700 action-button focus:outline-none focus:ring-4 focus:ring-indigo-500 focus:ring-opacity-50 transition duration-150 ease-in-out">
                <svg class="w-5 h-5 mr-3 -ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                Asosiy Sahifaga Qaytish
            </a>
        </div>
        
    </div>

</body>
</html>

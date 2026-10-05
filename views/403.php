<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forbidden | I'm Testing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        .book-page {
            background-color: #FDFBF5;
            background-image: linear-gradient(to bottom, transparent 27px, #e8e4d8 28px);
            background-size: 100% 28px;
            background-origin: content-box;
        }
    </style>
</head>
<body class="flex min-h-screen flex-col bg-[#EFEAE2] antialiased text-stone-800">

    <?php require __DIR__ . '/partials/nav.php'; ?>

    <main class="flex flex-1 items-center justify-center px-6 py-10">
        <div class="book-page relative overflow-hidden rounded-r-md rounded-l-sm border border-stone-300/80 shadow-[2px_3px_0_rgba(120,100,80,0.18),4px_4px_12px_rgba(120,100,80,0.10)] max-w-xl w-full text-center px-6 py-14">

            <!-- Notebook binding edge + red margin line -->
            <span class="absolute inset-y-0 left-0 w-[22px] bg-gradient-to-r from-stone-200/70 via-[#F5EFDF]/40 to-transparent"></span>
            <span class="absolute inset-y-0 left-[26px] w-px bg-rose-200/90"></span>
            <!-- Punch holes -->
            <span class="absolute top-6 left-[7px] h-2.5 w-2.5 rounded-full border border-stone-300/70 bg-[#EFEAE2]"></span>
            <span class="absolute left-[7px] top-1/2 h-2.5 w-2.5 -translate-y-1/2 rounded-full border border-stone-300/70 bg-[#EFEAE2]"></span>
            <span class="absolute bottom-6 left-[7px] h-2.5 w-2.5 rounded-full border border-stone-300/70 bg-[#EFEAE2]"></span>

            <p class="text-xs uppercase tracking-widest text-rose-400" style="font-family:'Lora', serif;">Error 403</p>
            <h1 class="mt-3 text-4xl tracking-tight text-stone-800" style="font-family:'Lora', serif;">
                Forbidden
            </h1>
            <p class="mt-4 text-[15px] leading-[28px] text-stone-600" style="font-family:'Caveat', cursive;">
                This page is closed with a padlock — you don't have permission to read it.
            </p>
            <div class="mt-8">
                <a href="/" class="inline-flex items-center gap-1.5 rounded-lg border border-stone-300 bg-stone-100 px-5 py-2.5 text-sm font-medium text-stone-700 hover:bg-stone-200 transition-colors" style="font-family:'Lora', serif;">
                    Back to Home
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
            </div>
        </div>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>

</body>
</html>

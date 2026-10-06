<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($note['author']) ?>'s Note | I'm Testing</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@500;600&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        .book-page {
            background-color: #FDFBF5;
            background-image: linear-gradient(to bottom, transparent 31px, #e8e4d8 32px);
            background-size: 100% 32px;
            background-origin: content-box;
        }
    </style>
</head>
<body class="flex min-h-screen flex-col bg-[#EFEAE2] antialiased text-stone-800">

    <?php require __DIR__ . '/../partials/nav.php'; ?>

    <main class="mx-auto w-full max-w-3xl flex-1 px-6 py-10">

        <a href="/" class="inline-flex items-center gap-1 text-sm text-stone-500 hover:text-stone-800 transition-colors" style="font-family:'Lora', serif;">
            &larr; Back to Notes
        </a>

        <article class="book-page relative mt-6 min-h-[60vh] overflow-hidden rounded-r-md rounded-l-sm border border-stone-300/80 shadow-[2px_3px_0_rgba(120,100,80,0.18),4px_4px_12px_rgba(120,100,80,0.10)]">

            <!-- Notebook binding edge + red margin line -->
            <span class="absolute inset-y-0 left-0 w-[22px] bg-gradient-to-r from-stone-200/70 via-[#F5EFDF]/40 to-transparent"></span>
            <span class="absolute inset-y-0 left-[26px] w-px bg-rose-200/90"></span>
            <!-- Punch holes -->
            <span class="absolute top-6 left-[7px] h-2.5 w-2.5 rounded-full border border-stone-300/70 bg-[#EFEAE2]"></span>
            <span class="absolute left-[7px] top-1/2 h-2.5 w-2.5 -translate-y-1/2 rounded-full border border-stone-300/70 bg-[#EFEAE2]"></span>
            <span class="absolute bottom-6 left-[7px] h-2.5 w-2.5 rounded-full border border-stone-300/70 bg-[#EFEAE2]"></span>

            <header class="flex items-baseline justify-between border-b border-dashed border-stone-200/80 pl-10 pr-6 pt-6 pb-4">
                <span class="text-xs uppercase tracking-widest text-stone-400" style="font-family:'Lora', serif;">
                    Note #<?= str_pad((string)$note['id'], 2, '0', STR_PAD_LEFT) ?>
                </span>
                <span class="text-[11px] text-stone-400" style="font-family:'Lora', serif;">
                    by <?= htmlspecialchars($note['author']) ?>
                </span>
            </header>

            <div class="px-8 py-8 pl-12">
                <p class="text-[17px] leading-[32px] text-stone-700 whitespace-pre-wrap" style="font-family:'Caveat', cursive;">
                    <?= htmlspecialchars($note['body']) ?>
                </p>
            </div>

            <footer class="flex items-center justify-between border-t border-dashed border-stone-200/80 pl-10 pr-6 py-3">
                <span class="text-[11px] text-stone-400" style="font-family:'Lora', serif;">
                    written in the notebook
                </span>
                <div class="flex items-center gap-4">
                    <a href="/note/edit/<?= $note['id'] ?>" class="text-xs text-stone-400 hover:text-stone-800 transition-colors" style="font-family:'Lora', serif;">
                        edit
                    </a>
                    <form action="/note/delete/<?= $note['id'] ?>" method="POST" onsubmit="return confirm('Tear out this page permanently?')">
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="text-xs text-stone-400 hover:text-rose-500 transition-colors" style="font-family:'Lora', serif;">
                            delete
                        </button>
                    </form>
                </div>
            </footer>
        </article>

    </main>

    <?php require __DIR__ . '/../partials/footer.php'; ?>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learning App</title>
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

    <?php
        $notes = $notes ?? [];
        $noteCount = count($notes);
    ?>

    <main class="mx-auto w-full max-w-6xl flex-1 px-6 py-10">
        <header class="mb-8">
            <h1 class="text-3xl tracking-tight text-stone-800" style="font-family:'Lora', serif;">
                My Notes
            </h1>
            <p class="mt-1 text-sm text-stone-500" style="font-family:'Lora', serif;">
                <?= $noteCount ?> note<?= $noteCount === 1 ? '' : 's' ?> in the book
            </p>
        </header>

        <?php if (empty($notes)): ?>
            <div class="mt-8 rounded-xl border border-dashed border-stone-300 bg-[#FDFBF5] p-12 text-center" style="font-family:'Lora', serif;">
                <p class="italic text-stone-600">This page is still blank...</p>
                <p class="mt-1 text-sm text-stone-500">Write your first note to fill it in.</p>
            </div>
        <?php else: ?>
            <ul class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($notes as $index => $note): ?>
                    <li>
                        <a href="/note?id=<?= $note['id'] ?>" class="book-page group relative flex h-56 flex-col overflow-hidden rounded-r-md rounded-l-sm border border-stone-300/80 shadow-[2px_3px_0_rgba(120,100,80,0.18),4px_4px_12px_rgba(120,100,80,0.10)] transition-transform duration-200 hover:-translate-y-1 hover:shadow-[3px_4px_0_rgba(120,100,80,0.22),6px_6px_14px_rgba(120,100,80,0.14)]">

                            <!-- Notebook binding edge + red margin line -->
                            <span class="absolute inset-y-0 left-0 w-[22px] bg-gradient-to-r from-stone-200/70 via-[#F5EFDF]/40 to-transparent"></span>
                            <span class="absolute inset-y-0 left-[26px] w-px bg-rose-200/90"></span>
                            <!-- Punch holes -->
                            <span class="absolute top-6 left-[7px] h-2.5 w-2.5 rounded-full border border-stone-300/70 bg-[#EFEAE2]"></span>
                            <span class="absolute left-[7px] top-1/2 h-2.5 w-2.5 -translate-y-1/2 rounded-full border border-stone-300/70 bg-[#EFEAE2]"></span>
                            <span class="absolute bottom-6 left-[7px] h-2.5 w-2.5 rounded-full border border-stone-300/70 bg-[#EFEAE2]"></span>

                            <div class="flex items-baseline justify-between pl-10 pr-5 pt-5">
                                <span class="text-xs uppercase tracking-widest text-stone-400" style="font-family:'Lora', serif;">
                                    Note #<?= str_pad((string)($index + 1), 2, '0', STR_PAD_LEFT) ?>
                                </span>
                            </div>

                            <div class="mt-2 flex-1 pb-4 pl-10 pr-5">
                                <p class="line-clamp-5 text-[15px] leading-[28px] text-stone-700" style="font-family:'Caveat', cursive;">
                                    <?= htmlspecialchars($note['body']) ?>
                                </p>
                            </div>

                            <div class="flex items-center justify-between border-t border-dashed border-stone-200/80 pl-10 pr-5 py-2.5">
                                <span class="text-[11px] text-stone-400" style="font-family:'Lora', serif;">
                                    by <?= htmlspecialchars($note['author'] ?? '') ?>
                                </span>
                                <span class="text-xs text-stone-400 opacity-0 transition-opacity group-hover:opacity-100" style="font-family:'Lora', serif;">
                                    read &rarr;
                                </span>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </main>

    <?php require __DIR__ . '/partials/footer.php'; ?>

</body>
</html>

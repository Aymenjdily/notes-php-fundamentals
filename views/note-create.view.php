<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Note | I'm Testing</title>
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
        .book-page textarea {
            background-image: linear-gradient(to bottom, transparent 31px, #e8e4d8 32px);
            background-size: 100% 32px;
            background-attachment: local;
            line-height: 32px;
            font-family: 'Caveat', cursive;
        }
    </style>
</head>
<body class="flex min-h-screen flex-col bg-[#EFEAE2] antialiased text-stone-800">

    <?php require __DIR__ . '/partials/nav.php'; ?>

        <main class="mx-auto w-full max-w-3xl flex-1 px-6 py-10">

            <a href="/" class="inline-flex items-center gap-1 text-sm text-stone-500 hover:text-stone-800 transition-colors" style="font-family:'Lora', serif;">
                &larr; Back to Notes
            </a>

            <article class="book-page relative mt-6 min-h-[55vh] flex flex-col overflow-hidden rounded-r-md rounded-l-sm border border-stone-300/80 shadow-[2px_3px_0_rgba(120,100,80,0.18),4px_4px_12px_rgba(120,100,80,0.10)]">

                <!-- Notebook binding edge + red margin line -->
                <span class="absolute inset-y-0 left-0 w-[22px] bg-gradient-to-r from-stone-200/70 via-[#F5EFDF]/40 to-transparent"></span>
                <span class="absolute inset-y-0 left-[26px] w-px bg-rose-200/90"></span>
                <!-- Punch holes -->
                <span class="absolute top-6 left-[7px] h-2.5 w-2.5 rounded-full border border-stone-300/70 bg-[#EFEAE2]"></span>
                <span class="absolute left-[7px] top-1/2 h-2.5 w-2.5 -translate-y-1/2 rounded-full border border-stone-300/70 bg-[#EFEAE2]"></span>
                <span class="absolute bottom-6 left-[7px] h-2.5 w-2.5 rounded-full border border-stone-300/70 bg-[#EFEAE2]"></span>

                <header class="flex items-baseline justify-between border-b border-dashed border-stone-200/80 pl-10 pr-6 pt-6 pb-4">
                    <span class="text-xs uppercase tracking-widest text-stone-400" style="font-family:'Lora', serif;">
                        New Page
                    </span>
                </header>

                <form method="POST" autocomplete="off" class="flex flex-1 flex-col px-8 py-6 pl-12" style="font-family:'Lora', serif;">
                    <label for="body" class="text-sm font-medium text-stone-500">
                        Write your note below
                    </label>
                    <textarea name="body" id="body"
                        class="mt-3 flex-1 resize-none bg-transparent text-[17px] text-stone-700 outline-none placeholder:text-stone-400"
                        placeholder="Once upon a page..."
                        rows="10"
                    >
                    <?= $_POST['body'] ?? '' ?>
                    </textarea>
                    <?php if (isset($errors['body'])) : ?>
                        <p class="mt-2 text-xs font-medium text-rose-500" style="font-family:'Lora', serif;">
                            <?= htmlspecialchars($errors['body']) ?>
                        </p>
                    <?php endif; ?>

                    <div class="flex items-center justify-end gap-3 border-t border-dashed border-stone-200/80 pt-4">
                        <a href="/" class="rounded-lg px-4 py-2.5 text-sm text-stone-500 hover:text-stone-800 transition-colors">
                            Cancel
                        </a>
                        <button type="submit" class="inline-flex items-center gap-2 rounded-lg border border-stone-300 bg-stone-100 px-5 py-2.5 text-sm font-medium text-stone-700 shadow-[2px_2px_0_rgba(120,100,80,0.15)] transition-all hover:bg-stone-200 hover:shadow-[2px_3px_0_rgba(120,100,80,0.2)] hover:-translate-y-0.5 active:translate-y-0 active:shadow-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-rose-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            Save Note
                        </button>
                    </div>
                </form>
            </article>

        </main>

        <?php require __DIR__ . '/partials/footer.php'; ?>

</body>
</html>

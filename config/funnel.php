<?php

/*
|--------------------------------------------------------------------------
| Sales Funnel Content (REIGNITE)
|--------------------------------------------------------------------------
| Content for the standalone sales-funnel landing page served at /funnel.
| Edit the copy here; the page reads it via config('funnel').
*/

return [
    'meta' => [
        'title' => 'REIGNITE — 7 Conversations That Bring Couples Back to Each Other',
        'description' => 'A therapist-designed guide built around 7 simple conversations — proven to rebuild trust, intimacy and connection in as little as 21 days.',
    ],

    'nav' => [
        'brand1' => 'REIGNITE', 'brand2' => '.', 'cta_label' => 'Get the Book →',
        'links' => [
            ['label' => 'The Book', 'href' => '#book'],
            ['label' => 'Chapters', 'href' => '#chapters'],
            ['label' => 'Author', 'href' => '#author'],
            ['label' => 'Reviews', 'href' => '#reviews'],
            ['label' => 'Order', 'href' => '#order'],
        ],
    ],

    'announcement' => ['text' => 'New release · 38,000+ copies sold · Free shipping ends Sunday'],

    'hero' => [
        'badge' => '#1 RELATIONSHIP BESTSELLER · 2026',
        'headline' => 'Stop drifting apart.',
        'headline_italic' => 'Reignite',
        'headline_after' => ' what made you fall in love.',
        'subhead' => 'A therapist-designed guide built around 7 simple conversations — proven to rebuild trust, intimacy, and connection in as little as 21 days. No counseling office required.',
        'cta_primary' => 'Get Your Copy — $19',
        'cta_secondary' => '📖 Read a free chapter',
        'perks' => ['✓ Free worldwide shipping', '✓ 60-day refund'],
        'rating' => '4.9',
        'rating_count' => 'From 12,400+ verified readers',
        'book_title_top' => 'RE',
        'book_title_italic' => 'IG',
        'book_title_bottom' => 'NITE',
        'book_tagline' => "7 Conversations That Bring\nCouples Back to Each Other",
        'book_author' => 'Dr. Sarah Holloway',
        'badge_top' => ['kicker' => 'As featured on', 'value' => 'TODAY Show'],
        'badge_bottom' => '#1 in Marriage & LT Relationships',
    ],

    'social_proof' => [
        'label' => 'Featured in',
        'items' => ['The New York Times', 'Oprah Daily', 'TODAY', 'Psychology Today', 'Goodreads'],
    ],

    'for_you' => [
        'kicker' => 'Is this book for you?',
        'headline' => 'If ', 'headline_italic' => 'any of these', 'headline_after' => ' sound familiar…',
        'subhead' => "…you're not broken. And neither is your relationship. You just need the right conversations — in the right order.",
        'items' => [
            ['emoji' => '💔', 'title' => 'You feel more like roommates', 'desc' => "The spark, the laughter, the late-night talks — they've quietly faded into routine and exhaustion."],
            ['emoji' => '🔇', 'title' => 'The same fights, on repeat', 'desc' => 'You both know exactly how it ends — but neither of you knows how to stop the loop.'],
            ['emoji' => '🕊️', 'title' => 'Walking on eggshells', 'desc' => 'You censor what you really feel because every honest conversation seems to turn into conflict.'],
            ['emoji' => '😴', 'title' => 'Intimacy feels distant', 'desc' => 'The physical and emotional closeness you used to share now feels effortful or out of reach.'],
        ],
    ],

    'chapters' => [
        'kicker' => 'Inside the Book',
        'headline' => '7 conversations. ', 'headline_italic' => '196 pages.', 'headline_after' => ' One stronger relationship.',
        'items' => [
            ['n' => '01', 'title' => 'The Drift', 'sub' => 'Why love quietly fades — and how to spot it early', 'page' => 14, 'learn' => 'The exact 3-question opener that disarms even the most heated conversation.', 'includes' => 'Real transcript from a couple who used this chapter to rebuild after 7 years.', 'tonight' => 'A 15-minute exercise you can do together before bed — no prep needed.'],
            ['n' => '02', 'title' => 'The Mirror Conversation', 'sub' => 'How to be heard without making your partner defensive', 'page' => 38, 'learn' => 'The phrasing that lets your partner feel understood before you state your case.', 'includes' => 'Word-for-word scripts for the five most common flashpoints.', 'tonight' => 'Trade one "mirror statement" each before you discuss anything hard.'],
            ['n' => '03', 'title' => 'The Apology That Works', 'sub' => 'The 4-part formula that actually repairs trust', 'page' => 62, 'learn' => 'Why most apologies backfire — and the 4 parts that make one land.', 'includes' => 'A printable apology template you can keep on your phone.', 'tonight' => 'Offer one real apology using the formula — and watch what shifts.'],
            ['n' => '04', 'title' => "The 'What You Don't Know' Talk", 'sub' => "Surfacing the resentments you've buried for years", 'page' => 88, 'learn' => 'How to name a buried resentment without starting a war.', 'includes' => 'The "safe container" ritual that keeps the talk from escalating.', 'tonight' => 'Each share one small thing the other doesn\'t know you\'ve felt.'],
            ['n' => '05', 'title' => 'The Reset Ritual', 'sub' => 'A 20-minute weekly practice that prevents 80% of fights', 'page' => 114, 'learn' => 'The weekly check-in that catches problems while they\'re still small.', 'includes' => 'A one-page agenda you can run in 20 minutes.', 'tonight' => 'Schedule your first reset for this Sunday evening.'],
            ['n' => '06', 'title' => 'The Intimacy Bridge', 'sub' => 'Rebuilding physical and emotional closeness, step by step', 'page' => 142, 'learn' => 'How emotional safety unlocks physical closeness — in that order.', 'includes' => 'A gentle 7-day reconnection sequence.', 'tonight' => 'A no-pressure closeness exercise that takes five minutes.'],
            ['n' => '07', 'title' => 'The Future Vow', 'sub' => 'Designing the next chapter of your relationship together', 'page' => 170, 'learn' => 'How to write a shared vision you\'ll both actually keep.', 'includes' => 'A guided "future vow" worksheet for the two of you.', 'tonight' => 'Each name one thing you want more of in the next year.'],
        ],
    ],

    'sneak_peek' => [
        'kicker' => 'Sneak Peek',
        'headline_before' => 'A page from ', 'headline_italic' => 'Chapter 2',
        'chapter_label' => 'Chapter 2 · The Mirror Conversation',
        'page_label' => '— page 41 —',
        'body1' => "The first time Maya tried it, her hands were shaking. She'd been rehearsing the words for three days, but standing in the kitchen across from Daniel — eight years of arguments stacked between them — they almost dissolved in her throat.",
        'body2' => 'She took a breath, and instead of attacking the dishes in the sink, she said the sentence I\'d taught her in session:',
        'quote' => "\"I want to understand what it's like to be you right now —\nbefore I tell you what it's like to be me.\"",
        'body3' => 'Daniel put down his phone. He looked at her — really looked — for what felt like the first time in two years. And then, very softly, he started to cry…',
        'side_title' => '"I wept reading this. And then I read it to my husband."',
        'side_body' => "That's the kind of message Dr. Holloway gets every week. REIGNITE isn't theory — it's a collection of real conversations, real breakthroughs, and the exact scripts you can use tonight.",
        'pills' => ['196 pages', '7 chapters', '28 exercises'],
        'cta' => 'Get your copy',
    ],

    'marquee' => ['items' => ['38,000+ Copies Sold', '#1 Bestseller', '60-Day Refund', 'Free Workbook', 'Audiobook Included', 'Couples in 42 Countries']],

    'author' => [
        'kicker' => 'Meet the Author',
        'headline_before' => "Written by a therapist who's ", 'headline_italic' => 'been in the room', 'headline_after' => '',
        'bio1' => 'Dr. Sarah Holloway has spent nearly two decades sitting across from couples on the brink — and walking them back. REIGNITE distills the seven conversations that, over and over again, brought them home to each other.',
        'bio2' => '"I wrote the book I wished I could hand every couple in my first session."',
        'image' => 'https://images.pexels.com/photos/7968065/pexels-photo-7968065.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=900&w=700',
        'name' => 'Dr. Sarah Holloway', 'role' => 'Author',
        'credits' => [
            ['value' => '18 yrs', 'label' => 'as therapist'],
            ['value' => '2,400+', 'label' => 'couples counseled'],
            ['value' => 'PhD', 'label' => 'in Clinical Psych'],
            ['value' => 'TEDx', 'label' => 'Speaker (4M views)'],
        ],
    ],

    'reviews' => [
        'title_a' => 'Real couples.', 'title_b' => 'Real change.',
        'sub' => 'Stories submitted by readers in the last 90 days.',
        'items' => [
            ['image' => 'https://images.pexels.com/photos/17042091/pexels-photo-17042091.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=600&w=900', 'name' => 'Maya & Daniel', 'together' => 'Married 12 years', 'quote' => "We were three weeks from filing. We did Chapter 2 on a Tuesday night and just… cried. Six months later, we're better than we were before kids.", 'metric' => 'Saved our marriage'],
            ['image' => 'https://images.pexels.com/photos/6343599/pexels-photo-6343599.jpeg?auto=compress&cs=tinysrgb&fit=crop&h=600&w=900', 'name' => 'Priya & James', 'together' => 'Together 6 years', 'quote' => "The 'Reset Ritual' alone changed everything. Twenty minutes a week. I cannot believe nobody told us this sooner.", 'metric' => 'Weekly ritual'],
        ],
        'rating_value' => '4.9', 'rating_sub' => 'Based on 12,400+ verified reader reviews',
        'platforms' => ['Amazon ★ 4.9', 'Goodreads ★ 4.8', 'Audible ★ 4.9'],
    ],

    'bonuses' => [
        'kicker' => 'Free Bonuses',
        'headline_before' => 'Order today and get ', 'headline_italic' => '$167 of extras',
        'items' => [
            ['emoji' => '📓', 'title' => 'The 7-Conversations Workbook', 'desc' => 'Printable PDF with prompts, scripts, and reflection pages for each chapter.', 'value' => '$27'],
            ['emoji' => '🎧', 'title' => 'Audiobook (narrated by the author)', 'desc' => '5h 12m of warm, personal narration — perfect for car rides together.', 'value' => '$24'],
            ['emoji' => '💌', 'title' => '21-Day Reignite Email Series', 'desc' => 'A short daily nudge with one question to ask your partner — for 21 days.', 'value' => '$19'],
            ['emoji' => '🎟️', 'title' => 'Live Q&A with Dr. Holloway', 'desc' => 'Quarterly Zoom call — bring your questions, get them answered live.', 'value' => '$97'],
        ],
    ],

    'pricing' => [
        'kicker' => 'Order Your Copy',
        'headline_before' => 'Pick your ', 'headline_italic' => 'format',
        'sub' => 'One-time payment. Free shipping. Refund within 60 days, no questions asked.',
        'tiers' => [
            ['name' => 'Ebook', 'tagline' => 'Instant download · PDF + EPUB', 'price' => 19, 'old' => 29,
                'features' => ['196-page ebook (PDF + EPUB)', 'Bonus: 7-Conversations Workbook', 'Bonus: 21-Day Email Series', 'Lifetime updates', '60-day money-back guarantee'],
                'cta' => 'Get Ebook', 'featured' => false],
            ['name' => 'Bundle (most loved)', 'tagline' => 'Best for couples · Save $33', 'price' => 39, 'old' => 72,
                'features' => ['Hardcover book (free shipping)', 'Instant ebook (PDF + EPUB)', 'Audiobook (narrated by author)', '7-Conversations Workbook', '21-Day Email Series', 'Quarterly live Q&A with Dr. Holloway', 'Personalised signed bookplate'],
                'cta' => 'Get the Bundle', 'featured' => true],
            ['name' => 'Hardcover', 'tagline' => 'Beautiful gift edition', 'price' => 29, 'old' => 39,
                'features' => ['196-page hardcover book', 'Free worldwide shipping', 'Bonus: 7-Conversations Workbook', 'Bonus: 21-Day Email Series', '60-day money-back guarantee'],
                'cta' => 'Get Hardcover', 'featured' => false],
        ],
        'footnote' => '💳 Secure checkout via Stripe · Pay with card, Apple Pay, or PayPal · Ships in 48 hours',
    ],

    'guarantee' => [
        'days' => '60', 'badge_label' => 'DAY GUARANTEE',
        'headline' => 'Read it. Try it. Love it — or get your money back.',
        'body' => "Read the book, do even one of the seven conversations with your partner. If you don't feel something shift between you within 60 days — email us and we'll refund every cent. Keep the book. Keep the bonuses. It's our risk, not yours.",
    ],

    'faq' => [
        'kicker' => 'FAQ', 'headline_before' => 'Got ', 'headline_italic' => 'questions?',
        'items' => [
            ['q' => "What if my partner won't read it with me?", 'a' => "Most readers start alone — and that's by design. Chapters 1–3 are written so one partner can quietly shift the dynamic before the other joins in. You'll find clear scripts for inviting them in without pressure."],
            ['q' => "We've tried couples therapy. Will this be different?", 'a' => 'REIGNITE is built around the same evidence-based frameworks Dr. Holloway uses in her practice, but distilled into 7 self-guided conversations with scripts. Many readers say it\'s what unlocked their therapy work.'],
            ['q' => 'Is this only for married couples?', 'a' => 'Not at all. Dating, engaged, married, long-distance, blended families — the conversations work for any committed relationship, gay or straight.'],
            ['q' => 'How long does the program take?', 'a' => 'Most couples work through one conversation per week (about 30 minutes) — so roughly 7 weeks. You can move faster or slower; the book is yours forever.'],
            ['q' => "What if it doesn't work for us?", 'a' => "Email us within 60 days of purchase and we'll refund every cent — no forms, no questions. Keep the book and the bonuses as our gift for trying."],
            ['q' => 'Do I get the bonuses if I only buy the ebook?', 'a' => 'Yes. Every format includes the Workbook and 21-Day Email Series. The Bundle adds the audiobook and live quarterly Q&A.'],
        ],
    ],

    'final_cta' => [
        'kicker' => 'Free shipping ends in',
        'headline_before' => 'Your next chapter ', 'headline_italic' => 'starts tonight',
        'sub' => 'Order before the countdown ends to lock in free worldwide shipping, the signed bookplate, and all 4 bonuses ($167 value).',
        'cta_primary' => 'Order the Bundle — $39', 'cta_secondary' => 'Just the Ebook — $19',
        'footnote' => '⚡ 312 copies shipped this week · Avg. 4.9★ from 12,400+ readers',
        'floating_quote' => '"This book saved us."', 'floating_author' => '— Maya & Daniel, married 12 yrs',
    ],

    'footer' => [
        'brand1' => 'REIGNITE', 'brand2' => '.',
        'tagline' => 'The 7 conversations that bring couples back to each other — by Dr. Sarah Holloway, PhD.',
        'columns' => [
            ['title' => 'Book', 'items' => ['Read a sample', 'Chapters', 'Reviews', 'Order']],
            ['title' => 'Author', 'items' => ['About Dr. Holloway', 'Podcast appearances', 'Speaking', 'Press kit']],
            ['title' => 'Support', 'items' => ['hello@reignitebook.com', 'Shipping & returns', 'Privacy', 'Terms']],
        ],
        'legal' => '© 2026 REIGNITE. All rights reserved. This book is for educational purposes and is not a substitute for therapy.',
        'socials' => ['Tw', 'Ig', 'Yt', 'Tk'],
    ],
];

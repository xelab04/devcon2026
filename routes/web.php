<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $title = 'MSCC — Developers Conference 2025';

    return view('index', compact('title'));
})->name('index');

Route::view('/brand-system', 'brand-system')->name('brand-system');

Route::view('/speakers', 'placeholder', [
    'title' => 'Speakers — MSCC DevCon 2026',
    'heading' => 'SPEAKERS',
    'subheading' => 'Sessions under review',
    'message' => 'The submission window has closed and our review committee is finalising the lineup. Check back soon — speakers will be announced once selections are confirmed.',
])->name('speakers');

Route::view('/agenda', 'placeholder', [
    'title' => 'Agenda — MSCC DevCon 2026',
    'heading' => 'AGENDA',
    'subheading' => 'Coming in May',
    'message' => "We're putting the finishing touches on the schedule. The full agenda — keynotes, workshops, and networking — will be published in May 2026.",
])->name('agenda');

Route::view('/register', 'placeholder', [
    'title' => 'Register — MSCC DevCon 2026',
    'heading' => 'REGISTER',
    'subheading' => 'Registration opens in June',
    'message' => "We're prepping the registration platform now. Tickets go live in June 2026 — save the date and we'll let you know the moment the doors open.",
])->name('register');

Route::view('/team', 'team', [
    'title' => 'Team — MSCC DevCon 2026',
    'board' => [
        ['name' => 'Jochen Kirstätter', 'photo' => 'jochen.png', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/JKirstaetter'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/jochen.kirstaetter'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/jochenkirstaetter/'],
        ]],
        ['name' => 'Mary Jane Kirstätter', 'photo' => 'mary-jane.jpg', 'links' => [
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/maryjane.kirstatter'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/maryjanekirstaetter/'],
        ]],
        ['name' => 'Shelly Hermia Bhujun-Sookun', 'photo' => 'shelly.jpg', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/Shelly_Bhujun'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/shelly.bhujun'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/shelly-hermia-bhujun-sookun-998a40a2/'],
        ]],
        ['name' => 'Ish Sookun', 'photo' => 'ish.jpg', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/IshSookun'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/ish.sookun'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/ishsookun/'],
        ]],
        ['name' => 'Vidush H. Namah', 'photo' => 'vidush.jpg', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/VHNamah'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/vnsnippets'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/vnamah/'],
        ]],
    ],
    'squad' => [
        ['name' => 'Aditya Bholah', 'photo' => 'aditya.jpg', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/aditya_bholah'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/aditya.bholah07'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/aditya-bholah-91b8b3137/'],
        ]],
        ['name' => 'Alex Bissessur', 'photo' => 'alex.png', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/Alex_with_a_B'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/alexandre-bissessur-b9986123a/'],
        ]],
        ['name' => 'Chittesh Sham', 'photo' => 'chittesh.jpg', 'links' => [
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/chittesh-sham-956ba5a0'],
        ]],
        ['name' => 'Delphine Bissessur', 'photo' => 'delphine.jpg', 'links' => [
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/delphinebissessur/'],
        ]],
        ['name' => 'Fawwaaz Koodruth', 'photo' => 'fawwaaz.jpg', 'links' => []],
        ['name' => 'Girish Mahabir', 'photo' => 'girish.png', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/girishmahabir'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/girish.mahabir'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/girish-mahabir'],
        ]],
        ['name' => 'Hayley Kirstätter', 'photo' => 'hayley.jpg', 'links' => []],
        ['name' => 'Neil Baichoo', 'photo' => 'neil.jpg', 'links' => [
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://linkedin.com/in/arwinneil'],
        ]],
        ['name' => 'Nirvan Pagooah', 'photo' => 'nirvan.jpg', 'links' => [
            ['icon' => 'x-twitter', 'label' => 'X', 'url' => 'https://x.com/nirvanpagooah'],
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/nirvanpagooah'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/tejaspagooah/'],
        ]],
        ['name' => 'Om Gokhool', 'photo' => 'om.jpg', 'links' => [
            ['icon' => 'facebook', 'label' => 'Facebook', 'url' => 'https://www.facebook.com/omgokhool'],
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/omdeep-gokhool-75b66b167/'],
        ]],
        ['name' => 'Tristan Kirstätter', 'photo' => 'tristan.jpg', 'links' => []],
        ['name' => 'Ubeid Jamal', 'photo' => 'ubeid.jpg', 'links' => [
            ['icon' => 'linkedin', 'label' => 'LinkedIn', 'url' => 'https://www.linkedin.com/in/ubeidullah-jamal-ahmad/'],
        ]],
    ],
])->name('team');

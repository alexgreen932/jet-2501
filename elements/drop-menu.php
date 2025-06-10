<?php

$menu = [
    'page' => 'Top',
    'section-1' => 'Welcome Bonus',
    'section-2' => 'Play Now',
    'section-3' => 'A Big Candy Casino',
    'section-4' => 'A Big Candy Casino Choice',
    'section-5' => 'Pros',
    //  'section-6' => '',
    'section-7' => 'Recent Wins',
    'section-8' => 'A Big Candy Bonuses',
    'section-9' => 'No Deposit Bonus',
    'section-10' => 'Free Chips',
    'section-11' => 'A Big Candy VIP Program',
    'section-12' => 'FAQ',
    //  'section-13' => '',
];


$output = [];
foreach ($menu as $key => $value) {
    $output[] = '<li><a href="#' . $key . '">' . $value . '</a></li>';
}

$drop_menu = implode('', $output);

// echo '<div class="drop-menu"><span class="dashicons dashicons-menu"></span><ul>' . wp_kses_post( $drop_menu ) . '</ul></div>';


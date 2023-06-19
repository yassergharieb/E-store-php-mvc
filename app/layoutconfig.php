<?php

return [
    "layout" => [
        'header' => LAYOUT_PATH . "header.php", 
        'sidebar' => LAYOUT_PATH . "sidebar.php", 
        'navbar' => LAYOUT_PATH . "navbar.php", 
        ":view" => "action_view", 
        "footer" => LAYOUT_PATH . 'footer.php'
 
    ], 

   'headerresources' =>  [
        "bootstrap" => '/public'. CSS . 'bootstrap.min.css', 
        "css" => '/public'. CSS .  'style.css'

   ],  

   'footerrescourses'  => [
    'js' => [
        '/public' .JS .'jquery-1.12.0.min.js',
        
        '/public' .JS .'main.js'
    
    
    ]
   ]
];



<?php

return [
    '/' => 'Home@index',
    '/user/create' => 'User@Create',
    '/user/[a-z0-9]+' => 'User@index',
];
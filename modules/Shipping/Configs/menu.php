<?php
return [
    'name' => trans('Shipping'),
    'route' => route('get.shipping.list'),
    'sort' => 9,
    'active'=> TRUE,
    'id'=> 'shipping',
    'icon' => '<i class="fas fa-shipping-fast"></i>',
    'middleware' => ['shipping'],
    'group' => []
];

<?php
return [
    'name' => trans('Voucher'),
    'route' => route('get.voucher.list'),
    'sort' => 9,
    'active'=> TRUE,
    'id'=> 'voucher',
    'icon' => '<i class="fas fa-gifts"></i>',
    'middleware' => ['voucher'],
    'group' => []
];

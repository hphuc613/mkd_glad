<?php
return [
    'name' => trans('Offer of the month'),
    'route' => route('get.offer.list'),
    'sort' => 6,
    'active'=> TRUE,
    'id'=> 'offer',
    'icon' => '<i class="fa fa-gift" style="display: inline-flex; align-items: center"></i>',
    'middleware' => [],
    'group' => []
];

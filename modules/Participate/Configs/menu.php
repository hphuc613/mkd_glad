<?php
return [
    'name' => trans('Participate'),
    'route' => route('get.participate.list'),
    'sort' => 2,
    'active'=> TRUE,
    'id'=> 'participate',
    'icon' => '<i class="fa fa-window-maximize" style="display: inline-flex; align-items: center"></i>',
    'middleware' => ['participate'],
    'group' => []
];

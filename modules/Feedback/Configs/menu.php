<?php
return [
    'name' => trans('Feedback'),
    'route' => route('get.feedback.list'),
    'sort' => 5,
    'active'=> TRUE,
    'id'=> 'feedback',
    'icon' => '<i class="far fa-comment-dots"></i>',
    'middleware' => [],
    'group' => []
];

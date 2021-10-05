<?php
$menu = config_menu_merge();
?>

<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if(!empty($menu))
                    @foreach($menu as $key => $item)
                        @can($item['middleware'])
                            @if($item['active'])
                                @if(empty($item['group']))
                                    <li>
                                        <a class="waves-effect waves-dark" href="{{ $item['route'] }}" aria-expanded="false">
                                            {!! $item['icon'] !!}
                                            <span class="hide-menu">{{ $item['name'] }}</span>
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                                            <i class="icon-speedometer"></i>
                                            <span class="hide-menu">Dashboard
                            <span class="badge badge-pill badge-cyan ml-auto">4</span>
                        </span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse">
                                            <li><a href="index.html">Minimal </a></li>
                                            <li><a href="index2.html">Analytical</a></li>
                                            <li><a href="index3.html">Demographical</a></li>
                                            <li><a href="index4.html">Modern</a></li>
                                        </ul>
                                    </li>
                                @endif
                            @endif
                        @endcan
                    @endforeach
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>

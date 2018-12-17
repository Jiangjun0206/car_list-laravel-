<?php
// Current Full URL
$fullPagePath = Request::url();
// Char Count of Backend folder Plus 1
$envAdminCharCount = strlen(env('BACKEND_PATH')) + 1;
// URL after Root Path EX: admin/home
$urlAfterRoot = substr($fullPagePath, strpos($fullPagePath, env('BACKEND_PATH')) + $envAdminCharCount);
?>

<div id="aside" class="app-aside modal fade folded md nav-expand">
    <div class="left navside dark dk" layout="column">
        <div class="navbar navbar-md no-radius">
            <!-- brand -->
            <a class="navbar-brand" href="{{ route('adminHome') }}">
                <img style="padding-top:5px;padding-left:5px;max-height:70px" src="{{ URL::to('backEnd/assets/images/logo1.png') }}" alt="Control">
                
            </a>
            <!-- / brand -->
        </div>
        <div flex class="hide-scroll">
            <nav class="scroll nav-active-primary">

                <ul class="nav" ui-nav>
                @if(@Auth::user()->permissionsGroup->analytics_status)
                <li class=""><a style="font-size:16px" href="{{ route('users') }}"><span class="nav-icon"><i class="material-icons fa fa-user"></i></span><span style="padding-top:7%" class="nav-text"> Users</span></a></li>
                <li class=""><a style="font-size:16px" href="{{ route('cars') }}"><span class="nav-icon"><i class="material-icons fa fa-car"></i></span><span style="padding-top:7%" class="nav-text"> Cars</span></a></li>
                <li class=""><a style="font-size:16px" href="{{route('containers')}}"><span class="nav-icon"><i class="material-icons fa fa-bank"></i></span><span style="padding-top:7%" class="nav-text"> Containers</span></a></li>
                @endif
                @if(!@Auth::user()->permissionsGroup->analytics_status)
                <li class=""><a style="font-size:16px" href="{{ route('users') }}"><span class="nav-icon"><i class="material-icons fa fa-user icc"></i></span><span style="padding-top:%" class="nav-text"> My Profile</span></a></li>
                <li class=""><a style="font-size:16px" id="main_detail" href="{{ route('maindetails') }}"><span class="nav-icon"><i class="material-icons fa fa-cogs icc"></i></span><span style="padding-top:7%" class="nav-text">Main Details</span></a></li>
                @endif
                <!-- <li>
                    <a><span class="nav-caret"><i class="fa fa-caret-down"></i></span>
                        <span class="nav-icon"><i class="fa fa-car"></i></span><span class="nav-text">Cars</span>
                    </a>
                    <ul class="nav-sub">
                        <li>
                            <a style="font-size:16px" href="{{ route('carsCategory') }}"><i class="fa fa-inbox"> </i> &nbsp;Cars details</a>
                        </li>
                        <li>
                            <a style="font-size:16px" href="{{ route('cars') }}"><i class="fa fa-navicon"> </i> &nbsp;Cars fields</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a><span class="nav-caret"><i class="fa fa-caret-down"></i></span>
                        <span class="nav-icon"><i class="fa fa-bank"></i></span><span class="nav-text">Containers</span>
                    </a>
                    <ul class="nav-sub">
                        <li>
                            <a style="font-size:16px" href="{{ route('topics',7) }}"><i class="fa fa-inbox"> </i> &nbsp;Cars details</a>
                        </li>
                        <li>
                            <a style="font-size:16px" href="{{ route('sections',7) }}"><i class="fa fa-navicon"> </i> &nbsp;Cars fields</a>
                        </li>
                    </ul>
                </li> -->
                </ul>
            </nav>
        </div>
        <div flex-no-shrink>
            <div>
                <nav ui-nav>
                    <ul class="nav">

                        <li>
                            <div class="b-b b m-t-sm"></div>
                        </li>
                        <li class="no-bg"><a href="{{ url('/logout') }}"
                                             onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <span class="nav-icon"><i class="material-icons">&#xe8ac;</i></span>
                                <span class="nav-text">{{ trans('backLang.logout') }}</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<script>

</script>
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
                 
                  

                   
               

                    <?php
                    $data_sections_arr = explode(",", Auth::user()->permissionsGroup->data_sections);
                    ?>
                    @foreach($GeneralWebmasterSections as $GeneralWebmasterSection)
                        @if(in_array($GeneralWebmasterSection->id,$data_sections_arr))
                            <?php
                            $LiIcon = "&#xe2c8;";
                            if ($GeneralWebmasterSection->type == 3) {
                                $LiIcon = "&#xe050;";
                            }
                            if ($GeneralWebmasterSection->type == 2) {
                                $LiIcon = "&#xe63a;";
                            }
                            if ($GeneralWebmasterSection->type == 1) {
                                $LiIcon = "&#xe251;";
                            }
                            if ($GeneralWebmasterSection->type == 0) {
                                $LiIcon = "&#xe2c8;";
                            }
                            if ($GeneralWebmasterSection->name == "sitePages") {
                                $LiIcon = "&#xe3e8;";
                            }
                            if ($GeneralWebmasterSection->name == "articles") {
                                $LiIcon = "&#xe02f;";
                            }
                            if ($GeneralWebmasterSection->name == "services") {
                                $LiIcon = "&#xe540;";
                            }
                            if ($GeneralWebmasterSection->name == "news") {
                                $LiIcon = "&#xe307;";
                            }
                            if ($GeneralWebmasterSection->name == "products") {
                                $LiIcon = "&#xe8f6;";
                            }

                            // get 9 char after root url to check if is "webmaster"
                            $is_webmaster = substr($urlAfterRoot, 0, 9);
                            ?>
                            @if($GeneralWebmasterSection->sections_status > 0)
                                <li {{ ($GeneralWebmasterSection->id == @$WebmasterSection->id && $is_webmaster != "webmaster") ? 'class=active' : '' }}>
                                    <a>
                                    <span class="nav-caret">
                                        <i class="fa fa-caret-down"></i>
                                    </span>
                                                            <span class="nav-icon">
                                        <i class="material-icons">{!! $LiIcon !!}</i>
                                    </span>
                                        <span class="nav-text">{!! str_replace("backLang.","",trans('backLang.'.$GeneralWebmasterSection->name)) !!}</span>
                                    </a>
                                    <ul class="nav-sub">
                                        @if($GeneralWebmasterSection->sections_status > 0)

                                            <?php
                                            $currentFolder = "sections"; // Put folder name here
                                            $PathCurrentFolder = substr($urlAfterRoot,
                                                (strlen($GeneralWebmasterSection->id) + 1), strlen($currentFolder));
                                            ?>
                                            <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }} >
                                                <a href="{{ route('sections',$GeneralWebmasterSection->id) }}">
                                                    <span class="nav-text">{{ trans('backLang.sectionsOf') }} {{ str_replace("backLang.","",trans('backLang.'.$GeneralWebmasterSection->name)) }}</span>
                                                </a>
                                            </li>
                                        @endif

                                        <?php
                                        $currentFolder = "topics"; // Put folder name here
                                        $PathCurrentFolder = substr($urlAfterRoot,
                                            (strlen($GeneralWebmasterSection->id) + 1), strlen($currentFolder));
                                        ?>
                                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }} >
                                            <a href="{{ route('topics',$GeneralWebmasterSection->id) }}">
                                                <span class="nav-text">{!! str_replace("backLang.","",trans('backLang.'.$GeneralWebmasterSection->name)) !!}</span>
                                            </a>
                                        </li>

                                    </ul>
                                </li>

                            @else
                                <li {{ ($GeneralWebmasterSection->id== @$WebmasterSection->id) ? 'class=active' : '' }}>
                                    <a href="{{ route('topics',$GeneralWebmasterSection->id) }}">
                                    <span class="nav-icon">
                                        <i class="material-icons">{!! $LiIcon !!}</i>
                                    </span>
                                        <span class="nav-text">{!! str_replace("backLang.","",trans('backLang.'.$GeneralWebmasterSection->name)) !!}</span>
                                    </a>
                                </li>
                            @endif
                        @endif
                    @endforeach



                   

                    


                  
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
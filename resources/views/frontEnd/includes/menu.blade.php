<?php
// Current Full URL
$fullPagePath = Request::url();
// Char Count of Backend folder Plus 1
$envAdminCharCount = strlen(env('BACKEND_PATH')) + 1;
// URL after Root Path EX: admin/home
$urlAfterRoot = substr($fullPagePath, strpos($fullPagePath, env('BACKEND_PATH')) + $envAdminCharCount);
?>
<?php
$category_title_var = "title_" . trans('backLang.boxCode');
$slug_var = "seo_url_slug_" . trans('backLang.boxCode');
$slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
?>
<div class="navbar-collapse collapse ">
    <ul class="nav navbar-nav">
        <?php
        $link_title_var = "title_" . trans('backLang.boxCode');
        ?>
        @foreach($HeaderMenuLinks as $HeaderMenuLink)
            @if($HeaderMenuLink->type==3)
                <?php
                // Section with drop list
                ?>
           
            @elseif($HeaderMenuLink->type==2)
                <?php
                // Section Link
                ?>
               
            @elseif($HeaderMenuLink->type==1)
                <?php
                // Direct Link
                if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                $this_link_url = url(trans('backLang.code')."/" .$HeaderMenuLink->link);
                }else{
                $this_link_url = url($HeaderMenuLink->link);
                }
                ?>
                <li><a href="{{ $this_link_url }}">{{ $HeaderMenuLink->$link_title_var }}</a></li>
            @else
                <?php
                // Main title ( have drop down menu )
                ?>
                
            @endif
        @endforeach

    </ul>
</div>
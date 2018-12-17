@extends('backEnd.layout')
@section('headerInclude')
    <link rel="stylesheet" type="text/css" href="{{ URL::to("backEnd/assets/styles/flags.css") }}"/>
    <style></style>
@endsection
@section('content')

    <div class="padding p-b-0">
    <div class="margin">
            <h5 class="m-b-0 _300">{{ trans('backLang.hi') }} <span class="text-primary">{{ Auth::user()->name }}</span>
            </h5>
        </div>
        @if(count($HomeTopics)>0)
        <section class="content-row-bg" style="padding-top: 0px;
        padding-bottom: 0px; margin:0px ;
        height: 50px;">
                <div class="">

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="home-row-head">
                                <h2 style=" text-align:center;   font-weight:900;
                                color: #186b49;
                                font-family: sans-serif;">
                        Welcome to jax Auto Shipping site                            </h2>
                        </div>
                        <div class="row">
                            <?php
                            $title_var = "title_" . trans('backLang.boxCode');
                            $title_var2 = "title_" . trans('backLang.boxCodeOther');
                            $details_var = "details_" . trans('backLang.boxCode');
                            $details_var2 = "details_" . trans('backLang.boxCodeOther');
                            $slug_var = "seo_url_slug_" . trans('backLang.boxCode');
                            $slug_var2 = "seo_url_slug_" . trans('backLang.boxCodeOther');
                            $section_url = "";
                            ?>
                         

                        </div>
                    </div>
                </div>

               

            </div>
        </section>
    @endif
        @if(count($HomePhotos)>0)
        <section class="content-row-no-bg">
            <div class="">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="home-row-head">
                        </div>
                        <div class="row">
                            <section id="projects">
                                <ul id="thumbs" class="portfolio">
                                    <?php
                                    $title_var = "title_" . trans('backLang.boxCode');
                                    $title_var2 = "title_" . trans('backLang.boxCodeOther');
                                    $section_url = "";
                                    $ph_count = 0;
                                    ?>
                                    @foreach($HomePhotos as $HomePhoto)
                                        <?php
                                        if ($HomePhoto->$title_var != "") {
                                            $title = $HomePhoto->$title_var;
                                        } else {
                                            $title = $HomePhoto->$title_var2;
                                        }
                                        if ($HomePhoto->webmasterSection->$slug_var != "" && Helper::GeneralWebmasterSettings("links_status")) {
                                            if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                $section_url = url(trans('backLang.code') . "/" . $HomePhoto->webmasterSection->$slug_var);
                                            } else {
                                                $section_url = url($HomePhoto->webmasterSection->$slug_var);
                                            }
                                        } else {
                                            if (trans('backLang.code') != env('DEFAULT_LANGUAGE')) {
                                                $section_url = url(trans('backLang.code') . "/" . $HomePhoto->webmasterSection->name);
                                            } else {
                                                $section_url = url($HomePhoto->webmasterSection->name);
                                            }
                                        }
                                        ?>
                                        @foreach($HomePhoto->photos as $photo)
                                            @if($ph_count<12)
                                                <li class="col-lg-2 design" data-id="id-0" data-type="web" style="list-style:none; ">
                                                    <div class="relative">
                                                        <div class="item-thumbs">
                                                            <!-- <a class="hover-wrap fancybox" data-fancybox-group="gallery"
                                                               title="{{ $title }}"
                                                               href="{{ URL::to('uploads/topics/'.$photo->file) }}">
                                                                <span class="overlay-img"></span>
                                                                <span class="overlay-img-thumb"><i
                                                                            class="fa fa-search-plus"></i></span>
                                                            </a> -->
                                                            <!-- Thumb Image and Description -->
                                                            <img style="border-radius:4.8em;padding-top:10%;width:90%;height:900%" src="{{ URL::to('uploads/topics/'.$photo->file) }}"
                                                                 alt="{{ $title }}">
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                            <?php
                                            $ph_count++;
                                            ?>
                                        @endforeach
                                    @endforeach

                                </ul>
                            </section>
                        </div>

                        <!-- <div class="row">
                            <div class="col-lg-12">
                                <div class="more-btn">
                                    <a href="{{ url($section_url) }}" class="btn btn-theme"><i
                                                class="fa fa-angle-left"></i>&nbsp; {{ trans('frontLang.viewMore') }}
                                        &nbsp;<i
                                                class="fa fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

    @endif
        


    </div>
        

@endsection

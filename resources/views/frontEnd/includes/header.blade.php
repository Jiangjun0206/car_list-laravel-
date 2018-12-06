<header>
    <div class="site-top">
        <div class="container">
            <div>
                <div class="pull-right">
                    <strong>
                        <a href="{{ route("adminHome") }}"><i class="fa fa-user"></i> Login
                        </a>
                    </strong>
            
                </div>
                <div class="pull-left">
                    @if(Helper::GeneralSiteSettings("contact_t3") !="")
                        <i class="fa fa-phone"></i> &nbsp;<a
                                href="call:{{ Helper::GeneralSiteSettings("contact_t5") }}"><span
                                    dir="ltr">{{ Helper::GeneralSiteSettings("contact_t5") }}</span></a>
                    @endif
                    @if(Helper::GeneralSiteSettings("contact_t6") !="")
                        <span class="top-email">
                        &nbsp; | &nbsp;
                    <i class="fa fa-envelope"></i> &nbsp;<a
                                    href="mailto:{{ Helper::GeneralSiteSettings("contact_t6") }}">{{ Helper::GeneralSiteSettings("contact_t6") }}</a>
                    </span>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-default" style="">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route("Home") }}">
                        <span><i class="fa fa-car"> &nbsp;&nbsp;&nbsp; </i>car Collect</span>
                

                </a>
            </div>
            @include('frontEnd.includes.menu')
        </div>
    </div>
</header>
@extends('user.home.homePage')
@section('title', 'About Us')
@section('content')
    <div class="content">
        <div class="ic">More Website Templates @ TemplateMonster.com - March 10, 2014!</div>
        <div class="container_12">
            <div class="grid_12">
                <h2>Gallery</h2>
            </div>
            <div class="clear"></div>
            <div class="gallery">
                <div class="grid_4"><a href="images/big1.jpg" class="gal"><img
                            src="{{ asset('user/images/page3_img1.jpg') }}" alt=""></a></div>
                <div class="grid_4"><a href="images/big2.jpg" class="gal"><img
                            src="{{ asset('user/images/page3_img2.jpg') }}" alt=""></a></div>
                <div class="grid_4"><a href="images/big3.jpg" class="gal"><img
                            src="{{ asset('user/images/page3_img3.jpg') }}" alt=""></a></div>
                <div class="clear"></div>
                <div class="grid_4"><a href="images/big4.jpg" class="gal"><img
                            src="{{ asset('user/images/page3_img4.jpg') }}" alt=""></a></div>
                <div class="grid_4"><a href="images/big5.jpg" class="gal"><img
                            src="{{ asset('user/images/page3_img5.jpg') }}" alt=""></a></div>
                <div class="grid_4"><a href="images/big6.jpg" class="gal"><img
                            src="{{ asset('user/images/page3_img6.jpg') }}" alt=""></a></div>
            </div>
        </div>
    </div>
    <div class="row ">
        <h3 class="head1 text-center">Find Us</h3>
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <p>You can always get 24/7 support for all <span class="col1"><a
                                    href="http://www.templatemonster.com/website-templates.php" rel="nofollow">premium
                                    website
                                    templates</a></span> from <br>TemplateMonster. Free themes go without it. </p>
                    </div>
                    <div class="card-subtitle">
                        <p><span class="col1"><a href="http://www.templatetuning.com/"
                                    rel="nofollow">TemplateTuning</a></span>
                            will help
                            you with any questions regarding customization of the chosen themes.</p>
                    </div>
                    <p>The Company Name Inc. <br>
                        8901 Marmora Road, <br>
                        Glasgow, D04 89GR.</p>
                    Freephone:+1 800 559 6580 <br>
                    Telephone:+1 800 603 6035<br>
                    FAX:+1 800 889 9898<br>
                    E-mail: <a href="#" class="col1">mail@demolink.org</a>
                </div>
            </div>
        </div>
    </div>
@endsection

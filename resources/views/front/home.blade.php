@extends('front.include')
@section('frontBody')

<!-- start hero section -->
<section id="home" class="p-0 parallax mobile-height wow animate__fadeIn" data-parallax-background-ratio="0.5" style="background-image:url('{{ asset('/public/front/html/') }}/images/cpi_cover.jpg');height:570px">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container position-relative full-screen">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <img src="{{ asset('/public/front/html/') }}/images/text2.png" alt=""/>
                <div class="down-section text-center"><a href="#about" class="inner-link"><i class="ti-arrow-down icon-extra-small text-white-2 bg-deep-pink padding-15px-all sm-padding-10px-all rounded-circle"></i></a></div>
            </div>
        </div>
    </div>
</section>
<!-- end hero section -->

        <!-- start services section -->
        <section id="services" class="bg-light-gray wow animate__fadeIn">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-10 margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center last-paragraph-no-margin">
                        <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase margin-15px-bottom">CPI Engineer's Reunion 2024</h5>
                        <span class="alt-font text-deep-pink text-medium margin-5px-bottom d-block">Session 2010-11</span>
                        <p class="mb-0">Reunion 2024 is going to be held on 25th December 2024 in the joint initiative of all departments of Comilla Polytechnic Institute for the session 2010-11. All friends of all departments of the 2010-11 session are invited to participate in the reunion.</p>
                        <p>Register quickly to participate in the reunion and encourage your friends too.</p>
                    </div>  
                </div>
            </div>
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
                    <!-- start counter box item -->
                    <div class="col md-padding-twelve-left md-margin-60px-bottom sm-margin-40px-bottom sm-padding-15px-left wow animate__fadeInRight">
                        <div class="feature-box-5 position-relative">
                            <i class="fa-solid fa-users text-medium-gray icon-extra-medium top-6"></i>
                            <div class="feature-content">
                                <h6 class="d-block text-extra-dark-gray font-weight-600 alt-font mb-0 counter" data-to="350" data-speed="2000">350</h6>
                                <span class="text-small text-uppercase position-relative top-minus4">General Member</span>
                            </div>
                        </div>
                    </div>
                    <!-- end counter box item -->
                    <!-- start counter box item -->
                    <div class="col md-padding-twelve-left md-margin-60px-bottom sm-margin-40px-bottom sm-padding-15px-left wow animate__fadeInRight" data-wow-delay="0.2s">
                        <div class="feature-box-5 position-relative">
                            <i class="fa-light fa-user-group-crown text-medium-gray icon-extra-medium top-6"></i>
                            <div class="feature-content">
                                <h6 class="d-block text-extra-dark-gray font-weight-600 alt-font mb-0 counter" data-to="780" data-speed="2000">780</h6>
                                <span class="text-small text-uppercase position-relative top-minus4">Guest Joining</span>
                            </div>
                        </div>
                    </div>
                    <!-- end counter box item -->
                    <!-- start counter box item -->
                    <div class="col md-padding-twelve-left xs-margin-40px-bottom sm-padding-15px-left wow animate__fadeInRight" data-wow-delay="0.4s">
                        <div class="feature-box-5 position-relative">
                            <i class="fa-solid fa-user-graduate text-medium-gray icon-extra-medium top-6"></i>
                            <div class="feature-content">
                                <h6 class="d-block text-extra-dark-gray font-weight-600 alt-font mb-0 counter" data-to="850" data-speed="2000">850</h6>
                                <span class="text-small text-uppercase position-relative top-minus4">Today Register</span>
                            </div>
                        </div>
                    </div>
                    <!-- end counter box item -->
                    <!-- start counter box item -->
                    <div class="col md-padding-twelve-left sm-padding-15px-left wow animate__fadeInRight" data-wow-delay="0.6s">
                        <div class="feature-box-5 position-relative">
                            <i class="fa-light fa-user-group text-medium-gray icon-extra-medium top-6"></i>
                            <div class="feature-content">
                                <h6 class="d-block text-extra-dark-gray font-weight-600 alt-font mb-0 counter" data-to="650" data-speed="2000">650</h6>
                                <span class="text-small text-uppercase position-relative top-minus4">Total Register</span>
                            </div>
                        </div>
                    </div>
                    <!-- end counter box item -->
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">Total Register</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Civil</th>
                                            <th scope="col">Electrical</th>
                                            <th scope="col">Electronics</th>
                                            <th scope="col">Mechanical</th>
                                            <th scope="col">Power</th>
                                            <th scope="col">Computer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="7">Sorry! No data found</td>
                                        </tr>
                                        <!-- <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card">
                            <div class="card-header">Top Register Department Wise</div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Civil</th>
                                            <th scope="col">Electrical</th>
                                            <th scope="col">Electronics</th>
                                            <th scope="col">Mechanical</th>
                                            <th scope="col">Power</th>
                                            <th scope="col">Computer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="7">Sorry! No data found</td>
                                        </tr>
                                        <!-- <tr>
                                            <th scope="row">1</th>
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                            <td>@mdo</td>
                                        </tr> -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end counter section -->
        <!-- start parallax section -->
        <section class="parallax wow animate__fadeIn" data-parallax-background-ratio="0.3" style="background-image:url('{{ asset('/public/front/html/') }}/images/cover-2.jpg');">
            <div class="opacity-extra-medium bg-black"></div>
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-sm-10 text-center last-paragraph-no-margin">
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=sU3FkzUKHXU"><img src="{{ asset('/public/front/html/') }}/images/icon-play.png" class="w-130px" alt=""/></a>
                        <h4 class="alt-font text-white-2 margin-15px-bottom sm-margin-20px-bottom">Register. Joining. Fun.</h4>
                        <p class="text-extra-large font-weight-300 text-light-gray w-85 sm-w-100 d-inline-block margin-25px-bottom">Let's complete your register and invite your firends circle and joining the reunion. We will have a great fun for that day</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end parallax section -->
        <!-- start accordion section -->
        <section class="bg-light-gray border-none p-0 wow animate__fadeIn">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col padding-seven-lr padding-six-half-tb lg-padding-five-tb lg-padding-six-lr md-padding-six-all sm-padding-50px-tb sm-padding-15px-lr wow animate__fadeInLeft">
                        <h5 class="alt-font text-extra-dark-gray text-center text-lg-start margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom font-weight-600"><span class="font-weight-300 d-block sm-margin-15px-bottom">Here's the details question and answer related reunion.</span></h5>
                        <!-- start accordion -->
                        <div class="panel-group accordion-event accordion-style2" id="accordion-main" data-active-icon="fa-angle-up" data-inactive-icon="fa-angle-down">
                            <!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion-main" href="#collapseOne">
                                        <div class="panel-title">
                                            <span class="alt-font font-weight-600 text-deep-pink tab-tag">01</span>
                                            <span class="text-extra-dark-gray sm-w-80 d-inline-block">Where the reunion held in?</span>
                                            <i class="fa-solid fa-angle-up text-extra-dark-gray"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse show" data-bs-parent="#accordion-main">
                                    <div class="panel-body">Play ground of Cumilla Polytechnic Institute</div>
                                </div>
                            </div>
                            <!-- end tab content -->
                            <!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion-main" href="#collapseTwo">
                                        <div class="panel-title">
                                            <span class="alt-font font-weight-600 text-deep-pink tab-tag">02</span>
                                            <span class="text-extra-dark-gray sm-w-80 d-inline-block">When (Date & Time) the reunion held in?</span>
                                            <i class="fa-solid fa-angle-down text-extra-dark-gray"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" data-bs-parent="#accordion-main">
                                    <div class="panel-body">25th December 2024, Friday at 9.00 AM to day long</div>
                                </div>
                            </div>
                            <!-- end tab content -->
                            <!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion-main" href="#collapseThree">
                                        <div class="panel-title">
                                            <span class="alt-font font-weight-600 text-deep-pink tab-tag">03</span>
                                            <span class="text-extra-dark-gray sm-w-80 d-inline-block">Program Arrangement Details</span>
                                            <i class="fa-solid fa-angle-down text-extra-dark-gray"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" data-bs-parent="#accordion-main">
                                    <div class="panel-body">
                                        <ol class="list-group list-group-numbered border-0">
                                            <li class="list-group-item">Breakfast</li>
                                            <li class="list-group-item">Lunch(All religions)</li>
                                            <li class="list-group-item">Afternoon Snack</li>
                                            <li class="list-group-item">Premium Quality Branding T-Shirt</li>
                                            <li class="list-group-item">Branding Mug</li>
                                            <li class="list-group-item">Cofee Corner</li>
                                            <li class="list-group-item">Baby Feeding Zone</li>
                                            <li class="list-group-item">Female Rest Room</li>
                                            <li class="list-group-item">Photo Zone</li>
                                            <li class="list-group-item">Baby Gamming Zone</li>
                                            <li class="list-group-item">Female Guest Entertainment</li>
                                            <li class="list-group-item">Refel Draw</li>
                                            <li class="list-group-item">Foreighner Friends Joining(01674-779916 IMO)</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content --><!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion-main" href="#collapseFour">
                                        <div class="panel-title">
                                            <span class="alt-font font-weight-600 text-deep-pink tab-tag">04</span>
                                            <span class="text-extra-dark-gray sm-w-80 d-inline-block">Registration Fees</span>
                                            <i class="fa-solid fa-angle-down text-extra-dark-gray"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseFour" class="panel-collapse collapse" data-bs-parent="#accordion-main">
                                    <div class="panel-body">
                                        <ul class="list-group list-group-bullets border-0">
                                            <li class="list-group-item"><b>General:</b> 1530/- (Bkash/Nagad Charge Included)</li>
                                            <li class="list-group-item"><b>Guest/Family:</b> 1020/- (Bkash/Nagad Charge Included)</li>
                                        </ul>
                                        <p class="my-2 mt-4 fw-bold text-success">Payment System:</p>
                                        <ul class="list-group list-group-bullets border-0">
                                            <li class="list-group-item"><b class="text-danger">Bkash:</b> 01972-006267 (Make Payment)</li>
                                            <li class="list-group-item"><b class="text-danger">Nagad:</b> 01972-006267 (Make Payment)</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content --><!-- start tab content -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a class="accordion-toggle" data-bs-toggle="collapse" data-bs-parent="#accordion-main" href="#collapseFive">
                                        <div class="panel-title">
                                            <span class="alt-font font-weight-600 text-deep-pink tab-tag">05</span>
                                            <span class="text-extra-dark-gray sm-w-80 d-inline-block">Registration Rules</span>
                                            <i class="fa-solid fa-angle-down text-extra-dark-gray"></i>
                                        </div>
                                    </a>
                                </div>
                                <div id="collapseFive" class="panel-collapse collapse" data-bs-parent="#accordion-main">
                                    <div class="panel-body">
                                        <ol class="list-group list-group-numbered border-0">
                                            <li class="list-group-item">Please fillup the form for one time only</li>
                                            <li class="list-group-item">General member(Student of Session 2010-11 of CPI) joining fee 1.5K BDT</li>
                                            <li class="list-group-item">Per guest or family member joining fees 1K BDT</li>
                                            <li class="list-group-item">Don't need to pay the fees if you've any child/baby below 6 years.</li>
                                            <li class="list-group-item">Below 6 years baby must be register(No fees applicable) for the reunion</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab content -->
                        </div>
                        <!-- end accordion -->
                    </div>
                    <div class="col cover-background md-h-500px sm-h-350px wow animate__fadeInRight" style="background:url('{{ asset('/public/front/html/') }}/images/happyFriend.jpg')"></div>
                </div>
            </div>
        </section>
        <!-- end accordion section -->
        <!-- start team section -->
        <section id="team" class="wow animate__fadeIn">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-8 col-sm-10 margin-eight-bottom text-center last-paragraph-no-margin md-margin-40px-bottom sm-margin-30px-bottom">
                        <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase margin-15px-bottom">Working Team</h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since. Lorem Ipsum has been the industry. Lorem Ipsum has been the industry's standard dummy text since.</p>
                    </div>  
                </div>
                <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center">
                    <!-- start team item -->
                    <div class="col team-block text-start team-style-2 md-margin-seven-bottom sm-margin-40px-bottom wow animate__slideInUp">
                        <figure>
                            <div class="team-image sm-w-100">
                                <img src="https://via.placeholder.com/700x892" alt="">
                                <div class="team-overlay bg-deep-pink"></div>
                                <div class="team-member-position text-center margin-25px-top">
                                    <div class="text-extra-dark-gray font-weight-600 text-uppercase text-small alt-font">Dipu Dewan</div>
                                    <div class="text-extra-small text-uppercase text-medium-gray">Organizer</div>
                                </div>
                            </div>
                            <figcaption>
                                <div class="overlay-content text-center icon-social-small">
                                    <span class="text-small d-inline-block m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry dummy text.</span>
                                    <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb sm-margin-20px-tb"></div>
                                    <a href="http://www.facebbok.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="http://www.twitter.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="http://www.plus.google.com.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-google-plus-g"></i></a>
                                    <a href="http://www.instagram.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- end team item -->
                    <!-- start team item -->
                    <div class="col team-block text-start team-style-2 md-margin-seven-bottom sm-margin-40px-bottom wow animate__slideInUp" data-wow-delay="0.2s">
                        <figure>
                            <div class="team-image sm-w-100">
                                <img src="https://via.placeholder.com/700x892" alt="">
                                <div class="team-overlay bg-deep-pink"></div>
                                <div class="team-member-position text-center margin-25px-top">
                                    <div class="text-extra-dark-gray font-weight-600 text-uppercase text-small alt-font">Moftasim Billah Nahid</div>
                                    <div class="text-extra-small text-uppercase text-medium-gray">Creative Director</div>
                                </div>
                            </div>
                            <figcaption>
                                <div class="overlay-content text-center icon-social-small">
                                    <span class="text-small d-inline-block m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry dummy text.</span>
                                    <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb sm-margin-20px-tb"></div>
                                    <a href="http://www.facebbok.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="http://www.twitter.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="http://www.plus.google.com.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-google-plus-g"></i></a>
                                    <a href="http://www.instagram.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- end team item -->
                    <!-- start team item -->
                    <div class="col team-block text-start team-style-2 md-margin-seven-bottom sm-margin-40px-bottom wow animate__slideInUp" data-wow-delay="0.4s">
                        <figure>
                            <div class="team-image sm-w-100">
                                <img src="https://via.placeholder.com/700x892" alt="">
                                <div class="team-overlay bg-deep-pink"></div>
                                <div class="team-member-position text-center margin-25px-top">
                                    <div class="text-extra-dark-gray font-weight-600 text-uppercase text-small alt-font">Faruk Hossain Faysal</div>
                                    <div class="text-extra-small text-uppercase text-medium-gray">Creative Studio Head</div>
                                </div>
                            </div>
                            <figcaption>
                                <div class="overlay-content text-center icon-social-small">
                                    <span class="text-small d-inline-block m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry dummy text.</span>
                                    <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb sm-margin-20px-tb"></div>
                                    <a href="http://www.facebbok.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="http://www.twitter.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="http://www.plus.google.com.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-google-plus-g"></i></a>
                                    <a href="http://www.instagram.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- end team item -->
                    <!-- start team item -->
                    <div class="col team-block text-start team-style-2 md-margin-seven-bottom sm-margin-40px-bottom wow animate__slideInUp"  data-wow-delay="0.6s">
                        <figure>
                            <div class="team-image sm-w-100">
                                <img src="https://via.placeholder.com/700x892" alt="">
                                <div class="team-overlay bg-deep-pink"></div>
                                <div class="team-member-position text-center margin-25px-top">
                                    <div class="text-extra-dark-gray font-weight-600 text-uppercase text-small alt-font">Mirajur Rahman Tuhin</div>
                                    <div class="text-extra-small text-uppercase text-medium-gray">Co-Founder / Design</div>
                                </div>
                            </div>
                            <figcaption>
                                <div class="overlay-content text-center icon-social-small">
                                    <span class="text-small d-inline-block m-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry dummy text.</span>
                                    <div class="separator-line-horrizontal-full bg-deep-pink margin-eleven-tb sm-margin-20px-tb"></div>
                                    <a href="http://www.facebbok.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                                    <a href="http://www.twitter.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                                    <a href="http://www.plus.google.com.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-google-plus-g"></i></a>
                                    <a href="http://www.instagram.com" class="text-extra-dark-gray" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                                </div>
                            </figcaption>
                        </figure>
                    </div>
                    <!-- end team item -->
                </div>
            </div>
        </section>
        <!-- end team section -->
       
        <!-- start clients slider section  -->
        <section id="clients" class="parallax wow animate__fadeIn" data-parallax-background-ratio="0.4" style="background-image:url('https://via.placeholder.com/1920x1200');">
            <div class="opacity-medium bg-extra-dark-gray"></div>
            <div class="container text-center">
                <div class="row">    
                    <div class="swiper white-move" data-slider-options='{ "slidesPerView":"1", "loop":true, "autoplay":{"delay":3000 }, "stopOnLastSlide":true, "disableOnInteraction":false, "keyboard":true, "mousewheel":false, "navigation": { "nextEl": ".swiper-button-next", "prevEl": ".swiper-button-prev" }, "pagination": { "el": ".swiper-pagination", "clickable": true }, "breakpoints":{ "768":{ "slidesPerView":"3" },"992":{ "slidesPerView":"3" }, "1200":{ "slidesPerView":"4" } } }'>
                        <div class="swiper-wrapper">
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('/public/front/html/') }}/images/clients-logo1.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('/public/front/html/') }}/images/clients-logo2.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('/public/front/html/') }}/images/clients-logo3.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('/public/front/html/') }}/images/clients-logo4.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('/public/front/html/') }}/images/clients-logo1.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('/public/front/html/') }}/images/clients-logo2.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('/public/front/html/') }}/images/clients-logo3.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('/public/front/html/') }}/images/clients-logo4.png" alt=""></div><!-- end slider item -->
                        </div>
                        <!-- start swiper pagination -->
                         <!-- <div class="swiper-pagination swiper-pagination-white"></div> --> 
                        <!-- end swiper pagination -->
                    </div>
                </div>    
            </div>
        </section>
        <!-- end clients slider section -->
@endsection
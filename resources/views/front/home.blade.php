@extends('front.include')
@section('frontBody')

<!-- start hero section -->
<section id="home" class="p-0 parallax mobile-height wow animate__fadeIn" data-parallax-background-ratio="0.5" style="background-image:url('{{ asset('public/front/html/') }}/images/cpi_cover.jpg');height:570px">
    <div class="opacity-extra-medium bg-extra-dark-gray"></div>
    <div class="container position-relative full-screen">
        <div class="row h-100 align-items-center">
            <div class="col-12 text-center">
                <img src="{{ asset('public/front/html/') }}/images/text2.png" alt=""/>
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
                    <div class="col-lg-10 col-12 margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center last-paragraph-no-margin topHeader">
                        <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase margin-15px-bottom">CPI Engineer's Reunion 2024</h5>
                        <h5 class="alt-font text-deep-pink margin-5px-bottom d-block mb-3">Session 2010-11</h5>
                        <p class="mb-0">Reunion 2024 is going to be held on 25th December 2024 in the joint initiative of all departments of Cumilla Polytechnic Institute for the session 2010-11. All friends of all departments of the 2010-11 session are invited to participate in the reunion.</p>
                        <p>Register quickly to participate in the reunion and encourage your friends too.</p>
                    </div>  
                </div>
            </div> 
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="padding-seven-lr padding-six-half-tb lg-padding-five-tb lg-padding-six-lr md-padding-six-all sm-padding-50px-tb sm-padding-15px-lr wow animate__fadeInLeft">
                            <h4 class="alt-font text-extra-dark-gray text-center text-lg-start margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom font-weight-600"><span class="font-weight-300 d-block sm-margin-15px-bottom">Here's the details related reunion.</span></h4>
                            <!-- start accordion -->
                            <div class="panel-group accordion-event accordion-style2" id="accordion-main" data-active-icon="fa-angle-up" data-inactive-icon="fa-angle-down">
                                <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Reunion Venue</h6>
                                <p class="fw-bold">Play Ground of Cumilla Polytechnic Institute</p>
                                <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Reunion Will Held</h6>
                                <p class="fw-bold">25th December 2024, Wednesday at 8.30 AM to Day Long</p>
                                <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Program Arrangement Details</h6>
                                
                                <ul>
                                    <li>Breakfast(Premium Package)</li>
                                    <li>Lunch(Premium Package for Any Religion)</li>
                                    <li>Evening Snacks</li>
                                    <li>Premium Quality Branded T-Shirt(Polo)</li>
                                    <li>Souvenir Mog(Branded)</li>
                                    <li>Coffee Corner</li>
                                    <li>Baby Feeding Zone</li>
                                    <li>Female Rest Room</li>
                                    <li>Photo Zone</li>
                                    <li>Fun Zone for Kids</li>
                                    <li>Guest Female/Entertainment for Woman</li>
                                    <li>Raffle Draw (Attractive Gift)</li>
                                    <li>Gettings Video Message Display About Ex Engineers from Foreigners Friends(01926-139346 Imo,WhatsApp, Viber)</li>
                                </ul>
                                <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Registration Fees</h6>
                                
                                <ul>
                                    <li><b>Participate:</b> 1530/- (Bkash/Nagad Charge Included)</li>
                                    <li><b>Guest:</b> 1020/- (Bkash/Nagad Charge Included)</li>
                                </ul>
                                <p class="my-2 mt-4 fw-bold text-success">Payment System:</p>
                                <ul>
                                    <li><b class="text-danger">Bkash:</b> 01972-006267 (Merchant Make Payment)</li>
                                    <li><b class="text-danger">Nagad:</b> 01972-006267 (Merchant Make Payment)</li>
                                </ul>
                                <h6 class="text-extra-dark-gray sm-w-80 d-inline-block mb-0 fw-bold">Registration Rules</h6>
                                
                                <ol>
                                    <li>Fill The Form for Only Once Even If There Are Multiple Guests</li>
                                    <li>General Member(Student of Session 2010-11 of CPI) joining fee 1530 BDT</li>
                                    <li>Per Guest Member Joining Fees 1020 BDT</li>
                                    <li>6 Years of Age Own Children Must Register, Don't Need to Below 6 Years</li>
                                </ol>
                            </div>
                            <!-- end accordion -->
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <img src="{{ asset('public/front/html/') }}/images/permission.jpg" style="min-height:550px" alt="" class="w-100">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center"><a href="{{ route('studentRegister') }}" class="btn btn-success my-4"><i class="fa-solid fa-right-to-bracket"></i> Let's Register</a></div>
                </div>
            </div>
        </section>
        <!-- end counter section -->
        <!-- start parallax section -->
        <section class="parallax wow animate__fadeIn" data-parallax-background-ratio="0.3" style="background-image:url('{{ asset('public/front/html/') }}/images/cover-2.jpg');">
            <div class="opacity-extra-medium bg-black"></div>
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-7 col-sm-10 text-center last-paragraph-no-margin">
                        <a class="popup-youtube" href="https://www.youtube.com/watch?v=R-r-M7QiOCA"><img src="{{ asset('public/front/html/') }}/images/icon-play.png" class="w-130px" alt=""/></a>
                        <h4 class="alt-font text-white-2 margin-15px-bottom sm-margin-20px-bottom">Register. Joining. Fun.</h4>
                        <p class="text-extra-large font-weight-300 text-light-gray w-85 sm-w-100 d-inline-block margin-25px-bottom">Let's complete your register and invite your firends circle and joining the reunion. We will have a great fun for that day</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end parallax section -->
        <!-- start accordion section -->
        <section class="bg-light-gray border-none p-0 wow animate__fadeIn py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-12 text-center">
                        <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase margin-40px-bottom ">Registration Procedure Details</h5>
                    </div>  
                </div>
                @php
                    $verifiedList = \App\Models\studentRegister::where(['status'=>'Verified'])->orderby('id','DESC')->get();
                    $verifiedGuest = \App\Models\geustRegister::where(['status'=>'Verified'])->orderby('id','DESC')->get();

                    $todayRegister = \App\Models\studentRegister::whereDay('created_at',date('d'))->where(['status'=>'Verified'])->get();
                    //echo now();

                    $totalRegister = count($verifiedList)+count($verifiedGuest);
                @endphp
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4">
                    <!-- start counter box item -->
                    <div class="col md-padding-twelve-left md-margin-60px-bottom sm-margin-40px-bottom sm-padding-15px-left wow animate__fadeInRight">
                        <div class="feature-box-5 position-relative">
                            <i class="fa-solid fa-users text-medium-gray icon-extra-medium top-6"></i>
                            <div class="feature-content">
                                <h6 class="d-block text-extra-dark-gray font-weight-600 alt-font mb-0 counter" data-to="{{ count($verifiedList) }}" data-speed="2000">{{ count($verifiedList) }}</h6>
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
                                <h6 class="d-block text-extra-dark-gray font-weight-600 alt-font mb-0 counter" data-to="{{ count($verifiedGuest) }}" data-speed="2000">{{ count($verifiedGuest) }}</h6>
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
                                <h6 class="d-block text-extra-dark-gray font-weight-600 alt-font mb-0 counter" data-to="{{ count($todayRegister) }}" data-speed="2000">{{ count($todayRegister) }}</h6>
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
                                <h6 class="d-block text-extra-dark-gray font-weight-600 alt-font mb-0 counter" data-to="{{ $totalRegister }}" data-speed="2000">{{ $totalRegister }}</h6>
                                <span class="text-small text-uppercase position-relative top-minus4">Total Joining</span>
                            </div>
                        </div>
                    </div>
                    <!-- end counter box item -->
                </div>
                <div class="row mt-5">
                    <div class="col-12 col-md-10 mx-auto">
                        <div class="card">
                            <div class="card-header">Verified Members</div>
                            <div class="card-body table-responsive">
                                <table class="table text-center" id="dataTable">
                                    <thead>
                                        <th class="text-center">SL</th>
                                        <th class="text-center">Avatar</th>
                                        <th class="text-center">Name</th>
                                        <th class="text-center">Department</th>
                                        <th class="text-center">Registration</th>
                                        <th class="text-center">Verify</th>
                                    </thead>
                                    <tbody>
                                        @if(!empty($verifiedList))
                                            @php
                                                $x = 1;
                                            @endphp
                                            @foreach($verifiedList as $verify)
                                        <tr>
                                            <td class="align-middle text-center">{{ $x }}</td>
                                            <td class="align-middle text-center">
                                                @if(!empty($verify->avatar))
                                                <img src="{{ asset('public/upload/student/') }}/{{ $verify->avatar }}" alt="{{ $verify->studentName }}" class="rounded-0" style="height:60px;width:60px">
                                                @else
                                                <img src="{{ asset('public/upload/') }}/avatar.png" alt="{{ $verify->studentName }}" class="w-100 img-thumbnail rounded-0">
                                            @endif
                                            </td>
                                            <td class="align-middle text-center">{{ $verify->studentName }}</td>
                                            <td class="align-middle text-center">{{ $verify->department  }}
                                                <br> ({{ $verify->shift  }} Shift)
                                            </td>
                                            <td class="align-middle text-center">{{ \Carbon\Carbon::parse($verify->created_at)->format('d/m/Y') }}</td>
                                            <td class="align-middle text-center">{{ \Carbon\Carbon::parse($verify->updated_at)->format('d/m/Y') }}</td>
                                        </tr>
                                            @php
                                                $x++;
                                            @endphp
                                            @endforeach
                                        @else
                                        <tr>
                                            <td colspan="7">Sorry! No data found</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center"><a href="{{ route('studentRegister') }}" class="btn btn-success btn-lg my-2"><i class="fa-solid fa-right-to-bracket"></i> Let's Register</a></div>
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
                                <img src="{{ url('/') }}/public/upload/student/1731844018.jpg" alt="">
                                <div class="team-overlay bg-deep-pink"></div>
                                <div class="team-member-position text-center margin-25px-top">
                                    <div class="text-extra-dark-gray font-weight-600 text-uppercase text-small alt-font">MD DIPU DEWAN</div>
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
                                <img src="{{ url('/') }}/public/upload/student/1731772172.jpg" alt="">
                                <div class="team-overlay bg-deep-pink"></div>
                                <div class="team-member-position text-center margin-25px-top">
                                    <div class="text-extra-dark-gray font-weight-600 text-uppercase text-small alt-font">Moftachim Billah Nahid</div>
                                    <div class="text-extra-small text-uppercase text-medium-gray">CO-Organizer</div>
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
                                <img src="{{ url('/') }}/public/upload/student/1731818129.jpg" alt="">
                                <div class="team-overlay bg-deep-pink"></div>
                                <div class="team-member-position text-center margin-25px-top">
                                    <div class="text-extra-dark-gray font-weight-600 text-uppercase text-small alt-font">Md. Faruq Hossain Faysal</div>
                                    <div class="text-extra-small text-uppercase text-medium-gray">IT Management Team</div>
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
                                    <div class="text-extra-small text-uppercase text-medium-gray">Media & Graphics Team</div>
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
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('public/front/html/') }}/images/clients-logo1.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('public/front/html/') }}/images/clients-logo2.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('public/front/html/') }}/images/clients-logo3.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('public/front/html/') }}/images/clients-logo4.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('public/front/html/') }}/images/clients-logo1.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('public/front/html/') }}/images/clients-logo2.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('public/front/html/') }}/images/clients-logo3.png" alt=""></div><!-- end slider item -->
                            <!-- start slider item --><div class="swiper-slide text-center"><img src="{{ asset('public/front/html/') }}/images/clients-logo4.png" alt=""></div><!-- end slider item -->
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
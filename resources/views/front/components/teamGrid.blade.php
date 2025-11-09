<section id="team" class="wow animate__fadeIn">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8 col-sm-10 margin-eight-bottom text-center last-paragraph-no-margin md-margin-40px-bottom sm-margin-30px-bottom">
                <h5 class="alt-font font-weight-700 text-extra-dark-gray text-uppercase margin-15px-bottom">Working Team</h5>
                <p class="mb-0">Meet the people who are actively organizing and supporting the CPI Reunion.</p>
            </div>  
        </div>
        <div class="row row-cols-1 row-cols-lg-4 row-cols-sm-2 justify-content-center">
            @if(isset($team) && count($team) > 0)
                @foreach($team as $member)
                <div class="col mb-4">
                    <div class="card border-0 shadow-sm h-100 team-card">
                        <div class="position-relative">
                            <img class="card-img-top team-image" src="{{ !empty($member->avatar) ? asset('public/upload/team/'.$member->avatar) : 'https://via.placeholder.com/700x892' }}" alt="{{ $member->name }}">
                            <div class="team-badge">{{ $member->role }}</div>
                        </div>
                        <div class="card-body text-center">
                            <h6 class="mb-1 text-extra-dark-gray font-weight-600 text-uppercase">{{ $member->name }}</h6>
                            @if(!empty($member->department))
                                <div class="text-extra-small text-uppercase text-medium-gray">{{ $member->department }}</div>
                            @endif
                            <div class="d-flex justify-content-center gap-3 mt-3 team-social">
                                @if(!empty($member->facebook))<a href="{{ $member->facebook }}" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>@endif
                                @if(!empty($member->twitter))<a href="{{ $member->twitter }}" target="_blank" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>@endif
                                @if(!empty($member->google))<a href="{{ $member->google }}" target="_blank" aria-label="Google Plus"><i class="fa-brands fa-google-plus-g"></i></a>@endif
                                @if(!empty($member->instagram))<a href="{{ $member->instagram }}" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>@endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="col-12 text-center text-muted">Team coming soon.</div>
            @endif
        </div>
    </div>
</section>
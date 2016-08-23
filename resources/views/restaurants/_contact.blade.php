<div class="row">
    <div class="small-12 medium-6 columns">
        <p>
            <a href="tel: {{ $restaurant->contacts['phone1'] }}">
                <i class="fa fa-phone"></i> {{ $restaurant->contacts['phone1'] }}
            </a>
        </p>
        <p>
            <a href="tel:{{ $restaurant->contacts['phone2'] }}">
                <i class="fa fa-phone"></i> {{ $restaurant->contacts['phone2'] }}
            </a>
        </p>
    </div>
    <div class="small-12 medium-6 columns">
        <p>
            <a href="mailto:{{ $restaurant->contacts['email']}}">
                <i class="fa fa-envelope"></i> {{ $restaurant->contacts['email']}}
            </a>
        </p>
        <p>
            <a href="https://{{ $restaurant->contacts['website']}}" target="_blank">
                <i class="fa fa-globe"></i> {{ $restaurant->contacts['website']}}
            </a>
        </p>
    </div>
    <div class="small-12 medium-12 columns">
        @if($restaurant->bookable == 1)
            <a href="" class="button extended">Book Now </a>
        @endif
        {{-- <p>
            <i class="fa fa-user"></i> {{ $restaurant->contacts['representative']}}
            {{ $restaurant->contacts['role']}}
            
        </p> --}}
        <p class="social">
            <a href="https:\\facebook.com\{{ $restaurant->contacts['facebook']}}">
                <i class="fa fa-facebook"></i>
            </a>
        </p>
    </div>
</div>
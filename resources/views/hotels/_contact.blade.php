<div class="row">
    <div class="small-12 medium-6 columns">
        <p>
            <a href="tel: {{ $hotel->contacts['phone1'] }}">
                <i class="fa fa-phone"></i> {{ $hotel->contacts['phone1'] }}
            </a>
        </p>
        <p>
            <a href="tel:{{ $hotel->contacts['phone2'] }}">
                <i class="fa fa-phone"></i> {{ $hotel->contacts['phone2'] }}
            </a>
        </p>
    </div>
    <div class="small-12 medium-6 columns">
        <p>
            <a href="mailto:{{ $hotel->contacts['email']}}">
                <i class="fa fa-envelope"></i> {{ $hotel->contacts['email']}}
            </a>
        </p>
        <p>
            <a href="https://{{ $hotel->contacts['website']}}" target="_blank">
                <i class="fa fa-globe"></i> {{ $hotel->contacts['website']}}
            </a>
        </p>  
    </div>
    <div class="small-12 medium-12 columns">
    @if($hotel->bookable == 1)
        <a href="" class="button extended">Book Now </a>
    @endif
        {{-- <p>
            <i class="fa fa-user"></i> {{ $hotel->contacts['representative']}}
            {{ $hotel->contacts['role']}}
            
        </p> --}}
        <p class="social">
            <a href="https:\\facebook.com\{{ $hotel->contacts['facebook']}}">
                <i class="fa fa-facebook"></i>
            </a>
        </p>  
    </div>
</div>
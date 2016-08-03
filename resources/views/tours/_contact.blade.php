<div class="row">
    <div class="small-12 medium-6 columns">
        <p>
            <a href="">
                <i class="fa fa-phone"></i> {{ $tour->contacts['phone1'] }}
            </a>
        </p>
        <p>
            <a href="">
                <i class="fa fa-phone"></i> {{ $tour->contacts['phone2'] }}
            </a>
        </p>
    </div>
    <div class="small-12 medium-6 columns">
        <p>
            <a href="mailto:{{ $tour->contacts['email']}}">
                <i class="fa fa-envelope"></i> {{ $tour->contacts['email']}}
            </a>
        </p>
        <p>
            <a href="">
                <i class="fa fa-globe"></i> {{ $tour->contacts['website']}}
            </a>
        </p>  
        <a href="" class="button extended">Book Now </a>
    </div>
    <div class="small-12 medium-12 columns">
        <p>
            <i class="fa fa-user"></i> {{ $tour->contacts['representative']}}
            {{ $tour->contacts['role']}}
            
        </p>
        <p>
            <a href="https:\\facebook.com\{{ $tour->contacts['facebook']}}">
                <i class="fa fa-facebook"></i>
            </a>
        </p>  
    </div>
</div>
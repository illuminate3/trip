<div class="row">
    <div class="small-12 medium-6 columns">
        <p>
            <a href="">
                <i class="fa fa-phone"></i> {{ $venue->contacts['phone1'] }}
            </a>
        </p>
        <p>
            <a href="">
                <i class="fa fa-phone"></i> {{ $venue->contacts['phone2'] }}
            </a>
        </p>
    </div>
    <div class="small-12 medium-6 columns">
        <p>
            <a href="mailto:{{ $venue->contacts['email']}}">
                <i class="fa fa-envelope"></i> {{ $venue->contacts['email']}}
            </a>
        </p>
        <p>
            <a href="">
                <i class="fa fa-globe"></i> {{ $venue->contacts['website']}}
            </a>
        </p>  
        <a href="" class="button extended">Book Now </a>
    </div>
    <div class="small-12 medium-12 columns">
        <p>
            <i class="fa fa-user"></i> {{ $venue->contacts['representative']}}
            {{ $venue->contacts['role']}}
            
        </p>
        <p>
            <a href="https:\\facebook.com\{{ $venue->contacts['facebook']}}">
                <i class="fa fa-facebook"></i>
            </a>
        </p>  
    </div>
    <div class="medium-12 column">
        {!! Mapper::render() !!}
    </div>
</div>
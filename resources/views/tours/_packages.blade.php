<h2 class="col-md-12"> Packages </h2>
@foreach($tour->packages as $package)
    <div class="col-md-6">
        <div class="box">
            <img src="{{ $package->image }}" alt="" class="img-responsive img-thumbnail">
            <p>Type: <b>{{ $package->type }}</b> </p>
            <p>Price: <b>${{ $package->price }}</b></p>
            <p>Duration: <b>{{ $package->duration }}</b></p>
            <p>Difficulty: {{ $package->difficulty }}</p>
            <p>Season: {{ $package->best_season }}</p>
            <p>Package Description: {{ str_limit($package->description,50,'...') }}</p>
        </div>
    </div>
@endforeach
<h3>Contact Information</h3>

<div class="row">
    <p>Phone 1: <b>{{$tour->contacts->phone1}}</b></p>

    <p>Phone 2: {{$tour->contacts->phone2}}</p>

    <p>Fax: {{$tour->contacts->fax}}</p>

    <p>Mobile: {{$tour->contacts->mobile}}</p>

    <p>email: {{$tour->contacts->email}}</p>

    <p>website: {{$tour->contacts->website}}</p>

    <p>Address: {{$tour->contacts->address}}</p>

    <p>Representative: {{$tour->contacts->representative}}</p>

    <p>Role: {{$tour->contacts->role}}</p>

    <p>facebook: {{$tour->contacts->facebook}}</p>
    {!! Mapper::render() !!}
</div>


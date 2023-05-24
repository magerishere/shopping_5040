@if($buttonLink)
    <a href="{{$buttonLink}}" class="btn btn-{{$buttonColor}}" {{$attributes}}>{{$slot}}</a>
@else
    <button type="{{$buttonType}}" class="btn btn-{{$buttonColor}}" {{$attributes}}>{{$slot}}</button>
@endif

@if($buttonLink)
    <a href="{{$buttonLink}}" class="btn btn-{{$buttonColor}}">{{$slot}}</a>
@else
    <button type="{{$buttonType}}" class="btn btn-{{$buttonColor}}">{{$slot}}</button>
@endif

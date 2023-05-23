<form action="{{$routeName}}" method="{{$formMethod === 'GET' ? 'GET' : 'POST'}}">
    @csrf
    @if(in_array($formMethod,['PUT','PATCH','DELETE']))
        @method($formMethod)
    @endif
    <div class="row">
        {{$slot}}
    </div>

    {{--    Submit Button Slot Must Outside of div with class row for correct style --}}
    {{$submitButtonSlot}}

</form>

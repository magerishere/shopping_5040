<form action="{{$routeName}}" method="{{$formMethod === 'GET' ? 'GET' : 'POST'}}">
    @session('session_message')
    <div class="alert alert-{{session()->get('session_message_type')}}">
        {{session()->get('session_message')}}
    </div>
    @endsession
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

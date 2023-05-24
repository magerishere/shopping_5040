<form action="{{$routeName}}" method="{{$formMethod === 'GET' ? 'GET' : 'POST'}}"
      @if($hasFile)
          enctype="multipart/form-data"
    @endif
>

    @csrf
    @if(in_array($formMethod,['PUT','PATCH','DELETE']))
        @method($formMethod)
    @endif
    <div class="row">
        {{$slot}}
    </div>

    {{--    Submit Button Slot Must Outside of div with class row for correct style --}}
    @if(isset($submitButtonSlot))
        {{$submitButtonSlot}}
    @else
        <button class="btn btn-primary">Submit</button>
    @endif


</form>

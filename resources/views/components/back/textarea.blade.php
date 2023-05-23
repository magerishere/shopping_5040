<div class="col-{{$size}} col-md-{{$sizeMd}} col-lg-{{$sizeLg}}">
    <div class="mb-3">
        <label for="{{$inputId}}" class="form-label">{{$labelText}}</label>
        @switch($editorName)
            @case('tinymce')
                <textarea name="{{$inputName}}" id="{{$inputId}}" cols="30" rows="10"
                    @class([
                        "form-control",
                        'is-valid' => $errors->any() && !$errors->has($inputName),
                        'is-invalid' => $errors->has($inputName),
                    ])>{{$inputValue}}</textarea>
                @break
            @default
                <textarea name="{{$inputName}}" id="{{$inputId}}" cols="30" rows="10"
                    @class([
                        "form-control",
                        'is-valid' => $errors->any() && !$errors->has($inputName),
                        'is-invalid' => $errors->has($inputName),
                    ])>{{$inputValue}}</textarea>
        @endswitch

        @error($inputName)
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
</div>

@push('scripts')
    @if($editorName)
        @switch($editorName)
            @case('tinymce')
                <script type="module">
                    // tinymce.init({
                    //     selector: 'textarea#content', // Replace this CSS selector to match the placeholder element for TinyMCE
                    //     plugins: 'code table lists',
                    //     toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'
                    // });
                </script>
        @endswitch
    @endif
@endpush


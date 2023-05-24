<div class="col-{{$size}} col-md-{{$sizeMd}} col-lg-{{$sizeLg}}">
    <div class="mb-3">
        @switch($inputType)
            @case ('hidden')
                <input type="{{$inputType}}"
                       id="{{$inputId}}"
                       name="{{$inputName}}"
                       value="{{$inputValue}}"
                >
                @break

            @case ('number')
                <label for="{{$inputId}}" class="form-label">{{$labelText}}</label>
                <input type="{{$inputType}}"
                       @class([
                            "form-control",
                            'is-valid' => $errors->any() && !$errors->has($inputName),
                            'is-invalid' => $errors->has($inputName),
                        ])
                       id="{{$inputId}}"
                       name="{{$inputName}}"
                       value="{{old($inputName,$inputValue)}}"
                    {{$attributes}}
                >
                @break
            @default
                <label for="{{$inputId}}" class="form-label">{{$labelText}}</label>
                <input type="{{$inputType}}"
                       @class([
                            "form-control",
                            'is-valid' => $errors->any() && !$errors->has($inputName),
                            'is-invalid' => $errors->has($inputName),
                        ])
                       id="{{$inputId}}"
                       name="{{$inputName}}"
                       value="{{old($inputName,$inputValue)}}"
                >
        @endswitch

        @error($inputName)
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
</div>

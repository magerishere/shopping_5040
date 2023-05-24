<div class="col-{{$size}} col-md-{{$sizeMd}} col-lg-{{$sizeLg}}">
    <div class="mb-3">
        @switch($inputType)
            @case ('file')
                @if($inputValue)
                    <div class="mb-3">
                        <x-back.image
                            imageSrc="{{$inputValue}}"
                            imageAlt="Image"
                            imageWidth="100"
                            imageHeight="100"
                            imageMode="normal"
                        />
                    </div>

                @endif
                <label for="{{$inputId}}" class="form-label">{{$labelText}}</label>
                <input type="{{$inputType}}"
                       @class([
                            "form-control",
                            'is-valid' => $errors->any() && !$errors->has($inputName),
                            'is-invalid' => $errors->has($inputName),
                        ])
                       id="{{$inputId}}"
                       name="{{$inputName}}"
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
                       value="{{$inputValue}}"
                >
        @endswitch

        @error($inputName)
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
</div>

<div class="col-{{$size}} col-md-{{$sizeMd}} col-lg-{{$sizeLg}}">
    <div class="mb-3">
        <label for="{{$inputId}}" class="form-label">{{$labelText}}</label>
        <input type="{{$inputType}}"
               @class([
                    "form-control",
                    'is-valid' => $errors->any() && !$errors->has($inputName),
                    'is-invalid' => $errors->has($inputName),
                ])
               id="{{$inputId}}"
               name="{{$inputName}}">
        @error($inputName)
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>
</div>

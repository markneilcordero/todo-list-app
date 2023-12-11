<div class="input-group has-validation">
    <div class="form-floating is-invalid">
        <input type="{{ $type }}" name="{{ $name }}" class="form-control @error($errorValue) is-invalid @enderror" id="{{ $id }}" autocomplete="off">
        <label for="{{ $labelTitle }}">{{ $labelValue }}</label>
    </div>
    <div class="invalid-feedback">
        @error($errorValue)
            {{ $message }}
        @enderror
    </div>
</div>
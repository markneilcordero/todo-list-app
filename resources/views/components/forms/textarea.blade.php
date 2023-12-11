<div class="input-group has-validation">
    <div class="form-floating is-invalid">
        <textarea style="height:400px;" name="{{ $name }}" class="form-control @error($errorValue) is-invalid @enderror" id="{{ $id }}"></textarea>
        <label for="{{ $labelTitle }}">{{ $labelValue }}</label>
    </div>
    <div class="invalid-feedback">
        @error($errorValue)
            {{ $message }}
        @enderror
    </div>
</div>
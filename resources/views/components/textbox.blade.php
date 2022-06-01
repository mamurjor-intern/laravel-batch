<div class="mb-3">
    <label for="{{ $name }}" class="form-label {{ $required ?? '' }}">{{ $labelName }}</label>

    <input type="{{ $type ?? 'text' }}" class="form-control form-control-sm {{ $inputClass ?? '' }}" name="{{ $name }}"
        id="{{ $name }}" value="{{ $value ?? '' }}">

    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif

</div>

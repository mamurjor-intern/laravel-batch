<div class="mb-3">
    <label for="{{ $name }}" class="form-label {{ $required ?? '' }}">{{ $labelName }}</label>

    <textarea rows="{{ $rows ?? '3' }}" class="form-control form-control-sm {{ $inputClass ?? '' }}" name="{{ $name }}"
        id="{{ $name }}">{!! $value ?? '' !!}</textarea>

    @if (!empty($errorName))
        @error($errorName)
            <span class="text-danger">{{ $message }}</span>
        @enderror
    @endif

</div>

<div class="input-group">
    <label for="{{ strtolower($label) }}">{{ $label }}</label>
    @error(strtolower($label))
        <div class="error">{{ $message }}</div>
    @enderror
    <input name="{{ strtolower($label) }}" type="{{ $inputType ?? 'text' }}"
        @if ($model) wire:model.lazy="{{ $model }}" @endif
        placeholder="Enter {{ strtolower($label) }}" value="{{ old(strtolower($label)) }}">
</div>

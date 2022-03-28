<div class="input-group">
    <label for="{{ strtolower($label) }}">{{ $label }}</label>
    @error(strtolower($label))
        <div class="error">{{ $message }}</div>
    @enderror
    <textarea name="{{ strtolower($label) }}" id="{{ strtolower($label) }}" cols="30" rows="10"
        placeholder=" Enter {{ strtolower($label) }}" value="{{ old(strtolower($label)) }}"></textarea>
</div>

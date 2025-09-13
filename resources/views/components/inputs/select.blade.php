@if(!empty($label))
    <label for="{{ $name }}" class="block text-sm font-medium text-gray-700 mb-2">{{ __($label) }}</label>
@endif
<div class="space-y-2">
    <ul class="space-y-1">
        @foreach($options as $key => $val)
            @php $find = false; @endphp
            @if(is_array($value))
                @foreach($value as $checked)
                    @if($checked == $key)
                        @php $find = true; @endphp
                    @endif
                @endforeach
            @endif
            <li>
                <label class="flex items-center py-1">
                    <input type="checkbox" class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded" id="{{ $name.'_'.$key }}" name="{{ $name }}[]" value="{{ $key }}" @if($find) checked @endif>
                    <span class="ml-2 text-sm text-gray-900">{{ $val }}</span>
                </label>
            </li>
        @endforeach
    </ul>
    @error($name)
        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>

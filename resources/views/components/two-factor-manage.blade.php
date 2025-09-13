@if (auth()->user()->two_factor_secret)
    <div class="mb-4">
        {{ __('Two factor authentication has been enabled.') }}
    </div>
    <form method="POST" action="{{ url('/user/two-factor-authentication') }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md font-medium transition-colors">{{ __('Disable') }}</button>
    </form>

    @if(session('status') == 'two-factor-authentication-enabled')
        <div class="flex flex-wrap mt-4 gap-6">
            <div class="w-full lg:w-1/2">
                {!! auth()->user()->twoFactorQrCodeSvg() !!}
                <p class="text-gray-500 mt-3">{{ __('Please copy the following QR code into your phones authenticatior application.') }}</p>
            </div>

            <div class="w-full lg:w-1/2">
                @php $codes = json_decode(decrypt(auth()->user()->two_factor_recovery_codes)); @endphp
                <h5 class="text-lg font-semibold mb-2">{{ __('Recovery Codes') }}:</h5>
                <ol class="list-decimal list-inside space-y-1 mb-3">
                    @foreach($codes as $code)
                        <li class="text-sm">{{ $code }}</li>
                    @endforeach
                </ol>
                <p class="text-gray-500 text-sm">{{ __('Please save your recovery codes.') }}</p>
            </div>
        </div>
    @endif
@else
    <div class="mb-4">
        {{ __('Two factor authentication is disabled.') }}
    </div>
    <form method="POST" action="{{url('/user/two-factor-authentication')}}">
        @csrf
        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md font-medium transition-colors">{{ __('Enable') }}</button>
    </form>
@endif

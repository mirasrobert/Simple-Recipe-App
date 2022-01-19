@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1">
                    <i class="far fa-times-circle fill-current h-6 w-6 text-red-500 mr-4 fa-2x"></i>
                </div>
                <div>
                    <p class="font-bold">{{ __('Whoops! Something went wrong.') }}</p>
                    <div>
                        <ul class="mt-1 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

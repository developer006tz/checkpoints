<x-app-layout>
    <div class="button-wrapper float-right">
        <a class="add-btn  bg-white outline-dotted outline-2 outline-offset-2" href="{{route('station.index')}}">{{ __('add') }}</a>
        <a class="add-btn excel ml-2  bg-white outline-dotted outline-2 outline-offset-2" href="{{route('station.excel')}}">{{ __('Upload By Excel') }}</a>
        <a class="add-btn ml-2  bg-white outline-dotted outline-2 outline-offset-2" href="{{route('station.display')}}">{{ __('manage') }}</a>
        
    </div>

    <div class="py-12">

        @if (session('success'))
            <div class="flex max-w-6xl mx-auto sm:px-6  p-4 mb-4 text-sm text-green-800 text-center rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="text text-center">
                <span class="font-medium text-center">Success</span> {{ session('success') }}
            </div>
            </div>
            @endif

         
            @if (session('error'))
            <div class="flex max-w-6xl mx-auto sm:px-6  p-4 mb-4 text-sm text-green-800 text-center rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="text text-center">
                <span class="font-medium text-center">Success</span> {{ session('error') }}
            </div>
            </div>
            @endif

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <div id="map" style="height: 500px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

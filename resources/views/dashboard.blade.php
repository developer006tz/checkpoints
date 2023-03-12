<x-app-layout>
    <div class="button-wrapper float-right">
        <a class="add-btn  bg-white outline-dotted outline-2 outline-offset-2" href="{{route('station.index')}}">{{ __('add') }}</a>
        
        <a class="add-btn ml-2  bg-white outline-dotted outline-2 outline-offset-2" href="{{route('profile.edit')}}">{{ __('manage') }}</a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div id="map" style="height: 500px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="container">
                        <div class="row" >
                            <div class="col col-lg-3">
                                <img src="{{$movie->image}}" alt="" style="width: 20rem;">
                            </div>
                            <div class="col">
                                <div>
                                    {{$movie->title}} ({{date('Y', strtotime($movie->release_date))}})
                                </div>
                                <div>
                                    Resúmen
                                </div>
                                <div>
                                    {{$movie->overview}}
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>

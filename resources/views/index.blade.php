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
                    @foreach($movies as $movie)
                        <div class="card" style="width: 18rem;">
                            <img src="{{$movie->image}}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{$movie->title}}</h5>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">{{$movie->release_date}}</li>
                                <li class="list-group-item">{{$movie->status}}</li>
                                <li class="list-group-item">{{$movie->adult}}</li>
                            </ul>
                           {{-- <div class="card-body">
                                <a href="#" class="card-link">Card link</a>
                                <a href="#" class="card-link">Another link</a>
                            </div>--}}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">       
           
          @foreach ($marvel_characters as $marvel_character)
                <div class=" col-xs-12 col-md-4 col-sm-6 col-lg-3">
                    
                    <div class="card" style='margin-bottom:20px; ' >
                        <img src="{{$marvel_character['thumbnail']}}" class="card-img-top" alt="..." height=320>
                        <div class="card-body">
                            <h2 style="font-size: 15px;">{{$marvel_character['name']}}</h2>
                        </div>

                                     
                    </div>
                </a>

                </div>
            @endforeach           
    
    </div>
    </div>
@endsection
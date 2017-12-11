@extends('layouts.app')

@section('content')

    <div class="col-md-8">

        @foreach($discussions as $d)

            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <img src="{{ asset($d->user->avatar)}}" alt="user-name" width="40px" height="40px" style="border-radius: 50%">&nbsp; &nbsp; &nbsp;
                    <span>{{$d->user->name}}</span>

                    <a href="{{route('discuss.show' ,['slug' => $d->slug])}}" class="btn btn-default pull-left">عرض</a>
                    <span class="pull-left" style="line-height: 2.5;">{{ $d->created_at}}</span>
                    
                </div>

                <div class="panel-body">

                    <h3 class="text-center">
                       <b> {{$d->title}} </b>
                    </h3>

                    <p class="text-center">
                        {{str_limit($d->content)}}
                    </p>
                    
                </div>


                <div class="panel-footer">
                    <p>
                      {{$d->replies->count()}}  تعليق
                    </p>

                </div>


            </div>



            <div class="text-center">
                {{$discussions->links()}}
            </div>



        @endforeach


        </div>

@endsection

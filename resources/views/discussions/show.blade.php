@extends('layouts.app')

@section('content')

    <div class="col-md-8">
        @include('includes.errors')
        <div class="panel panel-default">
                
            <div class="panel-heading">
                <img src="{{ asset($discussion->user->avatar)}}" alt="user-name" width="40px" height="40px" style="border-radius: 50%">&nbsp; &nbsp; &nbsp;
                <span>{{$discussion->user->name}}</span>
                <span class="pull-left" style="line-height: 2.5;">{{ $discussion->created_at}}</span>
                    
                </div>

            <div class="panel-body">
                <h3 class="text-center">
                    <b> {{$discussion->title}} </b>
                </h3>

                <p class="text-center">
                    {{$discussion->content}}
                </p>         
            </div>


                <div class="panel-footer">
                    <p>
                      {{$discussion->replies->count()}}  تعليق
                    </p>

                </div>

            </div>



            @foreach($discussion->replies as $r)

            <div class="panel panel-default">
                
            <div class="panel-heading">
                <img src="{{ asset($r->user->avatar)}}" alt="user-name" width="40px" height="40px" style="border-radius: 50%">&nbsp; &nbsp; &nbsp;
                <span>{{$r->user->name}}</span>
                <span class="pull-left" style="line-height: 2.5;">
                {{ $r->created_at}}
                </span>
                    
                </div>

            <div class="panel-body">

                <p class="text-center">
                    {{$r->content}}
                </p>         
            </div>


                <div class="panel-footer">
                    أعجبني

                </div>

            </div>



            @endforeach



        <div class="panel panel-default">

            <div class="panel-body">
                <form action="{{route('discuss.reply' ,['id' => $discussion->id])}}" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                        <label for="name">اترك تعليق ...</label>
                        <textarea name="content" cols="30" rows="8" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">تعليق</button>
                        </div>

                    </div>
                    
                </form>
                        
            </div>
            

        </div>






        </div>

@endsection

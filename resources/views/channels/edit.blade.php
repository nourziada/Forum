@extends('layouts.app')


@section('content')




    <div class="col-md-8 col-md-offset-2" dir="rtl">

        @include('includes.errors')

        <div class="panel panel-default">
            <div class="panel-heading">تعديل قسم {{ $channel->title }}</div>

            <div class="panel-body">

                <form action="{{route('channel.update', ['id' => $channel->id])}}" method="post" >
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}

                    <div class="form-group">
                        <label for="name">العنوان</label>
                        <input type="text" name="name" value="{{$channel->title}}" class="form-control">
                    </div>



                    <div class="form-group">
                        <div class="text-center">
                            <button class="btn btn-success" type="submit">تعديل القسم</button>
                        </div>

                    </div>




                </form>
            </div>
        </div>



    </div>



@stop
@extends('layouts.app')


@section('content')

    <div class="col-md-8" dir="rtl">

        @include('includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading text-center">إنشاء نقاش جديد</div>

        <div class="panel-body">

            <form action="{{route('discuss.store')}}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">عناون النقاش</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                    <select name="channel_id" id="channel_id" class="form-control">
                        
                        @foreach($channels as $channel)
                            <option value="{{$channel->id}}"> {{$channel->title}}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="name">محتوى النقاش</label>
                    <textarea name="content" cols="30" rows="10" class="form-control"></textarea>
                </div>



                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">إنشاء النقاش</button>
                    </div>

                </div>




            </form>
        </div>
    </div>


    </div>



@stop
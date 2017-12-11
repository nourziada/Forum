@extends('layouts.app')


@section('content')

    <div class="col-md-8 col-md-offset-2" dir="rtl">

        @include('includes.errors')

    <div class="panel panel-default">
        <div class="panel-heading">إنشاء قسم جديد</div>

        <div class="panel-body">

            <form action="{{route('channel.store')}}" method="post" >
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name">العنوان</label>
                    <input type="text" name="name" class="form-control">
                </div>



                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">إنشاء القسم</button>
                    </div>

                </div>




            </form>
        </div>
    </div>



    <div class="panel panel-default">
        <div class="panel-heading">كل الاقسام</div>

        <div class="panel-body">

            <table class="table table-hover" >


                <thead>

                <th>الرقم</th>
                <th>الاسم</th>
                <th>تعديل</th>
                <th>حذف</th>
                </thead>


                <tbody>

                <?php $no = 1;
                        $deletedid = 0;
                ?>

                @if(count($channels) > 0)

                    @foreach($channels as $channel)


                        <tr>

                            <td>

                                {{ $no++ }}

                            </td>

                            <td>

                                {{ $channel->title }}
                            </td>

                            <td>
                                <a href="{{route('channel.edit',['id' => $channel->id])}}" class="btn btn-info"> تعديل</a>
                            </td>

                            <td>

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">

                                    <input type="hidden" value="{{$deletedid = $channel->id}}">
                                    حذف
                                </button>


                            </td>


                        </tr>




                    @endforeach

                @else

                    <tr>

                        <td colspan="5" class="text-center">لا يوجد أقسام مضافة</td>
                    </tr>

                @endif



                </tbody>




            </table>

        </div>

    </div>

    </div>



    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" dir="rtl">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="float: left">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="exampleModalLabel">حذف القسم</h5>

                </div>
                <div class="modal-body">
                    هل أنت متأكد من حذف هذا القسم بشكل نهائي ؟
                </div>
                <div class="modal-footer">


                    <form action="{{route('channel.destroy' ,['id'=> $deletedid])}}" method="post">
                        {{ csrf_field() }}

                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" type="submit">حذف</button>
                    </form>

                </div>
            </div>
        </div>
    </div>



@stop
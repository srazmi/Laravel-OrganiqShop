@extends('layouts.Admin.MasterAdmin')
@section('content1')

<!--Edit Post Modal -->
<div class="container">
    <div class="jumbotron">
    
        <div>
            <h5> ویرایش متن  </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="/postupdate/{{ $posts->id }}" enctype="multipart/form-data" method="POST">
            <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field("POST") }}

                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" id="id" value="{{$posts->id}}" placeholder="Enter Title">
                </div>

                <div class="form-group">
                    <label> عنوان متن </label>
                    <input type="text" class="form-control" name="title" id="title" value="{{$posts->title}}" placeholder="Enter Title">
                </div>

                <div class="form-group">
                    <label> بخش اول محتوا </label>
                    <input type="text" class="form-control" name="content_one" id="content_one" value="{{$posts->content_one}}" placeholder="Enter Content">
                </div>

                <div class="form-group">
                    <label> محتوای برجسته </label>
                    <input type="text" class="form-control" name="content_blockqotoe" id="content_blockqotoe" value="{{$posts->content_blockqotoe}}" placeholder="Enter Content">
                </div>

                <div class="form-group">
                    <label> محتوای آخر </label>
                    <input type="text" class="form-control" name="content_two" id="content_two" value="{{$posts->content_two}}" placeholder="Enter Content">
                </div>

                <div class="form-group">
                    <label>  دسته بندی</label>
                    <select type="text" class="form-control" class="category_id" id="category_id" name="category_id" value="{{$posts->category()->first()->id}}" style="height: 10px" placeholder="Enter Content">
                        @foreach($category as $cat)
                            <option value="{{$cat->id}} ">{{$cat->persian_name}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        Select image to upload:
                       <input id="select_file" name="select_file" type="file" value="{{$posts->select_file}}" class="form-control @error('Image') is-invalid @enderror" >

                        @error('Image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                <button type="submit" class="btn btn-primary">  ویرایش</button>
            </div>
        </form>
    </div>
</div>
<!--End of Edit Post Modal -->
@endsection
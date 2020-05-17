@extends('layouts.Admin.MasterAdmin')
@section('content1')

<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1> لیست پست ها</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item active"> لیست پست ها</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Button trigger modal -->
  
<!--Add Post Data Modal -->
<div class="modal fade" id="postaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضافه کردن پست جدید </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form class="addform" enctype="multipart/form-data" id="upload_form" method="post">
            {{ csrf_field() }}
            <div class="modal-body">

                <div class="form-group">
                    <label> عنوان متن </label>
                    <input type="text" class="form-control" class="title" name="title" placeholder="Enter Title">
                </div>

                <div class="form-group">
                    <label>  بخش اول محتوا </label>
                    <input type="text" class="form-control" class="content_one" name="content_one" placeholder="Enter Content">
                </div>

                <div class="form-group">
                    <label> محتوای برجسته</label>
                    <input type="text" class="form-control" class="content_blockqotoe" name="content_blockqotoe" placeholder="Enter Content">
                </div>

                <div class="form-group">
                    <label> محتوای آخر</label>
                    <input type="text" class="form-control" class="content_two" name="content_two" placeholder="Enter Content">
                </div>

                <div class="form-group">
                    <label>  دسته بندی</label>
                    <select type="text" class="form-control" class="category_id" name="category_id" style="height: 10px" placeholder="Enter Content">
                        @foreach($category as $cat)
                            <option value="{{$cat->id}} ">{{$cat->persian_name}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        Select image to upload:
                       <input id="select_file" name="select_file" type="file" class="form-control @error('Image') is-invalid @enderror">

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
                <button type="submit" name="upload" id="upload" value="upload" class="submit btn btn-primary">  ارسال</button>
            </div>
        </form>
        <br />
        <span id="uploaded_image" ></span>
    </div>
    </div>
</div>
<!--End of Add post  Modal -->



<!--Delete Post Modal -->
<div class="modal fade" id="postDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> حذف پست</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form id="DeleteFormID">
            <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field('delete') }}

                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" id="delete_id" >
                    <p>Are you Sure !!</p>
                </div>

            </div>
            <div class="modal-footer bg-danger">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                <button type="submit" class="btn btn-primary"> حذف  </button>
            </div>
        </form>
    </div>
    </div>
</div>
<!--End of Delete Product Modal -->

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              
              <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#postaddmodal">
                    <i class="fa fa-plus"></i> جدید  
                </button>
                <table id="example1" class="d-table table text-center table-bordred table-striped" id="laravel_datatable">
                  <thead>
                  <tr>
                    <th>شماره پست</th>
                    <th> نام نویسنده</th>
                    <th>عنوان</th>
                    <th> دسته بندی </th>
                    <th>عکس </th>
                    <th>عملیات</th>
                  </tr>
                  </thead>
                  <tbody id="headpost">

                    @foreach ($posts as $post)
                    {{-- @dd($post); --}}
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->user()->first()->name}}</td>
                        <td>{{$post->title}}</td>  
                        <td>{{$post->category()->first()->persian_name}}</td>  
                        <td id="myImage"><img width="150px" src="{{$post->photoes()->first()->path}}"></td>
                        {{-- <td>{{$post->updated_at}}</td>    --}}
                        <td>
                            <a href="/postedit/{{ $post->id }} " class="btn btn-primary btn-success editbtn" >
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-primary btn-danger deletebtn" data-toggle="modal" data-target="#postDeleteModal">
                                <i class="fa fa-trash"></i> 
                            </a>
                        </td>
                        
                    </tr>
                    @endforeach
  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

{{-- Post Insert Script --}}
<script type="text/javascript">
$(document).ready(function(){
    $('#upload_form').on('submit',function(e){
        e.preventDefault();
        $.ajax({
            url:"{{ route('post_upload') }}",
            method: "POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response)
            {
                var tableStr = "";
                for (i = 0; i < response['posts'].length; i++) 
                {
                    tableStr += "<tr><td>" + response['posts'][i].id + "</td>";
                    tableStr += "<td>" + response['user'][i] + "</td>";
                    tableStr += "<td>" + response['posts'][i].title + "</td>";
                    tableStr += "<td>" + response['category'][i] + "</td>";
                    tableStr += "<td><img src="+'"/'+ response['photos'][i]+'"'+ "></td>";
                    tableStr += "<td>" +
    "<a href="+'"#"'+" class="+'"btn btn-primary btn-success editbtn"'+" data-toggle="+'"modal"'+" data-target="+'"#postEditModal"'+">"
        +  "ویرایش" 
    +"</a>" +
    "<a href="+'"#"'+" class="+'"btn btn-primary btn-danger deletebtn"'+" data-toggle="+'"modal"'+" data-target="+'"#postDeleteModal"'+">"
        + "حذف" 
    +"</a>" +
    "</td></tr>";
                }
                $("#headpost").html(tableStr);
                alert('پست با موفقیت ارسال شد');
            },
            error: function(error)
                {
                    console.log(error);
                    alert('پست ارسال نشد');
                }
        });
    });
});

</script>
{{-- End of Post Insert Script --}}

{{-- Post Delete Script --}}
<script>
    $('.deletebtn').on('click', function(){
        $('#postDeleteModal').modal('show');

        $tr = $(this).closest("tr");

        var data = $tr.children("td").map(function(){
            return $(this).text();
        }).get();

        console.log(data);

        $('#delete_id').val(data[0]);
    });

    $('#DeleteFormID').on('submit', function(e){
        e.preventDefault();

        var id = $('#delete_id').val();

        $.ajax({
            type: "delete",
            url: "postdelete/"+id,
            dataType: 'json',
            data: $('#DeleteFormID').serialize(),
            success: function(response)
            {
                console.log(response)
                $('#postDeleteModal').modal('hide')
                alert('پست حذف شد');
                location.reload();
            },
            error: function(error)
            {
                console.log(error)
            }
        });
    });
</script>
{{-- End of Post Delete Script --}}

@endsection
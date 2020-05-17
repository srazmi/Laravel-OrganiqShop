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
              <h1> لیست اسلاید ها</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="/home">خانه</a></li>
                <li class="breadcrumb-item active"> لیست اسلاید ها</li>
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
        <h5 class="modal-title" id="exampleModalLabel">اضافه کردن اسلاید جدید </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form class="addform" enctype="multipart/form-data" id="upload_form" method="post">
            {{ csrf_field() }}
            <div class="modal-body">

                {{-- <div class="form-group">
                    <label> شماره اسلاید </label>
                    <input type="hidden" class="form-control" class="id" name="id">
                </div> --}}

                <div class="form-group">
                    <label> نام اسلاید </label>
                    <input type="text" class="form-control" class="name" name="name">
                </div>

                <div class="form-group">
                    <label for="Image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                    <div class="col-md-6">
                        Select image to upload:
                       <input id="select_file" name="select_file" type="file"  class="form-control @error('Image') is-invalid @enderror">

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
<div class="modal fade" id="slideDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> حذف اسلاید</h5>
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
<!--End of Delete Slides Modal -->

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
                    <th>شماره اسلاید</th>
                    <th>عکس </th>
                    <th>عملیات</th>
                  </tr>
                  </thead>
                  <tbody id="headpost">

                    @foreach ($slides as $slide)
                    {{-- @dd($post); --}}
                    <tr>
                        <td>{{$slide->id}}</td>  
                        <td id="myImage"><img width="150px" src="{{$slide->photoes()->first()->path}}"></td>
                        {{-- <td>{{$post->updated_at}}</td>    --}}
                        <td>
                            <a href="/slideedit/{{ $slide->id }} " class="btn btn-primary btn-success editbtn" >
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-primary btn-danger deletebtn" data-toggle="modal" data-target="#slideDeleteModal">
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
            url:"{{ route('slide_upload') }}",
            method: "POST",
            data:new FormData(this),
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function(response)
            {
                var tableStr = "";
                for (i = 0; i < response['slides'].length; i++) 
                {
                    tableStr += "<tr><td>" + response['slides'][i].id + "</td>";
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
                alert('اسلاید با موفقیت ارسال شد');
            },
            error: function(error)
                {
                    console.log(error);
                    alert('اسلاید ارسال نشد');
                }
        });
    });
});

</script>

{{-- End of Post Insert Script --}}

{{-- Post Edit Script --}}
{{-- <script>
    $(document).ready(function(){
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

        $('.editbtn').on('click', function(){
         
            $('#postEditModal').modal('show');

            var id = $(this).attr("data-id");
// alert(id);          
            var id2 = "#"+id;
            var imageSrc = $(id2).attr("src");
            // alert(imageSrc);

            var tr = $(this).closest("tr");

            var data = tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#title').val(data[1]);
            $('#content').val(data[2]);
            $('#select_file').val(imageSrc[3]);
        });

        $('.EditFormID').on('submit', function(e){
            e.preventDefault();

            var id2 = "#"+id;
            // var imageSrc = $(id2).attr("src");
            
            $.ajax({
                url:"postupdate/"+id2,
                method: "PUT",
                data:$('.EditFormID').serialize(),
                dataType:'JSON',
                success: function(response)
                {
                    // console.log(response)
                    // $('#postEditModal').modal('hide')
                    // alert('ویرایش با موفقیت انجام شد');
                    // location.reload();
                },
                error: function(error)
                {
                    console.log(error)
                }
            });
        });
    });
</script> --}}
{{-- End of Post Edit Script --}}

{{-- Post Delete Script --}}
<script>
    $('.deletebtn').on('click', function(){
        $('#slideDeleteModal').modal('show');

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
            url: "slidedelete/"+id,
            dataType: 'json',
            data: $('#DeleteFormID').serialize(),
            success: function(response)
            {
                console.log(response)
                $('#slideDeleteModal').modal('hide')
                alert('اسلاید حذف شد');
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
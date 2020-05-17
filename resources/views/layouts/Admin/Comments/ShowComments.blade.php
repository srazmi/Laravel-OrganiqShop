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
              <h1> لیست نظرات </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item active"> لیست نظرات</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Button trigger modal -->

<!--Edit comment Modal -->
<div class="modal fade" id="commentEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> ویرایش متن  </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form class="EditFormID">
            <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field("PUT") }}

                <div class="form-group">
                    <input type="hidden" class="form-control" name="id" id="id" >
                </div>

                <div class="form-group">
                    <label>  متن نظر </label>
                    <input type="text" class="form-control" name="comment" id="comment" >
                </div>

                <div class="form-group">
                    <label>  وضعیت</label>
                    <input type="text" class="form-control" name="status" id="status" >
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                <button type="submit" class="btn btn-primary">  ویرایش</button>
            </div>
        </form>
    </div>
    </div>
</div>
<!--End of Edit Commment Modal -->

<!--Delete Commment Modal -->
<div class="modal fade" id="commentDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> حذف محصول</h5>
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
                {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commentaddmodal">
                      اضافه کردن نظر جدید  
                </button> --}}
                <table id="example1" class="table table-bordered table-striped" id="laravel_datatable">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>UserName</th>
                    <th>Title</th>
                    <th>Comment </th>
                    <th>Status  </th>
                    <th>Score  </th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    <?php $i=0; ?>
                    @foreach ($comments as $comment)
                    <tr>
                        <td>{{$comment->id}}</td>
                        <td>{{$users[$i]->name}}</td> 
                        <td>{{$products[$i]->name}}</td>  
                        <td>{{$comment->comment}}</td>  
                        <td>{{$comment->status}}</td>
                        <td>{{$comment->score}}</td>
                        <td>
                            <a href="#" class="btn btn-primary btn-success editbtn" data-toggle="modal" data-target="#commentEditModal">
                                ویرایش
                            </a>
                            <a href="#" class="btn btn-primary btn-danger deletebtn" data-toggle="modal" data-target="#commentDeleteModal">
                                حذف 
                            </a>
                        </td>
                        
                    </tr>
                    <?php $i++; ?>
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

{{-- Comment Edit Script --}}
<script>
    $(document).ready(function(){
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });

        $('.editbtn').on('click', function(){
            $('#commentEditModal').modal('show');

            $tr = $(this).closest("tr");

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#comment').val(data[3]);
            $('#status').val(data[4]);
        });

        $('.EditFormID').on('submit', function(e){
            e.preventDefault();

            var id = $('#id').val();
            $.ajax({
                type: "PUT",
                url: 'commentupdate/'+id,
                dataType: 'json',
                data: $('.EditFormID').serialize(),
                success: function(response)
                {
                    console.log(response)
                    $('#commentEditModal').modal('hide')
                    alert('ویرایش با موفقیت انجام شد');
                    location.reload();
                },
                error: function(error)
                {
                    console.log(error)
                }
            });
        });
    });
</script>
{{-- End of Comment Edit Script --}}

{{-- Comment Delete Script --}}
<script>
    $('.deletebtn').on('click', function(){
        $('#commentDeleteModal').modal('show');

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
            url: "commentdelete/"+id,
            dataType: 'json',
            data: $('#DeleteFormID').serialize(),
            success: function(response)
            {
                console.log(response)
                $('#commentDeleteModal').modal('hide')
                alert('کامنت حذف شد');
                location.reload();
            },
            error: function(error)
            {
                console.log(error)
            }
        });
    });
</script>
{{-- End of Comment Delete Script --}}

@endsection
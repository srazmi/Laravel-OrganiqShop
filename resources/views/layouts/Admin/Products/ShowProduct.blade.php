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
              <h1> لیست محصولات</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-left">
                <li class="breadcrumb-item"><a href="#">خانه</a></li>
                <li class="breadcrumb-item active"> لیست محصولات</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Button trigger modal -->
  
  
  <!--Edit Product Modal -->
<div class="modal fade" id="productEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> ویرایش محصولات</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form id="EditFormID">
            <div class="modal-body">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

                <div class="form-group">
                    <label>شماره محصول </label>
                    <input type="hidden" class="form-control" name="id" id="id" placeholder="Enter ID">
                </div>

                <div class="form-group">
                    <label>نام محصول </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label>توضیحات محصول</label>
                    <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
                </div>

                <div class="form-group">
                    <label>دسته بندی محصول</label>
                    <input type="text" class="form-control" name="category" id="category" placeholder="Enter Category">
                </div>

                <div class="form-group">
                    <label>قیمت محصول</label>
                    <input type="text" class="form-control" name="price" id="price" placeholder="Enter Price">
                </div>

                <div class="form-group">
                    <label> موجودی انبار</label>
                    <input type="text" class="form-control" name="number" id="number" placeholder="Enter Number">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                <button type="submit" class="btn btn-primary"> به روز رسانی</button>
            </div>
        </form>
    </div>
    </div>
</div>
<!--End of Edit Product Modal -->

<!--Delete Product Modal -->
<div class="modal fade" id="productDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  
<!--Add Product Data Modal -->
<div class="modal fade" id="productaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">اضافه کردن محصولات </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <form id="addform" enctype="multipart/form-data" id="upload_form" method="post">
            <div class="modal-body">

                <div class="form-group">
                    <label>شماره محصول </label>
                    <input type="text" class="form-control" name="id"  placeholder="Enter Id">
                </div>

                <div class="form-group">
                    <label>نام محصول </label>
                    <input type="text" class="form-control" name="name"  placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label>توضیحات محصول</label>
                    <input type="text" class="form-control" name="description"  placeholder="Enter Description">
                </div>

                <div class="form-group">
                    <label>دسته بندی محصول</label>
                    <input type="text" class="form-control" name="category"  placeholder="Enter Category">
                </div>

                <div class="form-group">
                    <label>قیمت محصول</label>
                    <input type="text" class="form-control" name="price"  placeholder="Enter Price">
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

                <div class="form-group">
                    <label> موجودی انبار</label>
                    <input type="text" class="form-control" name="number" id="number" placeholder="Enter Number">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                <button type="submit"name="upload" id="upload" value="upload" class="btn btn-primary"> اضافه کردن</button>
            </div>
        </form>
    </div>
    </div>
</div>
<!--End of Add Product Data Modal -->

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              
              <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#productaddmodal">
                    اضافه کردن محصول
                </button>
                <table id="example1" class="table table-bordered table-striped" id="laravel_datatable">
                  <thead>
                  <tr>
                    <th> ID</th>
                    <th>Name</th>
                    <th>Description </th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Number</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>

                    @foreach ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td> 
                        <td>{{$product->description}}</td>  
                        <td>{{$product->category->persian_name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->number}}</td>
                        {{-- <td>{{$user->updated_at}}</td> --}}
                        {{-- <span></span> --}}
                        <td>
                            <a href="#" class="btn btn-primary btn-success editbtn" data-toggle="modal" data-target="#productEditModal">
                                ویرایش
                            </a>
                            <a href="#" class="btn btn-primary btn-danger deletebtn" data-toggle="modal" data-target="#productDeleteModal">
                                حذف 
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

{{-- Product Edit Script --}}
<script>
    $(document).ready(function(){
        $('.editbtn').on('click', function(){
            $('#productEditModal').modal('show');

            $tr = $(this).closest("tr");

            var data = $tr.children("td").map(function(){
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#name').val(data[1]);
            $('#description').val(data[2]);
            $('#category').val(data[3]);
            $('#price').val(data[4]);
            $('#number').val(data[5]);
        });

        $('#EditFormID').on('submit', function(e){
            e.preventDefault();

            var id = $('#id').val();

            $.ajax({
                type: "PUT",
                url: "productupdate/"+id,
                dataType: 'json',
                data: $('#EditFormID').serialize(),
                success: function(response)
                {
                    console.log(response)
                    $('#productEditModal').modal('hide')
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
{{-- End of Product Edit Script --}}

{{-- Product Delete Script --}}
<script>
    $('.deletebtn').on('click', function(){
        $('#productDeleteModal').modal('show');

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
            url: "productdelete/"+id,
            dataType: 'json',
            data: $('#DeleteFormID').serialize(),
            success: function(response)
            {
                console.log(response)
                $('#productDeleteModal').modal('hide')
                alert('محصول حذف شد');
                location.reload();
            },
            error: function(error)
            {
                console.log(error)
            }
        });
    });
</script>
{{-- End of Product Delete Script --}}

{{-- Product Insert Script --}}
<script type="text/javascript">

    $(document).ready(function(){
        
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $("#addform").on('submit',function(e){
                e.preventDefault();
                
                $.ajax({
                    url: '/productadd',
                    method: 'POST',
                    dataType: 'json',
                    data: $('#addform').serialize(),
                    success: function(response)
                    {
                        console.log(response)
                        $('#productaddmodal').modal('hide')
                        alert('محصول با موفقیت به لیست اضافه شد');
                        location.reload();
                    },
                    error: function(error)
                    {
                        console.log(error)
                        alert('محصول به لیست اضافه نشد');
                    }
                });
            });
        });
</script>  
{{-- End of Product Insert Script --}}

@endsection



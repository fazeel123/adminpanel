@extends('app')

@section('content')

@include('layouts.aside')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Definition</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('index.dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
              <li class="breadcrumb-item active">Definition</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Line Based Product</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <div class="form-group">
                        <label for="line_item">Line Item</label>
                        <select class="custom-select form-control-border" name="line_item" id="line_item">
                          <option value="">Select</option>
                          @foreach($line_item as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}</option>
                          @endforeach
                        </select>
                    </div>
                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">Add Line Item</button>
                  </div>
                  <div class="form-group">
                    <label for="product_code">Product Code</label>
                    <input type="text" class="form-control" id="product_code" name="product_code">
                  </div>
                  <div class="form-group">
                    <label for="product_name">Product Name</label>
                    <input type="text" class="form-control" id="product_name" name="product_name">
                  </div>
                </div>
                <!-- /.card-body -->

              </form>
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Line Item</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
            <div id="line_item_success"></div>
            <div class="form-group">
                <label for="line_item_name">Name</label>
                <input type="text" class="form-control" name="line_item_name" id="line_item_name">
            </div>
            <div class="form-group">
                <label for="line_item_code">Code</label>
                <input type="text" class="form-control" name="line_item_code" id="line_item_code">
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="line_item_form">Save</button>
            </div>
        </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  @push('scripts')

        <script>

            $(document).ready(function() {

                $('#line_item_form').click(function(e) {

                    e.preventDefault();

                    $.ajax({
                        url: "{{ route('post.definition') }}",
                        method: "POST",
                        data: {
                            "_token": "{{ csrf_token() }}",
                            name: $('#line_item_name').val(),
                            code: $('#line_item_code').val(),
                        },
                        success: function(result) {
                            console.log(result);
                            let html = '<div class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>Line Item successfully added!</div>';
                            $('#line_item_success').append(html);
                            location.reload();
                        }
                    });
                });

                $('#line_item').click(function(e) {
                    e.preventDefault();

                    var id = $(this).val();

                    var url = "{{ route('get.line.item', ':id') }}";
                    url = url.replace(":id", id);

                    $.ajax({
                        url: url,
                        method: "GET",
                        success: function(response) {
                            let data = JSON.parse(JSON.stringify(response));
                            console.log(data.item.name);
                            $('#product_name').val(data.item.name);
                            $('#product_code').val(data.item.code);
                        }
                    });
                });

            });

        </script>

    @endpush

@endsection



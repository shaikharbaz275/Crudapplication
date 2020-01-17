@extends('layouts.adminapp')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-2">
    </div>
    <div class="col-md-8" style="margin-top:20px">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border" style="margin-top:20px">
                <h3 class="box-title">Create Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card">

                <div class="card-body">
                    <form role="form" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Product Name"
                                            name="name" value="{{ old('name') }}">
                                        @if($errors->has('name'))
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Prize</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Product Prize"
                                            name="prize" value="{{ old('prize') }}">
                                        @if($errors->has('prize'))
                                        <strong class="text-danger">{{ $errors->first('prize') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">From Active Date</label>
                                        <input type="date" class="form-control" id="" placeholder="Enter Product Prize"
                                            name="fromactive" value="{{ old('fromactive') }}">
                                        @if($errors->has('fromactive'))
                                        <strong class="text-danger">{{ $errors->first('fromactive') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">To Active Date</label>
                                        <input type="date" class="form-control" id="" placeholder="Enter Product Prize"
                                            name="toactive" value="{{ old('toactive') }}">
                                        @if($errors->has('toactive'))
                                        <strong class="text-danger">{{ $errors->first('toactive') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Images</label>
                                        <input type="file" class="form-control"  name="images[]" value="{{ old('images') }}" multiple>
                                        @if($errors->has('images'))
                                        <strong class="text-danger">{{ $errors->first('images') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Description</label>
                                        <textarea class="form-control" name="description"></textarea>
                                        @if($errors->has('description'))
                                        <strong class="text-danger">{{ $errors->first('description') }}</strong>
                                        @endif
                                    </div>
                                </div>

                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </div>
    <!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!--/.col (right) -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

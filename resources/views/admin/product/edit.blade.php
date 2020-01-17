@extends('layouts.adminapp')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-sm-1">
    </div>
    <div class="col-sm-6" style="margin-top:20px">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border" style="margin-top:20px">
                <h3 class="box-title">Edit Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <div class="card">

                <div class="card-body">
                    <form role="form" method="post" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Product Name"
                                            name="name" value="{{ $product->name }}">
                                        @if($errors->has('name'))
                                        <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Product Prize</label>
                                        <input type="text" class="form-control" id="" placeholder="Enter Product Prize"
                                            name="prize" value="{{ $product->prize  }}">
                                        @if($errors->has('prize'))
                                        <strong class="text-danger">{{ $errors->first('prize') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">From Active Date</label>
                                        <input type="date" class="form-control" name="fromactive" value="{{ $product->fromdate }}">
                                        @if($errors->has('fromactive'))
                                        <strong class="text-danger">{{ $errors->first('fromactive') }}</strong>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">To Active Date</label>
                                        <input type="date" class="form-control"  name="toactive" value="{{ $product->todate  }}">
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
                                        <textarea class="form-control" name="description">{{ $product->description }}</textarea>
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
</div>

<div class="col-md-2" style="margin-top:80px">
        @foreach ($product->images as $image)
        <img src="/upload/{{ $image }}" width="200; height:300">
        <button class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#myModal{{$loop->index }}">
            Delete
        </button>
        <!-- The Modal -->
        <div class="modal" id="myModal{{ $loop->index }}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">
                            {{ $product->name }}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        Are you sure want to Delete ?
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button"  data-dismiss="modal">Close</button>
                        <form method="post" action="{{ route('product.remove-image', $product->id) }}">
                            @csrf
                            @method('delete')
                            <input type="hidden" value="{{ $image }}" name="image">
                            <input type="submit" value="Delete" class="btn btn-danger"">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
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

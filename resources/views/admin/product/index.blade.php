@extends('layouts.adminapp')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12" style="margin-top:20px">
            <div class="box">
                <div class="box-header">
                    <h4 class="box-title">Products</h4>

                    <div class="box-tools">
                            <div class="input-group input-group-sm hidden-xs" style="width: 150px;margin-left:1000px">
                                <a class="btn btn-sm btn-primary" href="{{ route('products.create') }}">
                                    Product
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Sr</th>
                            <th>Name</th>
                            <th>Prize</th>
                            <th>From Active</th>
                            <th>To Active</th>
                            <th>Create_at Date</th>

                            <th>Status</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->id }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->prize }} Rs</td>
                            <td>{{ $product->fromactive }} </td>
                            <td>{{ $product->toactive }} </td>
                            <td>{{ $product->created_at->format('d-M-Y') }}</td>
                            <td>
                                <a data-toggle="modal" data-target="#approved{{ $product->id }}"
                                    class="btn btn-sm {{ $product->isApproved() ? 'btn-success': 'btn-danger' }}">
                                    {{ $product->getApproveStatus() }}
                                </a>
                                <div class="modal fade" id="approved{{ $product->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="approved{{ $product->id }}Label" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="approved{{ $product->id }}Label">
                                                    {{ $product->isApproved() ? 'Deactive' : 'Active' }}
                                                    {{ $product->name }} ?.
                                                </h5>

                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                {{ $product->isApproved() ? 'Deactive' : 'Active' }} this item?.
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('product.toggle', $product->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">
                                                        Close
                                                    </button>

                                                    <button
                                                        class="btn btn-sm {{ $product->isApproved() ? 'btn-danger': 'btn-success' }}">
                                                        {{ $product->isApproved() ? 'Deactive': 'Active' }}
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td><a href="{{ route('products.edit',$product->id) }}" class="btn btn-primary">Edit</a></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                    data-target="#remove{{ $product->id }}">
                                    Remove
                                </button>

                                <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <div class="modal fade" id="remove{{ $product->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="remove{{ $product->id }}Label" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="remove{{ $product->id }}Label">
                                                        {{ $product->title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    Are you sure you want to remove this iteam ?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary btn-sm"
                                                        data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>
@endsection

@extends('admin.layouts.admin')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Orders</a></li>

                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <br>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-8"></div>
                        <div class="col-4">
                            <div class="row" style="">

                                <div class="col-12">
                                    <form action="{{ route('orders.index') }}" method="GET">
                                        <input name="search_input" class="form-control " placeholder="Search"
                                            autocomplete="off" id="search_input" value="" type="control">
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            @if ($orders->count() > 0)
                                <div class="table-responsive-sm">
                                    <table class="table  align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Name</th>
                                                <th>Total Amount</th>
                                                <th>Pay</th>
                                                <th>Due</th>
                                                <th>Pay By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $order)
                                                <tr>
                                                    <td>
                                                        {{ $order->user_name }}

                                                    </td>
                                                    <td>
                                                        {{ number_format($order->total) . ' Đ' }}
                                                    </td>
                                                    <td>
                                                        {{ number_format($order->pay) . ' Đ' }}
                                                    </td>
                                                    <td>
                                                        {{ number_format($order->due) . ' Đ' }}
                                                    </td>
                                                    <td>
                                                        {{ $order->payBy }}
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-sm btn-primary"
                                                            href="{{ route('order.show', $order->id) }}">Detail</a>
                                                        <form action="{{ route('order.destroy', $order->id) }}"
                                                            method="Post" style="display: inline-block; margin-left: 10px">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="table-responsive-sm">
                                    <table class="table  align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>

                                                <th>Name</th>
                                                <th>Total Amount</th>
                                                <th>Pay</th>
                                                <th>Due</th>
                                                <th>Pay By</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                    </table>
                                </div>
                                <data-empty></data-empty>
                            @endif
                        </div>
                        <!-- /.card-body -->
                    </div>
                    {{ $orders->links('pagination::bootstrap-5') }}
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
    </section>


@endsection

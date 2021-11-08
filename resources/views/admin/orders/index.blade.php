@extends('admin.home')

@section('rightDashboardContent')
<div>
    <div>
        <div><h1>Your Orders</h1></div>

        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Order ID</th>
                <th scope="col">Name</th>
                <th scope="col">Surname</th>
                <th scope="col">Total</th>
                <th scope="col">
                    <details class="text-dark text-center">
                        <summary>Total Orders</summary>
                        <span>{{count($orders)}}</span>
                    </details>
            </th>
              </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->name}}</td>
                        <td>{{$order->surname}}</td>
                        <td>{{$order->total}}€</td>
                        <td><a href="{{ route('admin.orders.show', $order->id) }}">Show Details</a></td>
                    </tr>
                @empty
                    <tr colspan="4">No Orders</tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
    
@endsection


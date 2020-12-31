
    <table class="table table-responsive">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-mail</th>
            <th>Phone Number</th>

            <th>Status</th>
            <th colspan="7">Action</th>
        </tr>
        @forelse($data as $customer)
            <tr>
                <td>{{ $customer->first_name }}</td>
                <td>{{ $customer->last_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone_number }}</td>
                <td>
                    <input type="checkbox" data-toggle="modal" data-target="#status{{ $customer->id }}" @if($customer->is_enable) checked @endif>
                    @include("admin.customer.status")
                </td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $customer->id }}">Delete</button>
                    @include('admin.customer.delete')
                </td>
                @empty
                    <td colspan="7" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>

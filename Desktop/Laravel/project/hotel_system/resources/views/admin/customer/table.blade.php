
    <table class="table table-responsive ">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>E-mail</th>
            <th>Date of Birth</th>
            <th>Gender</th>
            <th>Identification ID</th>
            <th>Phone Number</th>
    
            <th>Status</th> 
            <th colspan="12">Action</th>
        </tr>
        @forelse($customer as $customer)
            <tr>
                <td>{{ $customer->first_name }}</td>
                <td>{{ $customer->last_name }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->dob }}</td>
                <td>{{ $customer->gender }}</td>
                <td>{{ $customer->identification_id }}</td>
                <td>{{ $customer->phone_number }}</td>
                <td>
                    <input type="checkbox" data-toggle="modal" data-target="#status{{ $customer->id }}" @if($customer->is_enable) checked @endif>
                    @include("admin.customer.status")
                </td>
                <td><a href="/admin/customer/show/{{ $customer->id }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $customer->id }}">Delete</button>
                    @include('admin.customer.delete')
                </td>
                @empty
                    <td colspan="14" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>

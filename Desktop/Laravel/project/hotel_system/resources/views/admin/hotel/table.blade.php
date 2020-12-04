
    <table class="table table-responsive">
        <tr>
            <th>Name</th>
            <th>Street address</th>
            <th>City</th>
            <th>Country</th>
            <th>Zip</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        @forelse($hotels as $hotel)
            <td>{{ $hotel->name }}</td>
            <td>{{ $hotel->street_address }}</td>
            <td>{{ $hotel->city }}</td>
            <td>{{ $hotel->country }}</td>
            <td>{{ $hotel->zip }}</td>
            <td>{{ $hotel->is_enable ? 'Active' : 'Deactivate' }}</td>
            <td><a href="/admin/hotel/show/{{ $hotel->id }}" class="btn btn-warning">Edit</a></td>
            <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal{{ $hotel->id }}">Delete</button>
                @include('admin.hotel.delete')
            </td>
        @empty
            <td colspan="5" class="text-center">There is no value</td>
        @endforelse
    </table>

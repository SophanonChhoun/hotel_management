
    <table class="table table-responsive">
        <tr>
            <th>Title</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Fax</th>
            <th>Email</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        @forelse($contacts_us as $contact_us)
            <tr>
                <td>{{ $contact_us->title }}</td>
                <td>{{ $contact_us->address }}</td>
                <td>{{ $contact_us->phone_number }}</td>
                <td>{{ $contact_us->fax }}</td>
                <td>{{ $contact_us->email }}</td>
                <td>
                    <input type="checkbox" data-toggle="modal" data-target="#status{{ $contact_us->id }}" @if($contact_us->is_enable) checked @endif>
                    @include("admin.contact_us.status")
                </td>
                <td><a href="/admin/contact_us/show/{{ $contact_us->id }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete{{ $contact_us->id }}">Delete</button>
                    @include('admin.contact_us.delete')
                </td>
                @empty
                    <td colspan="5" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>

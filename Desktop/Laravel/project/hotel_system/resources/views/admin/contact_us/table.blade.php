
    <table class="table table-bordered">
        <tr>
            <th>Title</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Status</th>
            <th colspan="2">Action</th>
        </tr>
        @forelse($data as $contact_us)
            <tr>
                <td>{{ $contact_us->title }}</td>
                <td>{{ $contact_us->phone_number }}</td>
                <td>{{ $contact_us->email }}</td>
                <td>
                    <input type="checkbox" id="itemStatus{{ $contact_us->id }}" @if($contact_us->is_enable) checked @endif>
                    @include("admin.contact_us.status")
                </td>
                <td><a href="/admin/contact_us/show/{{ $contact_us->id }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <button type="button" class="btn btn-danger" id="myBtn{{ $contact_us->id }}">Delete</button>
                    @include('admin.contact_us.delete')
                </td>
                @empty
                    <td colspan="5" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>


    <table class="table table-bordered">
        <tr>
            <th>Caption</th>
            <th>Hotel</th>
            <th>Image</th>
            <th>Status</th>
            <th colspan="2" class="text-center">Action</th>
        </tr>
        @forelse($data as $slider)
            <tr>
                <td>{{ $slider->caption }}</td>
                <td>{{ $slider->hotel->name ?? null }}</td>
                <td><img src="{{ $slider->media->file_url ?? asset('image/noimage.png') }}" class="img-responsive" style="max-height: 200px;max-width: 200px"></td>
                <td>
                    <input type="checkbox" id="itemStatus{{ $slider->id }}" @if($slider->is_enable) checked @endif>
                    @include("admin.slider.status")
                </td>
                <td><a href="/admin/slider/show/{{ $slider->id }}" class="btn btn-warning">Edit</a></td>
                <td>
                    <button type="button" class="btn btn-danger" id="myBtn{{ $slider->id }}">Delete</button>
                    @include('admin.slider.delete')
                </td>
                @empty
                    <td colspan="5" class="text-center">There is no value</td>
            </tr>
        @endforelse
    </table>

@extends("admin.profile.index")

@section("content_profile")
    <div id="editAvatar" v-cloak>
        <form action="#" @submit.prevent="submit" class="form-horizontal">

            <div class="form-group">
                <label class="control-label">
                    Profile
                    <span style="color: red">*</span>
                </label>
                <img :src="data.image ? data.image : (data.media ? data.media.file_url : '{{asset('image/noimage.png')}}' )"
                     style='width: 300px;height: 300px;' class="img-responsive img-circle center-block">
                <input type="file" :value="null"  name="adding_image" id="adding_image"
                       v-model="data.image"
                       placeholder="Image" data-vv-as="Image"
                       @change="uploadAddingImage" accept=".png, .jpg">
            </div>

            <div class="margiv-top-10 text-right">
                <button type="submit" class="btn btn-success save-cancel">Save</button>
                <a href="/admin/profile/show" class="btn btn-default save-cancel">Cancel</a>
            </div>
        </form>

    </div>
@endsection
@section("script")
    <script>
        const data = @json($data);
    </script>
    <script src="{{ mix('/dist/js/app.js') }}"></script>
    <script src="{{ mix('/dist/js/profile/avatar.js') }}"></script>
@endsection

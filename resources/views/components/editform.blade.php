<form enctype="multipart/form-data" action="{{ route('action.update') }}" method="POST">
    @csrf

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="action_name" class="form-control"
                        placeholder="Action Button Name" value="{{ old('action_name')??$action_name }}">
                </div>
                <span class="text-danger">{{ $errors->first('action_name') }}</span>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <div class="form-group">
                <div class="form-line">
                    <input type="text" name="action_path" class="form-control"
                        placeholder="path" value="{{ old('action_path')??$action_path }}">
                </div>
                <span class="text-danger">{{ $errors->first('action_path') }}</span>

            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
            <div class="form-line">
                <div class="form-group">

                    <input type="file" name="img" accept="image/*"
                        class="form-control">
                </div>
            </div>
        </div>
        <div style="display:none">
            <input type="text" value={{$id}}  name="id">
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

            <button type="submit"
                class="btn btn-danger btn-lg m-l-15 waves-effect">Update</button>
        </div>
    </div>
</form>


<div class="form-group {{ $errors->has('faculty_code') ? 'has-error' : '' }}">
    <label for="faculty_code" class="col-md-2 control-label">Faculty Code</label>
    <div class="col-md-10">
        <input class="form-control" name="faculty_code" type="text" id="faculty_code" value="{{ old('faculty_code', optional($faculty)->faculty_code) }}" minlength="1" placeholder="Enter faculty code here...">
        {!! $errors->first('faculty_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('faculty_name') ? 'has-error' : '' }}">
    <label for="faculty_name" class="col-md-2 control-label">Faculty Name</label>
    <div class="col-md-10">
        <input class="form-control" name="faculty_name" type="text" id="faculty_name" value="{{ old('faculty_name', optional($faculty)->faculty_name) }}" minlength="1" placeholder="Enter faculty name here...">
        {!! $errors->first('faculty_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    <label for="is_active" class="col-md-2 control-label">Is Active</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_active_1">
            	<input id="is_active_1" class="" name="is_active" type="checkbox" value="1" {{ old('is_active', optional($faculty)->is_active) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>


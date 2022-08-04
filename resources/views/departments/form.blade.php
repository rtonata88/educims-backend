
<div class="form-group {{ $errors->has('department_code') ? 'has-error' : '' }}">
    <label for="department_code" class="col-md-2 control-label">Department Code</label>
    <div class="col-md-10">
        <input class="form-control" name="department_code" type="text" id="department_code" value="{{ old('department_code', optional($department)->department_code) }}" minlength="1" placeholder="Enter department code here...">
        {!! $errors->first('department_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('department_name') ? 'has-error' : '' }}">
    <label for="department_name" class="col-md-2 control-label">Department Name</label>
    <div class="col-md-10">
        <input class="form-control" name="department_name" type="text" id="department_name" value="{{ old('department_name', optional($department)->department_name) }}" minlength="1" placeholder="Enter department name here...">
        {!! $errors->first('department_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('faculty_id') ? 'has-error' : '' }}">
    <label for="faculty_id" class="col-md-2 control-label">Faculty</label>
    <div class="col-md-10">
        <select class="form-control" id="faculty_id" name="faculty_id">
        	    <option value="" style="display: none;" {{ old('faculty_id', optional($department)->faculty_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select faculty</option>
        	@foreach ($faculties as $key => $faculty)
			    <option value="{{ $key }}" {{ old('faculty_id', optional($department)->faculty_id) == $key ? 'selected' : '' }}>
			    	{{ $faculty }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('faculty_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    <label for="is_active" class="col-md-2 control-label">Is Active</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_active_1">
            	<input id="is_active_1" class="" name="is_active" type="checkbox" value="1" {{ old('is_active', optional($department)->is_active) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>


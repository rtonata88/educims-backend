
<div class="form-group {{ $errors->has('qualification_code') ? 'has-error' : '' }}">
    <label for="qualification_code" class="col-md-2 control-label">Qualification Code</label>
    <div class="col-md-10">
        <input class="form-control" name="qualification_code" type="text" id="qualification_code" value="{{ old('qualification_code', optional($qualification)->qualification_code) }}" minlength="1" placeholder="Enter qualification code here...">
        {!! $errors->first('qualification_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('qualification_name') ? 'has-error' : '' }}">
    <label for="qualification_name" class="col-md-2 control-label">Qualification Name</label>
    <div class="col-md-10">
        <input class="form-control" name="qualification_name" type="text" id="qualification_name" value="{{ old('qualification_name', optional($qualification)->qualification_name) }}" minlength="1" placeholder="Enter qualification name here...">
        {!! $errors->first('qualification_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('number_of_years') ? 'has-error' : '' }}">
    <label for="number_of_years" class="col-md-2 control-label">Number Of Years</label>
    <div class="col-md-10">
        <input class="form-control" name="number_of_years" type="number" id="number_of_years" value="{{ old('number_of_years', optional($qualification)->number_of_years) }}" placeholder="Enter number of years here...">
        {!! $errors->first('number_of_years', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('department_code') ? 'has-error' : '' }}">
    <label for="department_code" class="col-md-2 control-label">Department Code</label>
    <div class="col-md-10">
        <input class="form-control" name="department_code" type="text" id="department_code" value="{{ old('department_code', optional($qualification)->department_code) }}" minlength="1" placeholder="Enter department code here...">
        {!! $errors->first('department_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('qualification_type_id') ? 'has-error' : '' }}">
    <label for="qualification_type_id" class="col-md-2 control-label">Qualification Type</label>
    <div class="col-md-10">
        <select class="form-control" id="qualification_type_id" name="qualification_type_id">
        	    <option value="" style="display: none;" {{ old('qualification_type_id', optional($qualification)->qualification_type_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select qualification type</option>
        	@foreach ($qualificationTypes as $key => $qualificationType)
			    <option value="{{ $key }}" {{ old('qualification_type_id', optional($qualification)->qualification_type_id) == $key ? 'selected' : '' }}>
			    	{{ $qualificationType }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('qualification_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('qualification_level') ? 'has-error' : '' }}">
    <label for="qualification_level" class="col-md-2 control-label">Qualification Level</label>
    <div class="col-md-10">
        <input class="form-control" name="qualification_level" type="text" id="qualification_level" value="{{ old('qualification_level', optional($qualification)->qualification_level) }}" minlength="1" placeholder="Enter qualification level here...">
        {!! $errors->first('qualification_level', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    <label for="is_active" class="col-md-2 control-label">Is Active</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_active_1">
            	<input id="is_active_1" class="" name="is_active" type="checkbox" value="1" {{ old('is_active', optional($qualification)->is_active) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>


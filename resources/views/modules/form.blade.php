
<div class="form-group {{ $errors->has('module_code') ? 'has-error' : '' }}">
    <label for="module_code" class="col-md-2 control-label">Module Code</label>
    <div class="col-md-10">
        <input class="form-control" name="module_code" type="text" id="module_code" value="{{ old('module_code', optional($module)->module_code) }}" minlength="1" placeholder="Enter module code here...">
        {!! $errors->first('module_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('module_name') ? 'has-error' : '' }}">
    <label for="module_name" class="col-md-2 control-label">Module Name</label>
    <div class="col-md-10">
        <input class="form-control" name="module_name" type="text" id="module_name" value="{{ old('module_name', optional($module)->module_name) }}" minlength="1" placeholder="Enter module name here...">
        {!! $errors->first('module_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('module_year_level') ? 'has-error' : '' }}">
    <label for="module_year_level" class="col-md-2 control-label">Module Year Level</label>
    <div class="col-md-10">
        <input class="form-control" name="module_year_level" type="text" id="module_year_level" value="{{ old('module_year_level', optional($module)->module_year_level) }}" minlength="1" placeholder="Enter module year level here...">
        {!! $errors->first('module_year_level', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('department_id') ? 'has-error' : '' }}">
    <label for="department_id" class="col-md-2 control-label">Department</label>
    <div class="col-md-10">
        <select class="form-control" id="department_id" name="department_id">
        	    <option value="" style="display: none;" {{ old('department_id', optional($module)->department_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select department</option>
        	@foreach ($departments as $key => $department)
			    <option value="{{ $key }}" {{ old('department_id', optional($module)->department_id) == $key ? 'selected' : '' }}>
			    	{{ $department }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('department_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('credits') ? 'has-error' : '' }}">
    <label for="credits" class="col-md-2 control-label">Credits</label>
    <div class="col-md-10">
        <input class="form-control" name="credits" type="text" id="credits" value="{{ old('credits', optional($module)->credits) }}" minlength="1" placeholder="Enter credits here...">
        {!! $errors->first('credits', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('has_practical') ? 'has-error' : '' }}">
    <label for="has_practical" class="col-md-2 control-label">Has Practical</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="has_practical_1">
            	<input id="has_practical_1" class="" name="has_practical" type="checkbox" value="1" {{ old('has_practical', optional($module)->has_practical) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('has_practical', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('nqflevel') ? 'has-error' : '' }}">
    <label for="nqflevel" class="col-md-2 control-label">Nqflevel</label>
    <div class="col-md-10">
        <input class="form-control" name="nqflevel" type="text" id="nqflevel" value="{{ old('nqflevel', optional($module)->nqflevel) }}" minlength="1" placeholder="Enter nqflevel here...">
        {!! $errors->first('nqflevel', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('qualification_level') ? 'has-error' : '' }}">
    <label for="qualification_level" class="col-md-2 control-label">Qualification Level</label>
    <div class="col-md-10">
        <input class="form-control" name="qualification_level" type="text" id="qualification_level" value="{{ old('qualification_level', optional($module)->qualification_level) }}" minlength="1" placeholder="Enter qualification level here...">
        {!! $errors->first('qualification_level', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    <label for="is_active" class="col-md-2 control-label">Is Active</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_active_1">
            	<input id="is_active_1" class="" name="is_active" type="checkbox" value="1" {{ old('is_active', optional($module)->is_active) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>


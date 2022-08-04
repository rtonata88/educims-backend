
<div class="form-group {{ $errors->has('academic_year') ? 'has-error' : '' }}">
    <label for="academic_year" class="col-md-2 control-label">Academic Year</label>
    <div class="col-md-10">
        <input class="form-control" name="academic_year" type="text" id="academic_year" value="{{ old('academic_year', optional($academicYear)->academic_year) }}" minlength="1" placeholder="Enter academic year here...">
        {!! $errors->first('academic_year', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    <label for="is_active" class="col-md-2 control-label">Is Active</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_active_1">
            	<input id="is_active_1" class="" name="is_active" type="checkbox" value="1" {{ old('is_active', optional($academicYear)->is_active) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('study_mode_code') ? 'has-error' : '' }}">
    <label for="study_mode_code" class="col-md-2 control-label">Study Mode Code</label>
    <div class="col-md-10">
        <input class="form-control" name="study_mode_code" type="text" id="study_mode_code" value="{{ old('study_mode_code', optional($studyMode)->study_mode_code) }}" minlength="1" placeholder="Enter study mode code here...">
        {!! $errors->first('study_mode_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('study_mode_name') ? 'has-error' : '' }}">
    <label for="study_mode_name" class="col-md-2 control-label">Study Mode Name</label>
    <div class="col-md-10">
        <input class="form-control" name="study_mode_name" type="text" id="study_mode_name" value="{{ old('study_mode_name', optional($studyMode)->study_mode_name) }}" minlength="1" placeholder="Enter study mode name here...">
        {!! $errors->first('study_mode_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


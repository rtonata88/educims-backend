
<div class="form-group {{ $errors->has('period_code') ? 'has-error' : '' }}">
    <label for="period_code" class="col-md-2 control-label">Period Code</label>
    <div class="col-md-10">
        <input class="form-control" name="period_code" type="text" id="period_code" value="{{ old('period_code', optional($studyPeriod)->period_code) }}" minlength="1" placeholder="Enter period code here...">
        {!! $errors->first('period_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('period_name') ? 'has-error' : '' }}">
    <label for="period_name" class="col-md-2 control-label">Period Name</label>
    <div class="col-md-10">
        <input class="form-control" name="period_name" type="text" id="period_name" value="{{ old('period_name', optional($studyPeriod)->period_name) }}" minlength="1" placeholder="Enter period name here...">
        {!! $errors->first('period_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


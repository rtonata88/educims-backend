
<div class="form-group {{ $errors->has('academic_year_id') ? 'has-error' : '' }}">
    <label for="academic_year_id" class="col-md-2 control-label">Academic Year</label>
    <div class="col-md-10">
        <select class="form-control" id="academic_year_id" name="academic_year_id">
        	    <option value="" style="display: none;" {{ old('academic_year_id', optional($gradingScale)->academic_year_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select academic year</option>
        	@foreach ($academicYears as $key => $academicYear)
			    <option value="{{ $key }}" {{ old('academic_year_id', optional($gradingScale)->academic_year_id) == $key ? 'selected' : '' }}>
			    	{{ $academicYear }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('academic_year_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('exam_type_id') ? 'has-error' : '' }}">
    <label for="exam_type_id" class="col-md-2 control-label">Exam Type</label>
    <div class="col-md-10">
        <select class="form-control" id="exam_type_id" name="exam_type_id">
        	    <option value="" style="display: none;" {{ old('exam_type_id', optional($gradingScale)->exam_type_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select exam type</option>
        	@foreach ($examTypes as $key => $examType)
			    <option value="{{ $key }}" {{ old('exam_type_id', optional($gradingScale)->exam_type_id) == $key ? 'selected' : '' }}>
			    	{{ $examType }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('exam_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('symbol') ? 'has-error' : '' }}">
    <label for="symbol" class="col-md-2 control-label">Symbol</label>
    <div class="col-md-10">
        <input class="form-control" name="symbol" type="text" id="symbol" value="{{ old('symbol', optional($gradingScale)->symbol) }}" minlength="1" placeholder="Enter symbol here...">
        {!! $errors->first('symbol', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('minimum_mark') ? 'has-error' : '' }}">
    <label for="minimum_mark" class="col-md-2 control-label">Minimum Mark</label>
    <div class="col-md-10">
        <input class="form-control" name="minimum_mark" type="text" id="minimum_mark" value="{{ old('minimum_mark', optional($gradingScale)->minimum_mark) }}" minlength="1" placeholder="Enter minimum mark here...">
        {!! $errors->first('minimum_mark', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('maximum_mark') ? 'has-error' : '' }}">
    <label for="maximum_mark" class="col-md-2 control-label">Maximum Mark</label>
    <div class="col-md-10">
        <input class="form-control" name="maximum_mark" type="text" id="maximum_mark" value="{{ old('maximum_mark', optional($gradingScale)->maximum_mark) }}" minlength="1" placeholder="Enter maximum mark here...">
        {!! $errors->first('maximum_mark', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('academic_result') ? 'has-error' : '' }}">
    <label for="academic_result" class="col-md-2 control-label">Academic Result</label>
    <div class="col-md-10">
        <input class="form-control" name="academic_result" type="text" id="academic_result" value="{{ old('academic_result', optional($gradingScale)->academic_result) }}" minlength="1" placeholder="Enter academic result here...">
        {!! $errors->first('academic_result', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('result_description') ? 'has-error' : '' }}">
    <label for="result_description" class="col-md-2 control-label">Result Description</label>
    <div class="col-md-10">
        <input class="form-control" name="result_description" type="text" id="result_description" value="{{ old('result_description', optional($gradingScale)->result_description) }}" minlength="1" placeholder="Enter result description here...">
        {!! $errors->first('result_description', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('academic_year_id') ? 'has-error' : '' }}">
    <label for="academic_year_id" class="col-md-2 control-label">Academic Year</label>
    <div class="col-md-10">
        <select class="form-control" id="academic_year_id" name="academic_year_id">
        	    <option value="" style="display: none;" {{ old('academic_year_id', optional($modulePaperSubminimum)->academic_year_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select academic year</option>
        	@foreach ($academicYears as $key => $academicYear)
			    <option value="{{ $key }}" {{ old('academic_year_id', optional($modulePaperSubminimum)->academic_year_id) == $key ? 'selected' : '' }}>
			    	{{ $academicYear }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('academic_year_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('module_id') ? 'has-error' : '' }}">
    <label for="module_id" class="col-md-2 control-label">Module</label>
    <div class="col-md-10">
        <select class="form-control" id="module_id" name="module_id">
        	    <option value="" style="display: none;" {{ old('module_id', optional($modulePaperSubminimum)->module_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select module</option>
        	@foreach ($modules as $key => $module)
			    <option value="{{ $key }}" {{ old('module_id', optional($modulePaperSubminimum)->module_id) == $key ? 'selected' : '' }}>
			    	{{ $module }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('module_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('exam_type_id') ? 'has-error' : '' }}">
    <label for="exam_type_id" class="col-md-2 control-label">Exam Type</label>
    <div class="col-md-10">
        <select class="form-control" id="exam_type_id" name="exam_type_id">
        	    <option value="" style="display: none;" {{ old('exam_type_id', optional($modulePaperSubminimum)->exam_type_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select exam type</option>
        	@foreach ($examTypes as $key => $examType)
			    <option value="{{ $key }}" {{ old('exam_type_id', optional($modulePaperSubminimum)->exam_type_id) == $key ? 'selected' : '' }}>
			    	{{ $examType }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('exam_type_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('paper_id') ? 'has-error' : '' }}">
    <label for="paper_id" class="col-md-2 control-label">Paper</label>
    <div class="col-md-10">
        <select class="form-control" id="paper_id" name="paper_id">
        	    <option value="" style="display: none;" {{ old('paper_id', optional($modulePaperSubminimum)->paper_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select paper</option>
        	@foreach ($papers as $key => $paper)
			    <option value="{{ $key }}" {{ old('paper_id', optional($modulePaperSubminimum)->paper_id) == $key ? 'selected' : '' }}>
			    	{{ $paper }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('paper_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('subminimum_mark') ? 'has-error' : '' }}">
    <label for="subminimum_mark" class="col-md-2 control-label">Subminimum Mark</label>
    <div class="col-md-10">
        <input class="form-control" name="subminimum_mark" type="text" id="subminimum_mark" value="{{ old('subminimum_mark', optional($modulePaperSubminimum)->subminimum_mark) }}" minlength="1" placeholder="Enter subminimum mark here...">
        {!! $errors->first('subminimum_mark', '<p class="help-block">:message</p>') !!}
    </div>
</div>


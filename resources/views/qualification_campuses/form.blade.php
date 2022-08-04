
<div class="form-group {{ $errors->has('academic_year_id') ? 'has-error' : '' }}">
    <label for="academic_year_id" class="col-md-2 control-label">Academic Year</label>
    <div class="col-md-10">
        <select class="form-control" id="academic_year_id" name="academic_year_id">
        	    <option value="" style="display: none;" {{ old('academic_year_id', optional($qualificationCampus)->academic_year_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select academic year</option>
        	@foreach ($academicYears as $key => $academicYear)
			    <option value="{{ $key }}" {{ old('academic_year_id', optional($qualificationCampus)->academic_year_id) == $key ? 'selected' : '' }}>
			    	{{ $academicYear }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('academic_year_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('qualification_id') ? 'has-error' : '' }}">
    <label for="qualification_id" class="col-md-2 control-label">Qualification</label>
    <div class="col-md-10">
        <select class="form-control" id="qualification_id" name="qualification_id">
        	    <option value="" style="display: none;" {{ old('qualification_id', optional($qualificationCampus)->qualification_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select qualification</option>
        	@foreach ($qualifications as $key => $qualification)
			    <option value="{{ $key }}" {{ old('qualification_id', optional($qualificationCampus)->qualification_id) == $key ? 'selected' : '' }}>
			    	{{ $qualification }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('qualification_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('study_mode_id') ? 'has-error' : '' }}">
    <label for="study_mode_id" class="col-md-2 control-label">Study Mode</label>
    <div class="col-md-10">
        <select class="form-control" id="study_mode_id" name="study_mode_id">
        	    <option value="" style="display: none;" {{ old('study_mode_id', optional($qualificationCampus)->study_mode_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select study mode</option>
        	@foreach ($studyModes as $key => $studyMode)
			    <option value="{{ $key }}" {{ old('study_mode_id', optional($qualificationCampus)->study_mode_id) == $key ? 'selected' : '' }}>
			    	{{ $studyMode }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('study_mode_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('campus_id') ? 'has-error' : '' }}">
    <label for="campus_id" class="col-md-2 control-label">Campus</label>
    <div class="col-md-10">
        <select class="form-control" id="campus_id" name="campus_id">
        	    <option value="" style="display: none;" {{ old('campus_id', optional($qualificationCampus)->campus_id ?: '') == '' ? 'selected' : '' }} disabled selected>Select campus</option>
        	@foreach ($campuses as $key => $campus)
			    <option value="{{ $key }}" {{ old('campus_id', optional($qualificationCampus)->campus_id) == $key ? 'selected' : '' }}>
			    	{{ $campus }}
			    </option>
			@endforeach
        </select>
        
        {!! $errors->first('campus_id', '<p class="help-block">:message</p>') !!}
    </div>
</div>


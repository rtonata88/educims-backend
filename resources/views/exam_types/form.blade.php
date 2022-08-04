
<div class="form-group {{ $errors->has('exam_type_code') ? 'has-error' : '' }}">
    <label for="exam_type_code" class="col-md-2 control-label">Exam Type Code</label>
    <div class="col-md-10">
        <input class="form-control" name="exam_type_code" type="text" id="exam_type_code" value="{{ old('exam_type_code', optional($examType)->exam_type_code) }}" minlength="1" placeholder="Enter exam type code here...">
        {!! $errors->first('exam_type_code', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('exam_type_name') ? 'has-error' : '' }}">
    <label for="exam_type_name" class="col-md-2 control-label">Exam Type Name</label>
    <div class="col-md-10">
        <input class="form-control" name="exam_type_name" type="text" id="exam_type_name" value="{{ old('exam_type_name', optional($examType)->exam_type_name) }}" minlength="1" placeholder="Enter exam type name here...">
        {!! $errors->first('exam_type_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


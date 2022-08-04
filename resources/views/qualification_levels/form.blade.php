
<div class="form-group {{ $errors->has('qualification_level') ? 'has-error' : '' }}">
    <label for="qualification_level" class="col-md-2 control-label">Qualification Level</label>
    <div class="col-md-10">
        <input class="form-control" name="qualification_level" type="text" id="qualification_level" value="{{ old('qualification_level', optional($qualificationLevel)->qualification_level) }}" minlength="1" placeholder="Enter qualification level here...">
        {!! $errors->first('qualification_level', '<p class="help-block">:message</p>') !!}
    </div>
</div>


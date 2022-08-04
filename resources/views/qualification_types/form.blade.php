
<div class="form-group {{ $errors->has('qualification_type') ? 'has-error' : '' }}">
    <label for="qualification_type" class="col-md-2 control-label">Qualification Type</label>
    <div class="col-md-10">
        <input class="form-control" name="qualification_type" type="text" id="qualification_type" value="{{ old('qualification_type', optional($qualificationType)->qualification_type) }}" minlength="1" placeholder="Enter qualification type here...">
        {!! $errors->first('qualification_type', '<p class="help-block">:message</p>') !!}
    </div>
</div>



<div class="form-group {{ $errors->has('paper_name') ? 'has-error' : '' }}">
    <label for="paper_name" class="col-md-2 control-label">Paper Name</label>
    <div class="col-md-10">
        <input class="form-control" name="paper_name" type="text" id="paper_name" value="{{ old('paper_name', optional($examPaper)->paper_name) }}" minlength="1" placeholder="Enter paper name here...">
        {!! $errors->first('paper_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>


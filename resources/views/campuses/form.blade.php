
<div class="form-group {{ $errors->has('campus_name') ? 'has-error' : '' }}">
    <label for="campus_name" class="col-md-2 control-label">Campus Name</label>
    <div class="col-md-10">
        <input class="form-control" name="campus_name" type="text" id="campus_name" value="{{ old('campus_name', optional($campus)->campus_name) }}" minlength="1" placeholder="Enter campus name here...">
        {!! $errors->first('campus_name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('postal_address') ? 'has-error' : '' }}">
    <label for="postal_address" class="col-md-2 control-label">Postal Address</label>
    <div class="col-md-10">
        <input class="form-control" name="postal_address" type="text" id="postal_address" value="{{ old('postal_address', optional($campus)->postal_address) }}" minlength="1" placeholder="Enter postal address here...">
        {!! $errors->first('postal_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('physical_address') ? 'has-error' : '' }}">
    <label for="physical_address" class="col-md-2 control-label">Physical Address</label>
    <div class="col-md-10">
        <input class="form-control" name="physical_address" type="text" id="physical_address" value="{{ old('physical_address', optional($campus)->physical_address) }}" minlength="1" placeholder="Enter physical address here...">
        {!! $errors->first('physical_address', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('contact_number') ? 'has-error' : '' }}">
    <label for="contact_number" class="col-md-2 control-label">Contact Number</label>
    <div class="col-md-10">
        <input class="form-control" name="contact_number" type="number" id="contact_number" value="{{ old('contact_number', optional($campus)->contact_number) }}" placeholder="Enter contact number here...">
        {!! $errors->first('contact_number', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('contact_person') ? 'has-error' : '' }}">
    <label for="contact_person" class="col-md-2 control-label">Contact Person</label>
    <div class="col-md-10">
        <input class="form-control" name="contact_person" type="text" id="contact_person" value="{{ old('contact_person', optional($campus)->contact_person) }}" minlength="1" placeholder="Enter contact person here...">
        {!! $errors->first('contact_person', '<p class="help-block">:message</p>') !!}
    </div>
</div>

<div class="form-group {{ $errors->has('is_active') ? 'has-error' : '' }}">
    <label for="is_active" class="col-md-2 control-label">Is Active</label>
    <div class="col-md-10">
        <div class="checkbox">
            <label for="is_active_1">
            	<input id="is_active_1" class="" name="is_active" type="checkbox" value="1" {{ old('is_active', optional($campus)->is_active) == '1' ? 'checked' : '' }}>
                Yes
            </label>
        </div>

        {!! $errors->first('is_active', '<p class="help-block">:message</p>') !!}
    </div>
</div>


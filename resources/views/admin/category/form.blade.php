<div class="form-body">
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
            	{!! Form::label('name', 'Name') !!}
            	{!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
            	{!! Form::label('is_featured', 'Is featured') !!}
                <select name="is_featured" class="form-control">
                    <option value="0" {!! isset($category) && $category->is_featured == '0' ? 'selected' : '' !!}>No</option>
                    <option value="1" {!! isset($category) && $category->is_featured == '1' ? 'selected' : '' !!}>Yes</option>
                </select>
            </div>
        </div>
   </div>
</div>

<?php

$categories = DB::table('categories')->get();

?>

<div class="col-md-12">
    <div class="form-group">
        {!! Form::label('category', 'Parent Category') !!}
        <select name="parent" class="form-control">
            <option value="0"> No Parent </option>
            @foreach($categories as $key => $val_category)
                <option value="{{ $val_category->id }}" {{ $val_category->id == $category->parent ? 'selected' : '' }}> {{ $val_category->name }} </option>
            @endforeach
        </select>
    </div>
</div>


<div class="form-actions text-right pb-0">
	{!! Form::submit(isset($submitButtonText) ? $submitButtonText : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
<div class="form-group row justify-content-center left_css col-md-12 {{ $errors->has('name') ? 'has-error' : ''}}">
    
    <div class="col-md-12">
        
        {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
    </div>
</div>

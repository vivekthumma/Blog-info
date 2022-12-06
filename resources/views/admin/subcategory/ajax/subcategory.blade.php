<strong>Sub Categories</strong>
{!! Form::select('sub_categories_id', $data, null, array('class' => 'form-control form-select')) !!}
@if ($errors->has('sub_categories_id'))
        <span class="text-danger">{{ $errors->first('sub_categories_id') }}</span>
@endif
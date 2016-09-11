<div class="col-md-8">
    <div class="form-group">
        {!! Form::text('title',null,['class' => 'form-control','placeholder' =>'Please input title ...']) !!}
    </div>
    <div class="form-group">
        {!! Form::textarea('content',null,['class' => 'form-control','id'=>'content-textarea']) !!}
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        {!! Form::button($submitButtonText,['class' => 'btn btn-primary form-control','id' => 'submit-article']) !!}
        {!! Form::button($submitButtonText2,['class' => 'btn btn-primary form-control','id' => 'save-article']) !!}
    </div>
</div>
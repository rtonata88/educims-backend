@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Grading Scale' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('grading_scales.grading_scale.destroy', $gradingScale->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('grading_scales.grading_scale.index') }}" class="btn btn-primary" title="Show All Grading Scale">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('grading_scales.grading_scale.create') }}" class="btn btn-success" title="Create New Grading Scale">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('grading_scales.grading_scale.edit', $gradingScale->id ) }}" class="btn btn-primary" title="Edit Grading Scale">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Grading Scale" onclick="return confirm(&quot;Click Ok to delete Grading Scale.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Academic Year</dt>
            <dd>{{ optional($gradingScale->academicYear)->academic_year }}</dd>
            <dt>Exam Type</dt>
            <dd>{{ optional($gradingScale->examType)->exam_type_code }}</dd>
            <dt>Symbol</dt>
            <dd>{{ $gradingScale->symbol }}</dd>
            <dt>Minimum Mark</dt>
            <dd>{{ $gradingScale->minimum_mark }}</dd>
            <dt>Maximum Mark</dt>
            <dd>{{ $gradingScale->maximum_mark }}</dd>
            <dt>Academic Result</dt>
            <dd>{{ $gradingScale->academic_result }}</dd>
            <dt>Result Description</dt>
            <dd>{{ $gradingScale->result_description }}</dd>

        </dl>

    </div>
</div>

@endsection
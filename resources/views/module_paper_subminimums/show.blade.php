@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Module Paper Subminimum' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('module_paper_subminimums.module_paper_subminimum.destroy', $modulePaperSubminimum->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('module_paper_subminimums.module_paper_subminimum.index') }}" class="btn btn-primary" title="Show All Module Paper Subminimum">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('module_paper_subminimums.module_paper_subminimum.create') }}" class="btn btn-success" title="Create New Module Paper Subminimum">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('module_paper_subminimums.module_paper_subminimum.edit', $modulePaperSubminimum->id ) }}" class="btn btn-primary" title="Edit Module Paper Subminimum">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Module Paper Subminimum" onclick="return confirm(&quot;Click Ok to delete Module Paper Subminimum.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Academic Year</dt>
            <dd>{{ optional($modulePaperSubminimum->academicYear)->academic_year }}</dd>
            <dt>Module</dt>
            <dd>{{ optional($modulePaperSubminimum->module)->module_code }}</dd>
            <dt>Exam Type</dt>
            <dd>{{ optional($modulePaperSubminimum->examType)->exam_type_code }}</dd>
            <dt>Paper</dt>
            <dd>{{ optional($modulePaperSubminimum->paper)->id }}</dd>
            <dt>Subminimum Mark</dt>
            <dd>{{ $modulePaperSubminimum->subminimum_mark }}</dd>

        </dl>

    </div>
</div>

@endsection
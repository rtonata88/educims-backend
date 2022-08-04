@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Exam Type' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('exam_types.exam_type.destroy', $examType->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('exam_types.exam_type.index') }}" class="btn btn-primary" title="Show All Exam Type">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('exam_types.exam_type.create') }}" class="btn btn-success" title="Create New Exam Type">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('exam_types.exam_type.edit', $examType->id ) }}" class="btn btn-primary" title="Edit Exam Type">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Exam Type" onclick="return confirm(&quot;Click Ok to delete Exam Type.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Exam Type Code</dt>
            <dd>{{ $examType->exam_type_code }}</dd>
            <dt>Exam Type Name</dt>
            <dd>{{ $examType->exam_type_name }}</dd>

        </dl>

    </div>
</div>

@endsection
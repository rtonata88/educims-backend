@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Exam Paper' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('exam_papers.exam_paper.destroy', $examPaper->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('exam_papers.exam_paper.index') }}" class="btn btn-primary" title="Show All Exam Paper">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('exam_papers.exam_paper.create') }}" class="btn btn-success" title="Create New Exam Paper">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('exam_papers.exam_paper.edit', $examPaper->id ) }}" class="btn btn-primary" title="Edit Exam Paper">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Exam Paper" onclick="return confirm(&quot;Click Ok to delete Exam Paper.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Paper Name</dt>
            <dd>{{ $examPaper->paper_name }}</dd>

        </dl>

    </div>
</div>

@endsection
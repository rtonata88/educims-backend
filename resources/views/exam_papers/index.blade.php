@extends('layouts.app')

@section('content')

    @if(Session::has('success_message'))
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            {!! session('success_message') !!}

            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    @endif

    <div class="panel panel-default">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">Exam Papers</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('exam_papers.exam_paper.create') }}" class="btn btn-success" title="Create New Exam Paper">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($examPapers) == 0)
            <div class="panel-body text-center">
                <h4>No Exam Papers Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Paper Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($examPapers as $examPaper)
                        <tr>
                            <td>{{ $examPaper->paper_name }}</td>

                            <td>

                                <form method="POST" action="{!! route('exam_papers.exam_paper.destroy', $examPaper->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('exam_papers.exam_paper.show', $examPaper->id ) }}" class="btn btn-info" title="Show Exam Paper">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('exam_papers.exam_paper.edit', $examPaper->id ) }}" class="btn btn-primary" title="Edit Exam Paper">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Exam Paper" onclick="return confirm(&quot;Click Ok to delete Exam Paper.&quot;)">
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            {!! $examPapers->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
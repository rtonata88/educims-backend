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
                <h4 class="mt-5 mb-5">Module Paper Subminimums</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('module_paper_subminimums.module_paper_subminimum.create') }}" class="btn btn-success" title="Create New Module Paper Subminimum">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($modulePaperSubminimums) == 0)
            <div class="panel-body text-center">
                <h4>No Module Paper Subminimums Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Academic Year</th>
                            <th>Module</th>
                            <th>Exam Type</th>
                            <th>Paper</th>
                            <th>Subminimum Mark</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($modulePaperSubminimums as $modulePaperSubminimum)
                        <tr>
                            <td>{{ optional($modulePaperSubminimum->academicYear)->academic_year }}</td>
                            <td>{{ optional($modulePaperSubminimum->module)->module_code }}</td>
                            <td>{{ optional($modulePaperSubminimum->examType)->exam_type_code }}</td>
                            <td>{{ optional($modulePaperSubminimum->paper)->id }}</td>
                            <td>{{ $modulePaperSubminimum->subminimum_mark }}</td>

                            <td>

                                <form method="POST" action="{!! route('module_paper_subminimums.module_paper_subminimum.destroy', $modulePaperSubminimum->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('module_paper_subminimums.module_paper_subminimum.show', $modulePaperSubminimum->id ) }}" class="btn btn-info" title="Show Module Paper Subminimum">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('module_paper_subminimums.module_paper_subminimum.edit', $modulePaperSubminimum->id ) }}" class="btn btn-primary" title="Edit Module Paper Subminimum">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Module Paper Subminimum" onclick="return confirm(&quot;Click Ok to delete Module Paper Subminimum.&quot;)">
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
            {!! $modulePaperSubminimums->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
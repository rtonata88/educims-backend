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
                <h4 class="mt-5 mb-5">Study Periods</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('study_periods.study_period.create') }}" class="btn btn-success" title="Create New Study Period">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($studyPeriods) == 0)
            <div class="panel-body text-center">
                <h4>No Study Periods Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Period Code</th>
                            <th>Period Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($studyPeriods as $studyPeriod)
                        <tr>
                            <td>{{ $studyPeriod->period_code }}</td>
                            <td>{{ $studyPeriod->period_name }}</td>

                            <td>

                                <form method="POST" action="{!! route('study_periods.study_period.destroy', $studyPeriod->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('study_periods.study_period.show', $studyPeriod->id ) }}" class="btn btn-info" title="Show Study Period">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('study_periods.study_period.edit', $studyPeriod->id ) }}" class="btn btn-primary" title="Edit Study Period">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Study Period" onclick="return confirm(&quot;Click Ok to delete Study Period.&quot;)">
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
            {!! $studyPeriods->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
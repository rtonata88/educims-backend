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
                <h4 class="mt-5 mb-5">Study Modes</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('study_modes.study_mode.create') }}" class="btn btn-success" title="Create New Study Mode">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($studyModes) == 0)
            <div class="panel-body text-center">
                <h4>No Study Modes Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Study Mode Code</th>
                            <th>Study Mode Name</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($studyModes as $studyMode)
                        <tr>
                            <td>{{ $studyMode->study_mode_code }}</td>
                            <td>{{ $studyMode->study_mode_name }}</td>

                            <td>

                                <form method="POST" action="{!! route('study_modes.study_mode.destroy', $studyMode->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('study_modes.study_mode.show', $studyMode->id ) }}" class="btn btn-info" title="Show Study Mode">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('study_modes.study_mode.edit', $studyMode->id ) }}" class="btn btn-primary" title="Edit Study Mode">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Study Mode" onclick="return confirm(&quot;Click Ok to delete Study Mode.&quot;)">
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
            {!! $studyModes->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
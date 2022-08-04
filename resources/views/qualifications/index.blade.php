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
                <h4 class="mt-5 mb-5">Qualifications</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('qualifications.qualification.create') }}" class="btn btn-success" title="Create New Qualification">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($qualifications) == 0)
            <div class="panel-body text-center">
                <h4>No Qualifications Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Qualification Code</th>
                            <th>Qualification Name</th>
                            <th>Number Of Years</th>
                            <th>Department Code</th>
                            <th>Qualification Type</th>
                            <th>Qualification Level</th>
                            <th>Is Active</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($qualifications as $qualification)
                        <tr>
                            <td>{{ $qualification->qualification_code }}</td>
                            <td>{{ $qualification->qualification_name }}</td>
                            <td>{{ $qualification->number_of_years }}</td>
                            <td>{{ $qualification->department_code }}</td>
                            <td>{{ optional($qualification->qualificationType)->id }}</td>
                            <td>{{ $qualification->qualification_level }}</td>
                            <td>{{ ($qualification->is_active) ? 'Yes' : 'No' }}</td>

                            <td>

                                <form method="POST" action="{!! route('qualifications.qualification.destroy', $qualification->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('qualifications.qualification.show', $qualification->id ) }}" class="btn btn-info" title="Show Qualification">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('qualifications.qualification.edit', $qualification->id ) }}" class="btn btn-primary" title="Edit Qualification">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Qualification" onclick="return confirm(&quot;Click Ok to delete Qualification.&quot;)">
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
            {!! $qualifications->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
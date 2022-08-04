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
                <h4 class="mt-5 mb-5">Faculties</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('faculties.faculty.create') }}" class="btn btn-success" title="Create New Faculty">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($faculties) == 0)
            <div class="panel-body text-center">
                <h4>No Faculties Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Faculty Code</th>
                            <th>Faculty Name</th>
                            <th>Is Active</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($faculties as $faculty)
                        <tr>
                            <td>{{ $faculty->faculty_code }}</td>
                            <td>{{ $faculty->faculty_name }}</td>
                            <td>{{ ($faculty->is_active) ? 'Yes' : 'No' }}</td>

                            <td>

                                <form method="POST" action="{!! route('faculties.faculty.destroy', $faculty->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('faculties.faculty.show', $faculty->id ) }}" class="btn btn-info" title="Show Faculty">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('faculties.faculty.edit', $faculty->id ) }}" class="btn btn-primary" title="Edit Faculty">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Faculty" onclick="return confirm(&quot;Click Ok to delete Faculty.&quot;)">
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
            {!! $faculties->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
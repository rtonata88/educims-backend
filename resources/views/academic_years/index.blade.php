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
                <h4 class="mt-5 mb-5">Academic Years</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('academic_years.academic_year.create') }}" class="btn btn-success" title="Create New Academic Year">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($academicYears) == 0)
            <div class="panel-body text-center">
                <h4>No Academic Years Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Academic Year</th>
                            <th>Is Active</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($academicYears as $academicYear)
                        <tr>
                            <td>{{ $academicYear->academic_year }}</td>
                            <td>{{ ($academicYear->is_active) ? 'Yes' : 'No' }}</td>

                            <td>

                                <form method="POST" action="{!! route('academic_years.academic_year.destroy', $academicYear->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('academic_years.academic_year.show', $academicYear->id ) }}" class="btn btn-info" title="Show Academic Year">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('academic_years.academic_year.edit', $academicYear->id ) }}" class="btn btn-primary" title="Edit Academic Year">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Academic Year" onclick="return confirm(&quot;Click Ok to delete Academic Year.&quot;)">
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
            {!! $academicYears->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
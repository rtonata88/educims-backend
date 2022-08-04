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
                <h4 class="mt-5 mb-5">Modules</h4>
            </div>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="{{ route('modules.module.create') }}" class="btn btn-success" title="Create New Module">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        @if(count($modules) == 0)
            <div class="panel-body text-center">
                <h4>No Modules Available.</h4>
            </div>
        @else
        <div class="panel-body panel-body-with-table">
            <div class="table-responsive">

                <table class="table table-striped ">
                    <thead>
                        <tr>
                            <th>Module Code</th>
                            <th>Module Name</th>
                            <th>Module Year Level</th>
                            <th>Department</th>
                            <th>Credits</th>
                            <th>Has Practical</th>
                            <th>Nqflevel</th>
                            <th>Qualification Level</th>
                            <th>Is Active</th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($modules as $module)
                        <tr>
                            <td>{{ $module->module_code }}</td>
                            <td>{{ $module->module_name }}</td>
                            <td>{{ $module->module_year_level }}</td>
                            <td>{{ optional($module->department)->department_code }}</td>
                            <td>{{ $module->credits }}</td>
                            <td>{{ ($module->has_practical) ? 'Yes' : 'No' }}</td>
                            <td>{{ $module->nqflevel }}</td>
                            <td>{{ $module->qualification_level }}</td>
                            <td>{{ ($module->is_active) ? 'Yes' : 'No' }}</td>

                            <td>

                                <form method="POST" action="{!! route('modules.module.destroy', $module->id) !!}" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                {{ csrf_field() }}

                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="{{ route('modules.module.show', $module->id ) }}" class="btn btn-info" title="Show Module">
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="{{ route('modules.module.edit', $module->id ) }}" class="btn btn-primary" title="Edit Module">
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Module" onclick="return confirm(&quot;Click Ok to delete Module.&quot;)">
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
            {!! $modules->render() !!}
        </div>
        
        @endif
    
    </div>
@endsection
@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Module' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('modules.module.destroy', $module->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('modules.module.index') }}" class="btn btn-primary" title="Show All Module">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('modules.module.create') }}" class="btn btn-success" title="Create New Module">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('modules.module.edit', $module->id ) }}" class="btn btn-primary" title="Edit Module">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Module" onclick="return confirm(&quot;Click Ok to delete Module.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Module Code</dt>
            <dd>{{ $module->module_code }}</dd>
            <dt>Module Name</dt>
            <dd>{{ $module->module_name }}</dd>
            <dt>Module Year Level</dt>
            <dd>{{ $module->module_year_level }}</dd>
            <dt>Department</dt>
            <dd>{{ optional($module->department)->department_code }}</dd>
            <dt>Credits</dt>
            <dd>{{ $module->credits }}</dd>
            <dt>Has Practical</dt>
            <dd>{{ ($module->has_practical) ? 'Yes' : 'No' }}</dd>
            <dt>Nqflevel</dt>
            <dd>{{ $module->nqflevel }}</dd>
            <dt>Qualification Level</dt>
            <dd>{{ $module->qualification_level }}</dd>
            <dt>Is Active</dt>
            <dd>{{ ($module->is_active) ? 'Yes' : 'No' }}</dd>

        </dl>

    </div>
</div>

@endsection
@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Study Period' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('study_periods.study_period.destroy', $studyPeriod->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('study_periods.study_period.index') }}" class="btn btn-primary" title="Show All Study Period">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('study_periods.study_period.create') }}" class="btn btn-success" title="Create New Study Period">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('study_periods.study_period.edit', $studyPeriod->id ) }}" class="btn btn-primary" title="Edit Study Period">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Study Period" onclick="return confirm(&quot;Click Ok to delete Study Period.?&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Period Code</dt>
            <dd>{{ $studyPeriod->period_code }}</dd>
            <dt>Period Name</dt>
            <dd>{{ $studyPeriod->period_name }}</dd>

        </dl>

    </div>
</div>

@endsection
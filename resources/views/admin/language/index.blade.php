@extends('layouts.deshboard')

@section('content')
    <span class="float-right">
        @php
            $lang = DB::table('lang_changes')->first();
        @endphp
        @if (!empty($lang->id))
        @else
            <a class="btn btn-primary mb-2 ml-2" href="{{ route('admin.language.create') }}">Add
                Language</a>
        @endif
    </span>
    <x-forms.admin.language.langindex :languages="$languages" :admin="'admin'" />
@endsection

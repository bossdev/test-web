@extends('layouts.master')
@section('title','product')
@section('content')
<div>
    <h2>product page</h2>

    {!! $html->table(['class' => 'table table-bordered custom_table','id'=>'tableListProduct']) !!}

    <!-- <table id="tableListProduct">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>price</th>
        </tr>
    </table> -->
</div>
@endsection
@section('content_script')
    {!! $html->scripts() !!}
@endsection
@extends('layouts.app')

@section('content')
    <form method="post" action="/csv" enctype="multipart/form-data" class="grid grid-cols-1 md:grid-cols-2">
        {{csrf_field()}}

        <div class="p-6">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="csv" name="csv" aria-describedby="csvAddon01">
                <label class="custom-file-label" for="csv">Upload CSV</label>
            </div>
        </div>
        <div class="p-6">
            <button type="submit" class="btn btn-primary float-right">Process</button>
            <input type="hidden" name="_method" value="POST">
        </div>
    </form>
@endsection

@section('custom-js')
    <script type="application/javascript">
        $('input[type="file"]').change(function (e) {
            let fileName = 'Upload CSV';

            if (e.target.files[0]) {
                fileName = e.target.files[0].name;
            }

            $('.custom-file-label').html(fileName);
        });
    </script>
@endsection


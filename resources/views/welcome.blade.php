@extends('layouts.main')
@section('content')

<table class="table">
    <thead>
        <tr>
            <td>State</td>
            <td>Lga</td>
            <td>Polling Unit</td>
            <td>Result</td>
            </tr>
    </thead>
    <tbody>
    <tr>
    <td>{{ $state->state_name }}</td>
    <td>{{ $lga->lga_name }}</td>
    <td>{{ $pollingunit->polling_unit_name ?? "No Name Assinged" }}</td>
    <td>{{ $result }}</td>
    </tr>
    </tbody>
    </table>


</body>
</html>
@endsection

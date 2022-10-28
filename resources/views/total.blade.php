@extends('layouts.main')
@section('content')


<table class="table">
    <thead>
        <tr>
            <td>State</td>
            <td>Lga</td>
            <td>Result</td>
            </tr>
    </thead>
    <tbody>
    <tr>
    <td>{{ $state->state_name }}</td>
    <td>
        <select class="form-select" aria-label="Default select example">
            <option selected>Select Lga</option>
            @forelse ($pollingunit as $unit )
            <option value="">{{ $unit->polling_unit_name ?? "No Name Assinged" }}</option>
            @empty

            @endforelse
          </select>
    </td>

    {{-- <td>{{ $result }}</td> --}}
    </tr>
    </tbody>
    </table>

@endsection



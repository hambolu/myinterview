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
        <form action="/getResult" method="POST">
            @csrf
        <select class="form-select" name="lga_id" onchange="this.form.submit()">
            <option selected>Select Lga</option>
            @forelse ($pollingunit as $unit )
            <option value="{{ $unit->lga_id}}">{{ $unit->lga_name ?? "No Name Assinged" }}</option>
            @empty

            @endforelse
          </select>
        </form>
    </td>

    <td>{{ $result ?? "0" }}</td>
    </tr>
    </tbody>
    </table>

@endsection



@extends('layouts.main')
@section('content')
<form action="/addNewData" method="post" class="mt-3">
    @csrf
    <select class="form-select mb-3" name="party_abbreviation"aria-label="Default select example">
        <option selected>Select Party</option>
        @forelse ($party as $unit )
        <option value="{{ $unit->partyname }}">{{ $unit->partyname }}</option>
        @empty

        @endforelse
      </select>
      <select class="form-select mb-3" name="uniqueid"aria-label="Default select example">
        <option selected>Select Polling</option>
        @forelse ($pollingunit as $unit )
        <option value="{{ $unit->uniqueid }}">{{ $unit->polling_unit_name }}</option>
        @empty

        @endforelse
      </select>
<div class="mb-3">

    <input type="text" class="form-control" name="party_score"  placeholder=" Score">
</div>
<div class="mb-3">

    <input type="text" class="form-control" name="entered_by_user" placeholder=" User" >
</div>
<input type="submit" value="Save" class="btn btn-primary">
</form>


@endsection

@extends('layouts.app')
@section('content')
<div class="col-lg-8 ml-6">
   <div class="card">
      <div class="card-header">Add <strong>Shares</strong><small> for {{ $company['name'] }}</small></div>
      <div class="card-body card-block">
         <form method="post" action="{{url('shares')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="Company" class=" form-control-label">Company Name</label>
                <input type="text" disabled="disabled" id="company" name="company" value="{{ $company['name'] }}" class="form-control">
            </div>
            <input type="hidden" name="company_id" value="{{ $company['id'] }}">
            <div class="form-group">
                    <label for="Shares">Shares % Remaining</label>
                    <input type="text" disabled="disabled" id="sharepercent" value="{{ $sharesreminaing }}" class="form-control" name="sharepercent">
                 </div>
            <div class="form-group">
                    <label for="shareholder_type" class=" form-control-label">Shareholder type</label>
                    <select id="shareholder_type" name="shareholder_type" class="form-control">
                        @foreach($shareholdertypes as $key => $shareholder)
                            <option value="{{ $key }}">{{ $shareholder }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group company" style="display:none;">
                        <label for="owner" class=" form-control-label">Company owner</label>
                        <select id="owners" class="form-control">
                            @foreach($companies as $company)
                                <option value="{{ $company['id'] }}">{{ $company['name'] }}</option>
                            @endforeach
                        </select>
                    </div>

            <div class="form-group person">
                    <label for="shareholder" class=" form-control-label">Shareholder</label>
                    <select id="shareholder" name="person_id" class="form-control">
                        @foreach($persons as $person)
                            <option value="{{ $person['id'] }}">{{ $person['firstname'] }} {{ $person['lastname'] }}</option>
                        @endforeach
                    </select>
                </div>

                  <div class="form-group">
                     <label for="Shares">Shares %</label>
                     <input type="text" id="share" class="form-control" placeholder="Percent share" name="share">
                  </div>



            <div class="form-group">
               <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>
         </form>
      </div>
   </div>
</div>
@endsection

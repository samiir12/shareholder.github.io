@extends('layouts.app')
@section('content')
<div class="col-lg-8 ml-6">
   <div class="card">
      <div class="card-header">New <strong>Company</strong><small> Form</small></div>
      <div class="card-body card-block">
         <form method="post" action="{{url('companies')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name" class=" form-control-label">Company</label>
                <input type="text" id="name" placeholder="Enter your company name" name="name" class="form-control">
            </div>
            <div class="form-group">
                    <label for="owner_type" class=" form-control-label">Owner type</label>
                    <select id="owner_type" name="owner_type" class="form-control">
                        @foreach($ownertypes as $key => $ownertype)
                            <option value="{{ $key }}">{{ $ownertype }}</option>
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
                    <label for="owner" class=" form-control-label">Company owner</label>
                    <select id="owners" name="owner_id" class="form-control">
                        @foreach($persons as $person)
                            <option value="{{ $person['id'] }}">{{ $person['firstname'] }} {{ $person['lastname'] }}</option>
                        @endforeach
                    </select>
                </div>


            <div class="row form-group">
               <div class="col-5">
                  <div class="form-group">
                     <label for="vat" class=" form-control-label">VAT</label>
                     <input type="text" id="vat" name="vat" placeholder="DE1234567890" class="form-control">
                  </div>
               </div>
               <div class="col-5">
                  <div class="form-group">
                     <label for="Capital">Capital</label>
                     <input type="number" id="capital" class="form-control" name="capital">
                  </div>
               </div>
            </div>
            <div class="form-group">
                <label for="street" class="form-control-label">Street</label>
                <input type="text" name="street" id="street" placeholder="Enter street name" class="form-control">
            </div>

            <div class="row form-group">
               <div class="col-5">
                  <div class="form-group">
                    <label for="city" class=" form-control-label">City</label>
                    <input type="text" name="city" id="city" placeholder="Enter your city" class="form-control">
                </div>
               </div>
               <div class="col-5">
                  <div class="form-group">
                      <label for="postal-code" class=" form-control-label">Postal Code</label>
                      <input type="text" name="postalcode" id="postal-code" placeholder="Postal Code" class="form-control">
                    </div>
               </div>
            </div>
            <div class="form-group">
                <label for="country" class=" form-control-label">Country</label>
                <input type="text" id="country" name="country" placeholder="Country name" class="form-control">
            </div>
            <div class="form-group">
               <label for="Logo">Company Logo</label>
               <input type="file" name="logo">
            </div>
            <div class="form-group">
               <button type="submit" class="btn btn-success">Submit</button>
            </div>
         </form>
      </div>
   </div>
</div>
<script>

//TODO: Trigger onChange event of Selectbox Company Owner type
// TODO: show/hide Persons and Companies select boxes based on the type of owner selected

</script>
@endsection

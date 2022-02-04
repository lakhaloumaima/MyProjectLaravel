@extends('layouts.app')

@section('content')

<div class="container" style="padding-top: 3%" >
    <form method="POST" action="{{route ('profile.update')}}">
        <div class="form-group">
          <label for="exampleFormControlInput1">Facebook </label>
          <input type="email" class="form-control" name="facebook" placeholder="facebook url">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Gender </label>
          <select class="form-control"  name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>

          </select>
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Bio</label>
          <textarea class="form-control" name="bio" rows="3"></textarea>
        </div>
        <div class="form-group">
           <button class="btn btn-success container" type="submit"> Save </button>
          </div>
      </form>

</div>



@endsection

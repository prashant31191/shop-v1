@extends('public.dashboard')
@section('title', 'Subscribe')

@section('content')        

    <h2>Subscribe to Our Newsletter</h2>
        
    <form method="POST" action="{{ route('subscribers.store') }}">
        @csrf

        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
      
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1"> GDPR </label>
        </div>
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
  
@endsection
            

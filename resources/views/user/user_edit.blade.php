@extends('layout')

@section('title','Theme Looks Test')

@section('content')
<section id="aa-myaccount">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger" style="margin-top: 15px;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
         <div class="aa-myaccount-area">
             <div class="row">
               <div class="col-md-9">
                 <div class="aa-myaccount-register">
                  <h4>Users Edit</h4>
                  <form action="{{ url('register/update/'.$user->id) }}" class="aa-login-form" method="post">
                    @csrf
                     <label for="">Username<span>*</span></label>
                     <input type="text" placeholder="Username" name="username" value="{{ $user->username }}" required>

                     <label for="">Email<span>*</span></label>
                     <input type="email" placeholder="Email" name="email" value="{{ $user->email }}" required>

                     <label for="">Date of Birth<span>*</span></label>
                     <input type="date" class="form-control" name="dob" value="{{ $user->dob }}" required style="margin-bottom:15px;">

                     <label for="">Country<span>*</span></label>
                     <input type="text" placeholder="Country" name="country" value="{{ $user->country }}" required>

                     <label for="">City<span>*</span></label>
                     <input type="text" placeholder="City" name="city" value="{{ $user->city }}" required>

                     <label for="">Status<span>*</span></label><br>
                     @if($user->status == 'active')
                        <input type="radio" name="status" value="active"  required checked> Active
                        <span style="margin-right: 45px;"></span>
                        <input type="radio" name="status" value="deactive" required> Deactive
                     @else
                        <input type="radio" name="status" value="active"  required> Active
                        <span style="margin-right: 45px;"></span>
                        <input type="radio" name="status" value="deactive" required checked> Deactive
                     @endif
                     <br>

                     <button type="submit" class="aa-browse-btn">Update</button>
                   </form>
                 </div>
               </div>
             </div>
          </div>
        </div>
      </div>
    </div>
</section>

@endsection

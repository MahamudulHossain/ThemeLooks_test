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
                  <h4>Register</h4>
                  <form action="{{ url('register/submit') }}" class="aa-login-form" method="post">
                    @csrf
                     <label for="">Username<span>*</span></label>
                     <input type="text" placeholder="Username" name="username" required>

                     <label for="">Email<span>*</span></label>
                     <input type="email" placeholder="Email" name="email" required>

                     <label for="">Password<span>*</span></label>
                     <input type="password" placeholder="Password" name="password" required>

                     <label for="">Date of Birth<span>*</span></label>
                     <input type="date" class="form-control" name="dob" required style="margin-bottom:15px;">

                     <label for="">Country<span>*</span></label>
                     <input type="text" placeholder="Country" name="country" required>

                     <label for="">City<span>*</span></label>
                     <input type="text" placeholder="City" name="city" required>

                     <label for="">Status<span>*</span></label><br>
                     <input type="radio" name="status" value="active"  required > Active
                     <span style="margin-right: 45px;"></span>
                     <input type="radio" name="status" value="deactive" required> Deactive
                     <br>

                     <button type="submit" class="aa-browse-btn">Register</button>
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

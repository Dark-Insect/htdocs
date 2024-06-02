@extends('layouts.global.dashboard')

@section('title', 'Create Member')

@section('content')
<main>
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }} <a href="{{ route('admin.member.index') }}">view members</a>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11">
                <br>
            <h5 style="text-align: center;">NEGROS WOMEN FOR TOMMORROW FOUNDATION, INC.</h5>
            <p style="text-align: center;">Project Dungganon</p>
                <div class="card shadow-lg border-0 rounded-lg mt-5 mb-5"> 
                    <div class="card-header">
                        <h3 class="text-center font-weight-light my-1">CLIENT INFORMATION SHEET</h3>
                        <br>
                        
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.member.store') }}" id="form_validate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group col-md-4" style="float: right; margin-right: -200px;">
                        <label for="photo">1x1 Picture <span style="color:red;">*</span></label>
                        <div id="preview" style="width: 100px; height: 100px; border: 1px solid #ccc; display: flex; justify-content: center; align-items: center;">
                            <span style="color: #999;"></span>
                        </div>
                        <input type="file" class="form-control" id="photo" name="photo" style="display: none;" accept="image/*">
                        <button type="button" class="btn btn-secondary btn-sm" onclick="document.getElementById('photo').click();">Upload Picture</button>
                        @error('photo')
                            <span class="invalid-feedback" role="alert" style="display: block !important">
                                <strong>Picture is required</strong>
                            </span>
                        @enderror
                    </div>

                    <script>
                        function readURL(input) {
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();

                                reader.onload = function (e) {
                                    $('#preview').css('background-image', 'url(' + e.target.result + ')');
                                    $('#preview').css('background-size', 'cover');
                                    $('#preview').css('background-position', 'center');
                                }

                                reader.readAsDataURL(input.files[0]); // convert to base64 string
                            }
                        }

                        $("#photo").change(function () {
                            readURL(this);
                        });
                    </script>
                    <br><br><br><br><br><br>
                    <div class="row mb-3">
                                <label style="font-weight: bold;" for="memberId">Member ID</label>
                                <div class="form-group col-md-4">
                                    <label for="memberId">Member ID <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="memberId" placeholder="Enter Member ID" name="memberId" required>
                                    @error('memberId')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Member ID is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <br>
                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan">PERSONAL INFORMATION</label>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Last name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="txt_last_name" placeholder="Enter Last name" name="txt_last_name" required>
                                    @error('txt_first_name')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Last name is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_type_loan">First name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="txt_first_name" placeholder="Enter First name" name="txt_first_name" required>
                                    @error('txt_first_name')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>First name is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Middle name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="txt_middle_name" placeholder="Enter Middle name" name="txt_middle_name" required>
                                    @error('txt_first_name')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Middle name is required</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="form-group col-md-4" style="width: 200px;">
                                  <label for="txt_type_loan">Date of Birth <span style="color:red;">*</span></label>
                                  <input type="date" class="form-control" id="dtr_date_of_birth" name="dtr_date_of_birth" required>
                                </div>
                                <div class="form-group mb-3" style="width: 380px;">
                                    <label for="txt_reason">Place of Birth <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="txt_place_of_birth" placeholder="Enter Place of Birth" name="txt_place_of_birth" required>
                                    @error('txt_place_of_birth')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Birthplace is required</strong>
                                        </span>
                                    @enderror
                            </div>
                                <div class="form-group col-md-4" style="width: 200px;">
                                  <label for="txt_date">Civil Status <span style="color:red;">*</span></label>
                                  <select class="form-select" name="civil_status">
                                    <option value="married">Married</option>
                                    <option value="separated">Separated</option>
                                    <option value="single">Single</option>
                                    <option value="widowed">Widow(er)</option>
                                    <option value="live_in">Live in</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-4" style="width: 170px;">
                                    <label for="txt_date">Gender <span style="color:red;">*</span></label>
                                    <select class="form-select" name="gender">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>
                           <hr>
                            <!-- <div class="row mb-3">
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Religion <span style="color:red;">*</span></label>
                                    <select class="form-select" name="religion">
                                        <option value="roman_catholic">Roman Catholic</option>
                                        <option value="islam" >Islam</option>
                                        <option value="iglesia_ni_Cristo">Iglesia ni Cristo (INC)</option>
                                        <option value="evangelical_christianity">Evangelical Christianity</option>
                                        <option value="seventh-day_adventist">Seventh-day Adventist</option>
                                    </select>
                                  </div> -->
                                  <div class="row mb-3">
                                <div class="form-group col-md-4">
                                    <label for="religion">Religion <span style="color:red;"></span></label>
                                    <input type="text" class="form-control" id="religion" placeholder="Religion" name="religion">
                                    @error('religion')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Religion is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_date">Educational Attainment <span style="color:red;">*</span></label>
                                  <select class="form-select" name="educational_attainment">
                                    <option value="elementary">Elementary</option>
                                    <option value="secondary">Secondary</option>
                                    <option value="vocational">Vocational</option>
                                    <option value="college undergrad">College Undergrad</option>
                                    <option value="college graduate">College Graduate</option>
                                  </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Contact No.<span style="color:red;"></span> </label>
                                    <input type="tel" class="form-control" id="txt_contact" placeholder="123-45-678" name="txt_contact" required>
                                    @error('txt_contact')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Contact No is required</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="form-group mb-3">
                                <label for="txt_reason"><strong>Present Address:</strong> <span style="color:red;">*</span></label>
                                <input type="text" class="form-control" id="txt_present_address" placeholder="Enter Present Address" name="txt_present_address">
                                @error('txt_present_address')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>Permanent address is required</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan">Permanent Address <span style="color:red;">*</span></label>
                                <div class="form-group col-md-4">
                                    <label for="txt_type_loan">Sitio/Prk/St <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="txt_permanent_st" placeholder="Enter Sitio/Prk/St" name="txt_permanent_st">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Barangay <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="txt_permanent_barangay" placeholder="Enter Barangay" name="txt_permanent_barangay" required>
                                    @error('txt_permanent_barangay')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Barangay is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">City/Municipality <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="txt_permanent_city" placeholder="Enter City/Municipality" name="txt_permanent_city" required>
                                    @error('txt_permanent_city')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>City/Municipality is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Province <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="txt_permanent_province" placeholder="Enter Province" name="txt_permanent_province" required>
                                    @error('txt_permanent_province')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Province is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">No. of  Years in the Community <span style="color:red;">*</span></label>
                                    <input type="number" class="form-control" id="txt_no_years" placeholder="Enter No of Years" name="txt_no_years" required>
                                    @error('txt_no_years')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>No of years is required</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan bold">Mother's Maiden Name (Name of mother when she was still single) <span style="color:red;">*</span></label>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Last name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="txt_m_last_name" placeholder="Enter Last name" name="txt_m_last_name" required>
                                    @error('txt_m_last_name')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Last name is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_type_loan">First name</label>
                                    <input type="text" class="form-control" id="txt_m_first_name" placeholder="Enter First name" name="txt_m_first_name" required>
                                    @error('txt_m_first_name')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>First name is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Middle name <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="txt_m_middle_name" placeholder="Enter Middle name" name="txt_m_middle_name" required>
                                    @error('txt_m_middle_name')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Middle name is required</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan fw-bold">OTHER INFORMATION<span style="color:red;">*</span></label>
                                <hr>
                                <label style="font-weight: bold;">Spouse</label>
                                <hr>
                                <div class="form-group col-md-4">
                                    <label for="txt_date">Last name <span style="color:red;"></span></label>
                                    <input type="text" class="form-control" id="txt_hs_last_name" placeholder="Enter Last name" name="txt_hs_last_name">
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_type_loan">First name <span style="color:red;"></span></label>
                                  <input type="text" class="form-control" id="txt_hs_first_name" placeholder="Enter First name" name="txt_hs_first_name" >
                                </div>
                                <div class="form-group col-md-4">
                                  <label for="txt_date">Middle name <span style="color:red;"></span></label>
                                  <input type="text" class="form-control" id="txt_hs_middle_name" placeholder="Enter Middle name" name="txt_hs_middle_name">
                                </div>
                               
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Extension (Suffix)</label>
                                    <input type="text" class="form-control" id="txt_hs_extention" placeholder="Enter Last name" name="txt_hs_extention">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Date of Birth <span style="color:red;">*</span></label>
                                    <input type="date" class="form-control" id="txt_hs_date_of_birth" placeholder="Enter Last name" name="txt_hs_date_of_birth">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="form-group col-md-6">
                                    <label for="txt_type_loan">Client's Present Source of income <span style="color:red;"></span></label>
                                    <input type="text" class="form-control" id="txt_client_source_income" placeholder="1." name="txt_client_source_income" required>
                                    <br>
                                    <input type="text" class="form-control" id="txt_client_source_income" placeholder="2." name="txt_client_source_income" required>
                                    @error('txt_client_source_income')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Client Source is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Husband's Present Source of income <span style="color:red;"></span></label>
                                    <input type="text" class="form-control" id="hs_present_source_of_income" placeholder="1." name="hs_present_source_of_income">
                                    <br>
                                    <input type="text" class="form-control" id="hs_present_source_of_income" placeholder="2." name="hs_present_source_of_income">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="txt_date">Total Family Income (weekly) <span style="color:red;">*</span></label>
                                    <input type="text" class="form-control" id="txt_total_family_income" placeholder="Enter Last name" name="txt_total_family_income" required>
                                    @error('txt_total_family_income')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Total income is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <!-- <div class="form-group col-md-6">
                                    <label for="txt_date">Total PPI Score</label>
                                    <input type="text" class="form-control" id="txt_total_ppi_score" placeholder="Enter Last name" name="txt_total_ppi_score" required>
                                    @error('txt_total_ppi_score')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Total PPI Score is required</strong>
                                        </span>
                                    @enderror
                                </div> -->
                            </div>

                            <div class="row mb-3">
                                <label style="font-weight: bold;" for="txt_type_loan">Email & Password <span style="color:red;"></span></label>
                                <div class="form-group col-md-4">
                                    <label for="txt_type_loan">Email <span style="color:red;"></span></label>
                                    <input type="email" class="form-control" id="txt_email" placeholder="Enter Email" name="txt_email" required>
                                    @error('txt_email')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>Email is required</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_password">Password <span style="color:red;">*</span></label>
                                    <input type="password" class="form-control" id="txt_password" placeholder="Enter Password" name="txt_password" required>
                                    @error('txt_password')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="txt_cpassword">Confirm Password <span style="color:red;">*</span></label>
                                    <input type="password" class="form-control" id="txt_cpassword" placeholder="Enter Confirm Password" name="txt_cpassword" required>
                                    @error('txt_cpassword')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" value="Create Account"></div>
                            </div>
                            {{-- <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" value="{{ old('txt-fname') }}" id="txt-fname" name="txt-fname" type="text" placeholder="Enter your first name" required/>
                                        <label for="inputFirstName">First name</label>
                                    </div>
                                    @error('txt-fname')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input class="form-control" value="{{ old('txt-lname') }}" id="txt-lname" name="txt-lname" type="text" placeholder="Enter your last name" required/>
                                        <label for="inputLastName">Last name</label>
                                    </div>
                                    @error('txt-lname')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="txt-email" value="{{ old('txt-email') }}" name="txt-email" type="email" placeholder="name@example.com" required/>
                                <label for="inputEmail">Email address</label>
                                @error('txt-email')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating mb-3">
                                <input class="form-control" id="txt-phone" value="{{ old('txt-phone') }}" name="txt-phone" type="text" placeholder="+63 123 931 1234" required/>
                                <label for="inputEmail">Phone</label>
                                @error('txt-phone')
                                    <span class="invalid-feedback" role="alert" style="display: block !important">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="txt-pass" name="txt-pass" type="password" placeholder="Create a password" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    @error('txt-pass')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input class="form-control" id="txt-cpass" name="txt-cpass" type="password" placeholder="Confirm password" />
                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                    </div>
                                    @error('txt-cpass')
                                        <span class="invalid-feedback" role="alert" style="display: block !important">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid"><input type="submit" class="btn btn-primary btn-block" value="Create Account"></div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
{{-- <script>
$(document).ready(function(){
  $('#form_validate').submit(function(event){
    event.preventDefault();
    if($('#txt_cpassword').val() != $('#txt_password').val()){
        alert("Password and Confirm Password do not match!");
    }
  })
});
</script> --}}
@endsection

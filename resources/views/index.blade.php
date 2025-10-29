@extends('layouts.app')
@section('content')
       
       <section class="search-job pt-100 " >
           <div class="container mt-5">
           
              <div class="row">
                   
                      <div class="col-md-8">
                            <form action="" method="GET" class="p-4 shadow rounded-3 row g-3 align-items-center">
                            
                            <!-- Search Input -->
                            <div class="col-md-4">
                              <input type="text" name="q" value="{{ request('q') }}" 
                                class="form-control form-control-sm" 
                                style="border: solid 1px #3AAB47;" 
                                placeholder="Search keywords"
                              >
                            </div>

                            <!-- Category -->
                            <div class="col-md-3">
                              <select name="category" class="form-select form-select-sm" style="height: auto;color: #212529;border: solid 1px #3AAB47;border-radius: 4px;">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                  <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                  </option>
                                @endforeach
                              </select>
                            </div>

                            <!-- Location -->
                            <div class="col-md-3">
                              <input type="text" name="location" value="{{ request('location') }}" 
                                class="form-control form-control-sm" 
                                style="border: solid 1px #3AAB47;"
                                placeholder="Location"
                              >
                            </div>

                            <!-- Submit Button -->
                            <div class="col-md-2 d-grid">
                              <button type="submit" class="btn btn-success btn-sm">
                                <i class="bi bi-search"></i> Search
                              </button>
                            </div>

                          </form>
                        
                      </div>
 
                      <div class="col-md-4">
                        

                      </div>

              </div>
           
           </div>
       </section>
      
        <!-- Category -->
        <section class="category-area ptb-100">
            <div class="container">

                
                <div class="row  justify-content-center">
                  @foreach($categories as $category)
                    <div class="col-sm-3 col-lg-3 category-border">
                        <div class="category-item">
                            <a href="blog.html">{{$category->name}} ({{$category->jobs_count}})</a>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </section>
        <!-- End Category -->

         <!-- Jobs -->
        <section class="job-area ptb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Browse Jobs</h2>
                </div>
                <div class="sorting-menu">
                    <ul> 
                        <li class="filter active" data-filter="all">All</li>
                        <!-- <li class="filter" data-filter=".job_type">New</li> -->
                        <!-- <li class="filter" data-filter=".ui">Featured</li> -->
                        <li class="filter" data-filter=".Internship">Internship</li>
                        <li class="filter" data-filter=".Full-time">Full Time</li>
                        <li class="filter" data-filter=".Part-time">Part Time</li>
                    </ul>
                </div>
                <div id="container">
                    <div class="row  justify-content-center">

                         @foreach($jobs as $job)
                        <div class="col-lg-6 mix web {{$job->job_type}}">

                       
                            <div class="job-item">
                                 
                               @if($job->employer && $job->employer->logo)
                                    <img src="{{ $job->company_logo }}" alt="Company Logo" width="60" height="60" class="rounded shadow-sm">
                                @else
                                    <img src="{{ $job->company_logo }}" alt="Default Logo" width="60" height="60" class="rounded shadow-sm">
                                @endif

                                <div class="job-inner align-items-center">
                                    <div class="job-inner-left">
                                        <h3>
                                            <a href="job-details.html">Post {{ $job->job_title }}</a>
                                        </h3>
                                        <a class="company" href="company-details.html">{{ $job->employer->company_name ?? 'N/A' }}</a>
                                        <ul>
                                            <li>
                                                <strong class="" style="color:#4CCE5B">Salary</strong> 
                                                    @if($job->salary_hidden)
                                                        Negotiable
                                                    @else
                                                        {{ $job->salary_range ?? 'Not Specified' }}
                                                    @endif
                                                                      
                                            </li>
                                            
                                        <li> 
                                            <strong style="color:#4CCE5B">Level:</strong> {{ ucfirst($job->job_level) }} 
                                      </li>

                                      <li>
                                                <i class="icofont-location-pin"></i>
                                               {{ $job->location ?? 'Remote' }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="job-inner-right">
                                        <ul>
                                            <li>
                                                <a href="create-account.html">Apply</a>
                                            </li>
                                            <li>
                                                <span>{{ ucfirst($job->job_type) }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                          
                        </div>
                         @endforeach
                    
                    </div>
                </div>
                <div class="job-pagination">
                    
                </div>
            </div>
        </section>
        <!-- End Jobs -->



        <!-- Portal -->
        <!-- <div class="portal-area pb-70">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-lg-6">
                        <div class="portal-item">
                            <div class="row  justify-content-center">
                                <div class="col-lg-7">
                                    <img src="assets/img/home-1/1.jpg" alt="Portal">
                                </div>
                                <div class="col-lg-5">
                                    <img src="assets/img/home-1/2.jpg" alt="Portal">
                                </div>
                            </div>
                            <div class="portal-trusted">
                                <span>100% Trusted</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="portal-item portal-right">
                            <h2>Trusted & Popular Job Portal</h2>
                            <p>Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur.</p>
                            <div class="common-btn">
                                <a class="login-btn" href="post-a-job.html">
                                    Post a Job
                                    <i class="icofont-swoosh-right"></i>
                                </a>
                                <a class="sign-up-btn" href="create-account.html">
                                    Apply Now
                                    <i class="icofont-swoosh-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- End Portal -->

        <!-- Account -->
        <div class="account-area account-area-two">
            <div class="container">
                <div class="row account-wrap">
                    <div class="col-sm-6 col-lg-4">
                        <div class="account-item">
                            <i class="flaticon-approved"></i>
                            <span>Register Your Account</span>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="account-item">
                            <i class="flaticon-cv"></i>
                            <span>Upload Your Resume</span>
                        </div>
                    </div>
                    <div class="col-sm-6   col-lg-4">
                        <div class="account-item account-last">
                            <i class="flaticon-customer-service"></i>
                            <span>Apply for Dream Job</span>
                        </div>
                    </div>
                </div>
                <div class="banner-btn">
                    <a href="create-account.html">Create Your Profile</a>
                    <a href="submit-resume.html">Upload Your CV</a>
                </div>
            </div>
        </div>
        <!-- End Account -->

       

        <!-- Counter -->
        <div class="counter-area pt-100 pb-70">
            <div class="container">
                <div class="row  justify-content-center">
                    <div class="col-6 col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <i class="flaticon-employee"></i>
                            <h3>
                                <span class="odometer" data-count="14">00</span>
                                <span class="target">k+</span>
                            </h3>
                            <p>Job Available</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <i class="flaticon-curriculum"></i>
                            <h3>
                                <span class="odometer" data-count="18">00</span>
                                <span class="target">k+</span>
                            </h3>
                            <p>CV Submitted</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <i class="flaticon-enterprise"></i>
                            <h3>
                                <span class="odometer" data-count="9">00</span>
                                <span class="target">k+</span>
                            </h3>
                            <p>Companies</p>
                        </div>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-3">
                        <div class="counter-item">
                            <i class="flaticon-businessman-paper-of-the-application-for-a-job"></i>
                            <h3>
                                <span class="odometer" data-count="35">00</span>
                                <span class="target">k+</span>
                            </h3>
                            <p>Appointed to Job</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Counter -->

        <!-- Companies -->
        <section class="companies-area ptb-100">
            <div class="container">
                <div class="section-title">
                    <h2>Popular Companies</h2>
                </div>
                <div class="companies-slider owl-theme owl-carousel">
                    <div class="companies-item">
                        <img src="assets/img/home-1/companies/1.png" alt="Companies">
                        <h3>
                            <a href="company-details.html">Winbrans.com</a>
                        </h3>
                        <p>
                            <i class="icofont-location-pin"></i>
                            Quadra, Street, Canada
                        </p>
                        <a class="companies-btn" href="create-account.html">Hiring</a>
                    </div>
                    <div class="companies-item">
                        <img src="assets/img/home-1/companies/2.png" alt="Companies">
                        <h3>
                            <a href="company-details.html">Infiniza.com</a>
                        </h3>
                        <p>
                            <i class="icofont-location-pin"></i>
                            North Street, California
                        </p>
                        <a class="companies-btn" href="create-account.html">Hiring</a>
                    </div>
                    <div class="companies-item">
                        <img src="assets/img/home-1/companies/3.png" alt="Companies">
                        <h3>
                            <a href="company-details.html">Glovibo.com</a>
                        </h3>
                        <p>
                            <i class="icofont-location-pin"></i>
                            Barming Road, UK
                        </p>
                        <a class="companies-btn" href="create-account.html">Hiring</a>
                    </div>
                    <div class="companies-item">
                        <img src="assets/img/home-1/companies/4.png" alt="Companies">
                        <h3>
                            <a href="company-details.html">Bizotic.com</a>
                        </h3>
                        <p>
                            <i class="icofont-location-pin"></i>
                            Washington, New York
                        </p>
                        <a class="companies-btn" href="create-account.html">Hiring</a>
                    </div>
                    <div class="companies-item">
                        <img src="assets/img/home-1/companies/1.png" alt="Companies">
                        <h3>
                            <a href="company-details.html">Winbrans.com</a>
                        </h3>
                        <p>
                            <i class="icofont-location-pin"></i>
                            Quadra, Street, Canada
                        </p>
                        <a class="companies-btn" href="create-account.html">Hiring</a>
                    </div>
                    <div class="companies-item">
                        <img src="assets/img/home-1/companies/2.png" alt="Companies">
                        <h3>
                            <a href="company-details.html">Infiniza.com</a>
                        </h3>
                        <p>
                            <i class="icofont-location-pin"></i>
                            North Street, California
                        </p>
                        <a class="companies-btn" href="create-account.html">Hiring</a>
                    </div>
                    <div class="companies-item">
                        <img src="assets/img/home-1/companies/3.png" alt="Companies">
                        <h3>
                            <a href="company-details.html">Glovibo.com</a>
                        </h3>
                        <p>
                            <i class="icofont-location-pin"></i>
                            Barming Road, UK
                        </p>
                        <a class="companies-btn" href="create-account.html">Hiring</a>
                    </div>
                    <div class="companies-item">
                        <img src="assets/img/home-1/companies/4.png" alt="Companies">
                        <h3>
                            <a href="company-details.html">Bizotic.com</a>
                        </h3>
                        <p>
                            <i class="icofont-location-pin"></i>
                            Washington, New York
                        </p>
                        <a class="companies-btn" href="create-account.html">Hiring</a>
                    </div>
                    <div class="companies-item">
                        <img src="assets/img/home-1/companies/1.png" alt="Companies">
                        <h3>
                            <a href="company-details.html">Winbrans.com</a>
                        </h3>
                        <p>
                            <i class="icofont-location-pin"></i>
                            Quadra, Street, Canada
                        </p>
                        <a class="companies-btn" href="create-account.html">Hiring</a>
                    </div>
                    <div class="companies-item">
                        <img src="assets/img/home-1/companies/2.png" alt="Companies">
                        <h3>
                            <a href="company-details.html">Infiniza.com</a>
                        </h3>
                        <p>
                            <i class="icofont-location-pin"></i>
                            North Street, California
                        </p>
                        <a class="companies-btn" href="create-account.html">Hiring</a>
                    </div>
                    <div class="companies-item">
                        <img src="assets/img/home-1/companies/3.png" alt="Companies">
                        <h3>
                            <a href="company-details.html">Glovibo.com</a>
                        </h3>
                        <p>
                            <i class="icofont-location-pin"></i>
                            Barming Road, UK
                        </p>
                        <a class="companies-btn" href="create-account.html">Hiring</a>
                    </div>
                    <div class="companies-item">
                        <img src="assets/img/home-1/companies/4.png" alt="Companies">
                        <h3>
                            <a href="company-details.html">Bizotic.com</a>
                        </h3>
                        <p>
                            <i class="icofont-location-pin"></i>
                            Washington, New York
                        </p>
                        <a class="companies-btn" href="create-account.html">Hiring</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Companies -->

       
@endsection
     

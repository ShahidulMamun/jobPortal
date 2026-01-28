@extends('layouts.app')
@section('content')


<style>
:root {
    --primary: #44BF53;
    --dark: #2f3e46;
    --light: #f6f9fc;
}



/* User Type Selection */
.user-type-container {
    display: flex;
    gap: 30px;
    flex-wrap: wrap;
    justify-content: center;
}

.card {
    background: #fff;
    width: 260px;
    padding: 30px;
    border-radius: 14px;
    text-align: center;
    cursor: pointer;
    transition: 0.3s;
    box-shadow: 0 12px 30px rgba(0,0,0,0.15);
}

.card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.2);
}

.card img {
    width: 80px;
}

.card h3 {
    margin-top: 15px;
    font-size: 22px;
    color: var(--dark);
}

.card p {
    font-size: 14px;
    color: #666;
    margin-top: 8px;
}

/* Modal */
.modal {
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.6);
    display: none;
    justify-content: center;
    align-items: center;
    padding: 15px;
}

.modal-content {
    background: #fff;
    width: 100%;
    max-width: 420px;
    padding: 25px;
    border-radius: 14px;
    animation: scaleUp 0.3s ease;
}

@keyframes scaleUp {
    from { transform: scale(0.85); opacity: 0; }
    to { transform: scale(1); opacity: 1; }
}

.modal h2 {
    text-align: center;
    margin-bottom: 20px;
    color: var(--primary);
}

/* Form */
.form-group {
    margin-bottom: 12px;
}

label {
    font-size: 14px;
    display: block;
    margin-bottom: 5px;
    color: #444;
}

input {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
}

input:focus {
    border-color: var(--primary);
    outline: none;
}

button {
    width: 100%;
    margin-top: 18px;
    padding: 12px;
    border: none;
    background: var(--primary);
    color: white;
    font-size: 16px;
    border-radius: 6px;
    cursor: pointer;
}

button:hover {
    background: #38a947;
}

.close {
    text-align: right;
    cursor: pointer;
    font-size: 18px;
    color: #888;
    margin-bottom: 5px;
}

/* Responsive */
@media (max-width: 768px) {
    .card {
        width: 100%;
        max-width: 320px;
    }

    .modal-content {
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .card h3 {
        font-size: 20px;
    }

    button {
        font-size: 15px;
    }
}
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>


 <section class="search-job pt-100 " >
           <div class="container mt-5">
           

        <!-- User Type Selection -->
        <div class="user-type-container" style="margin-bottom: 183px;">
            <div class="card" onclick="openModal('employer')">
                <img src="https://img.icons8.com/fluency/96/company.png"/>
                <h3>Employer</h3>
                <p>Post jobs & hire top talent</p>
            </div>

            <div class="card" onclick="openModal('candidate')">
                <img src="https://img.icons8.com/fluency/96/users.png"/>
                <h3>Candidate</h3>
                <p>Find jobs & grow your career</p>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="registerModal">
            <div class="modal-content">
                <div class="close" onclick="closeModal()">✖</div>
                <h2 id="modalTitle"></h2>

               <form method="POST" id="registerForm">
                    @csrf
                    <input type="hidden" name="user_type" id="userType">

                    <div class="form-group">
                        <label>Full Name</label>
                        <input id="name" type="text" name="name" value="{{ old('name') }}" autofocus autocomplete="name">

                            @error('name')
                                <div style="color:red; margin-top:5px;">
                                    {{ $message }}
                                </div>
                            @enderror
                                            
                    </div>

                    <div class="form-group">
                        <label>Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"  autocomplete="username">
                         @error('email')
                            <div style="color:red; margin-top:5px;">
                                {{ $message }}
                            </div>
                         @enderror
             
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                         <input id="password" type="password" name="password" value="{{ old('Password') }}"  autocomplete="new-password">
                          @error('password')
                            <div style="color:red; margin-top:5px;">
                                {{ $message }}
                            </div>
                          @enderror
                                 
                    </div>
                     <div class="form-group">
                        <label>Confirm Password</label>
                         <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('Confirm Password') }}"  autocomplete="new-password">
                          @error('password_confirmation')
                            <div style="color:red; margin-top:5px;">
                                {{ $message }}
                            </div>
                          @enderror
                    </div>

                    <!-- Employer -->
                    <div id="employerFields" style="display:none;">
                        <div class="form-group">
                            <label>Company Name</label>
                              <input id="company_name" type="text" name="company_name" value="{{ old('company_name') }}"  autocomplete="company_name">
                          @error('company_name')
                            <div style="color:red; margin-top:5px;">
                                {{ $message }}
                            </div>
                          @enderror
                        </div>
                    </div>


                    <button type="submit">Create Account</button>
                </form>
            </div>
        </div>
 </div>
</section>
@include('partials.toast')

<!-- scripts for modal open -->
<script>
function openModal(type) {
    document.getElementById('registerModal').style.display = 'flex';

    let form = document.getElementById('registerForm');

    if (type === 'employer') {
        form.action = "{{ route('employer.register.store') }}";
        document.getElementById('modalTitle').innerText = 'Employer Registration';
        document.getElementById('employerFields').style.display = 'block';
    } else {
        form.action = "{{ route('register') }}";
        document.getElementById('modalTitle').innerText = 'User Registration';
        document.getElementById('employerFields').style.display = 'none';
    }
}

function closeModal() {
    document.getElementById('registerModal').style.display = 'none';
}
</script>

<!-- scripts for data store -->

<script>
let registerForm = document.getElementById('registerForm');

registerForm.addEventListener('submit', function (e) {
    e.preventDefault();

    let formData = new FormData(registerForm);

    fetch(registerForm.action, {
        method: "POST",
        headers: {
            'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
        },
        body: formData
    })
    .then(async response => {
        let data = await response.json();

        if (!response.ok) {
            if (data.errors) {
                Object.values(data.errors).forEach(errArr => {
                    Toast.fire({
                        icon: 'error',
                        title: errArr[0]
                    });
                });
            }
            throw new Error('Validation failed');
        }

        return data;
    })
    .then(data => {
            sessionStorage.setItem('success_message', data.message);
            window.location.href = data.redirect
    })
    .catch(() => {});
});
</script>



@endsection
     
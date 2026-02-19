
<style>
    .form-wrapper {
        /* max-width: 960px; */
        margin: 0 auto;
    }

    .form-section {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        margin-bottom: 25px;
        overflow: hidden;
    }

    .form-section-header {
        background: linear-gradient(135deg, #2c4964, #3d6b8f);
        color: #fff;
        padding: 18px 25px;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .form-section-header i {
        width: 36px; height: 36px;
        background: rgba(255,196,81,0.2);
        border-radius: 8px;
        display: flex; align-items: center; justify-content: center;
        color: #ffc451;
        font-size: 16px;
        flex-shrink: 0;
    }

    .form-section-header h3 {
        font-size: 16px;
        font-weight: 700;
        margin: 0;
    }

    .form-section-header p {
        font-size: 12px;
        color: rgba(255,255,255,0.7);
        margin: 2px 0 0;
    }

    .form-section-body {
        padding: 25px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 20px;
    }

    .form-row.col-3 {
        grid-template-columns: 1fr 1fr 1fr;
    }

    .form-row.col-1 {
        grid-template-columns: 1fr;
    }

    .form-group {
        display: flex;
        flex-direction: column;
    }

    .form-group label {
        font-size: 13px;
        font-weight: 600;
        color: #444;
        margin-bottom: 7px;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .form-group label .required {
        color: #e74c3c;
        font-size: 14px;
    }

    .form-group label .optional {
        font-size: 11px;
        color: #aaa;
        font-weight: 400;
    }

    .form-control {
        padding: 11px 15px;
        border: 1.5px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        color: #444;
        transition: all 0.2s;
        font-family: inherit;
        background: #fff;
    }

    .form-control:focus {
        outline: none;
        border-color: #ffc451;
        box-shadow: 0 0 0 3px rgba(255,196,81,0.15);
    }

    .form-control.is-invalid {
        border-color: #e74c3c;
        box-shadow: 0 0 0 3px rgba(231,76,60,0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .invalid-feedback {
        font-size: 12px;
        color: #e74c3c;
        margin-top: 5px;
    }

    /* Toggle Switch */
    .toggle-group {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 15px;
        border: 1.5px solid #e0e0e0;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
    }

    .toggle-group:hover {
        border-color: #ffc451;
        background: #fffdf5;
    }

    .toggle-switch {
        position: relative;
        width: 44px;
        height: 24px;
        flex-shrink: 0;
    }

    .toggle-switch input {
        opacity: 0;
        width: 0; height: 0;
    }

    .toggle-slider {
        position: absolute;
        inset: 0;
        background: #ccc;
        border-radius: 24px;
        cursor: pointer;
        transition: 0.3s;
    }

    .toggle-slider::before {
        content: '';
        position: absolute;
        width: 18px; height: 18px;
        left: 3px; top: 3px;
        background: #fff;
        border-radius: 50%;
        transition: 0.3s;
    }

    .toggle-switch input:checked + .toggle-slider {
        background: #ffc451;
    }

    .toggle-switch input:checked + .toggle-slider::before {
        transform: translateX(20px);
    }

    .toggle-label {
        font-size: 14px;
        font-weight: 600;
        color: #444;
    }

    .toggle-sub {
        font-size: 12px;
        color: #aaa;
        margin-top: 2px;
    }

    /* Tag Input */
    .tag-input-wrapper {
        border: 1.5px solid #e0e0e0;
        border-radius: 8px;
        padding: 8px 10px;
        display: flex;
        flex-wrap: wrap;
        gap: 6px;
        min-height: 48px;
        cursor: text;
        transition: all 0.2s;
    }

    .tag-input-wrapper:focus-within {
        border-color: #ffc451;
        box-shadow: 0 0 0 3px rgba(255,196,81,0.15);
    }

    .tag-chip {
        background: #2c4964;
        color: #fff;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .tag-chip span {
        cursor: pointer;
        font-size: 14px;
        line-height: 1;
        opacity: 0.7;
    }

    .tag-chip span:hover { opacity: 1; }

    .tag-input {
        border: none;
        outline: none;
        font-size: 14px;
        min-width: 120px;
        flex: 1;
        font-family: inherit;
        color: #444;
    }

    /* Image Upload */
    .upload-area {
        border: 2px dashed #e0e0e0;
        border-radius: 10px;
        padding: 25px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s;
        position: relative;
    }

    .upload-area:hover {
        border-color: #ffc451;
        background: #fffdf5;
    }

    .upload-area input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        width: 100%;
        height: 100%;
    }

    .upload-area i {
        font-size: 36px;
        color: #ffc451;
        display: block;
        margin-bottom: 10px;
    }

    .upload-area p {
        font-size: 14px;
        color: #888;
        margin: 0;
    }

    .upload-area .upload-hint {
        font-size: 12px;
        color: #aaa;
        margin-top: 5px;
    }

    /* Logo Preview */
    .logo-preview {
        display: none;
        align-items: center;
        gap: 15px;
        padding: 12px 15px;
        border: 1.5px solid #e0e0e0;
        border-radius: 8px;
        margin-top: 10px;
    }

    .logo-preview img {
        width: 60px; height: 60px;
        object-fit: contain;
        border-radius: 8px;
        border: 1px solid #eee;
    }

    .logo-preview .remove-logo {
        margin-left: auto;
        color: #e74c3c;
        cursor: pointer;
        font-size: 18px;
    }

    /* Submit Bar */
    .submit-bar {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        padding: 20px 25px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        position: sticky;
        bottom: 20px;
        z-index: 50;
    }

    .submit-bar-left {
        font-size: 13px;
        color: #888;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .submit-bar-left i { color: #ffc451; }

    .submit-bar-right { display: flex; gap: 12px; }

    .btn {
        padding: 12px 28px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        border: none;
        font-family: inherit;
        transition: all 0.2s;
    }

    .btn-primary {
        background: #2c4964;
        color: #fff;
    }

    .btn-primary:hover {
        background: #ffc451;
        color: #2c4964;
        transform: translateY(-2px);
    }

    .btn-secondary {
        background: #f4f6f9;
        color: #444;
    }

    .btn-secondary:hover { background: #e9ecef; }

    .btn-draft {
        background: transparent;
        border: 2px solid #2c4964;
        color: #2c4964;
    }

    .btn-draft:hover {
        background: #2c4964;
        color: #fff;
    }

    .section-divider {
        border: none;
        border-top: 1px solid #f0f0f0;
        margin: 20px 0;
    }

    .hint-text {
        font-size: 12px;
        color: #aaa;
        margin-top: 5px;
    }

    @media (max-width: 768px) {
        .form-row,
        .form-row.col-3 {
            grid-template-columns: 1fr;
        }

        .submit-bar {
            flex-direction: column;
            align-items: stretch;
        }

        .submit-bar-right {
            flex-direction: column;
        }
    }
</style>


<div class="tab-panel" id="tab-postjob">
    <div class="card">
        <div class="card-header">
              <h3 style="color:#2c4964; margin-bottom:5px;">
                            <i class="fas fa-plus-circle" style="color:#ffc451; margin-right:8px;"></i>Post a New Job
                        </h3>
                        <p style="color:#f10101; font-size:14px;">Fill in the details below to publish your job.</p>
        </div>
        <div class="card-body">
           <div class="form-wrapper">


                {{-- Error Summary --}}
                @if ($errors->any())
                    <div style="background:#fce4ec; border:1px solid #e74c3c; border-radius:10px; padding:15px 20px; margin-bottom:25px; color:#c62828;">
                        <strong><i class="fas fa-exclamation-circle"></i> Please fix the following errors:</strong>
                        <ul style="margin:10px 0 0 20px;">
                            @foreach ($errors->all() as $error)
                                <li style="font-size:13px; margin-top:5px;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('employer.job.store') }}" method="POST"
                      enctype="multipart/form-data" id="jobPostForm">
                    @csrf

                    {{-- ══════════════════════════════════════
                        SECTION 1 — Basic Information
                    ══════════════════════════════════════ --}}
                    <div class="form-section">
                        <div class="form-section-header">
                            <i class="fas fa-info-circle"></i>
                            <div>
                                <h3>Basic Information</h3>
                                <p>Job title, code, company details</p>
                            </div>
                        </div>
                        <div class="form-section-body">

                            <div class="form-row col-3">
                                {{-- Job Title --}}
                                <div class="form-group">
                                    <label>
                                        Job Title <span class="required">*</span>
                                    </label>
                                    <input type="text" name="job_title"
                                          class="form-control @error('job_title') is-invalid @enderror"
                                          value="{{ old('job_title') }}"
                                          placeholder="e.g. Senior Frontend Developer">
                                    @error('job_title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                 {{-- Company Name --}}
                                <div class="form-group">
                                    <label>Company Name</label>
                                    <input type="text" name="company_name"
                                          class="form-control @error('company_name') is-invalid @enderror"
                                          value="{{ old('company_name', auth()->user()->company_name ?? '') }}"
                                          placeholder="Your company name">
                                    @error('company_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                 {{-- Job Language --}}
                                <div class="form-group">
                                    <label>Job Language</label>
                                    <select name="job_language"
                                            class="form-control @error('job_language') is-invalid @enderror">
                                        <option value="en" {{ old('job_language', 'en') == 'en' ? 'selected' : '' }}>English</option>
                                        <option value="bn" {{ old('job_language') == 'bn' ? 'selected' : '' }}>Bengali</option>
                                    </select>
                                    @error('job_language')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                        </div>
                    </div>

                    {{-- ══════════════════════════════════════
                        SECTION 2 — Job Details
                    ══════════════════════════════════════ --}}
                    <div class="form-section">
                        <div class="form-section-header">
                            <i class="fas fa-briefcase"></i>
                            <div>
                                <h3>Job Details</h3>
                                <p>Type, category, level, vacancy</p>
                            </div>
                        </div>
                        <div class="form-section-body">

                            <div class="form-row col-3">
                                {{-- Job Type --}}
                                <div class="form-group">
                                    <label>Job Type <span class="required">*</span></label>
                                    <select name="job_type"
                                            class="form-control @error('job_type') is-invalid @enderror">
                                        <option value="">-- Select Type --</option>
                                        <option value="full-time"  {{ old('job_type') == 'full-time'  ? 'selected' : '' }}>Full Time</option>
                                        <option value="part-time"  {{ old('job_type') == 'part-time'  ? 'selected' : '' }}>Part Time</option>
                                        <option value="contract"   {{ old('job_type') == 'contract'   ? 'selected' : '' }}>Contract</option>
                                        <option value="internship" {{ old('job_type') == 'internship' ? 'selected' : '' }}>Internship</option>
                                    </select>
                                    @error('job_type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Category --}}
                                <div class="form-group">
                                    <label>Category <span class="required">*</span></label>
                                    <select name="category_id"
                                            class="form-control @error('category_id') is-invalid @enderror">
                                          <?php $categories = App\Models\Category::all()?>
                                        <option value="">-- Select Category --</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}"
                                                {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                                {{ $cat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Job Level --}}
                                <div class="form-group">
                                    <label>Job Level</label>
                                    <select name="job_level"
                                            class="form-control @error('job_level') is-invalid @enderror">
                                        <option value="">-- Select Level --</option>
                                        <option value="Entry"  {{ old('job_level') == 'Entry'  ? 'selected' : '' }}>Entry Level</option>
                                        <option value="Mid"    {{ old('job_level') == 'Mid'    ? 'selected' : '' }}>Mid Level</option>
                                        <option value="Senior" {{ old('job_level') == 'Senior' ? 'selected' : '' }}>Senior Level</option>
                                        <option value="Lead"   {{ old('job_level') == 'Lead'   ? 'selected' : '' }}>Team Lead</option>
                                        <option value="Manager"{{ old('job_level') == 'Manager'? 'selected' : '' }}>Manager</option>
                                    </select>
                                    @error('job_level')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row col-3">
                                {{-- Vacancy --}}
                                <div class="form-group">
                                    <label>No. of Vacancy</label>
                                    <input type="number" name="vacancy" min="1"
                                          class="form-control @error('vacancy') is-invalid @enderror"
                                          value="{{ old('vacancy') }}"
                                          placeholder="e.g. 3">
                                    @error('vacancy')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Gender --}}
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select name="gender"
                                            class="form-control @error('gender') is-invalid @enderror">
                                        <option value="Any"    {{ old('gender', 'Any') == 'Any'    ? 'selected' : '' }}>Any</option>
                                        <option value="Male"   {{ old('gender') == 'Male'   ? 'selected' : '' }}>Male</option>
                                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Age Limit --}}
                                <div class="form-group">
                                    <label>Age Limit <span class="optional">(optional)</span></label>
                                    <input type="text" name="age_limit"
                                          class="form-control @error('age_limit') is-invalid @enderror"
                                          value="{{ old('age_limit') }}"
                                          placeholder="e.g. 18-35">
                                    @error('age_limit')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- ══════════════════════════════════════
                        SECTION 3 — Location & Salary
                    ══════════════════════════════════════ --}}
                    <div class="form-section">
                        <div class="form-section-header">
                            <i class="fas fa-map-marker-alt"></i>
                            <div>
                                <h3>Location & Salary</h3>
                                <p>Work location and compensation details</p>
                            </div>
                        </div>
                        <div class="form-section-body">

                            <div class="form-row">
                                {{-- Location --}}
                                <div class="form-group">
                                    <label>Location</label>
                                    <input type="text" name="location"
                                          class="form-control @error('location') is-invalid @enderror"
                                          value="{{ old('location') }}"
                                          placeholder="e.g. Dhaka, Bangladesh">
                                    @error('location')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Salary Range --}}
                                <div class="form-group">
                                    <label>Salary Range</label>
                                    <input type="text" name="salary_range"
                                          class="form-control @error('salary_range') is-invalid @enderror"
                                          value="{{ old('salary_range') }}"
                                          placeholder="e.g. $3,000 - $5,000 / month">
                                    @error('salary_range')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                {{-- Remote Available Toggle --}}
                                <div class="form-group">
                                    <label>Remote Work</label>
                                    <label class="toggle-group">
                                        <div class="toggle-switch">
                                            <input type="hidden" name="remote_available" value="0">
                                            <input type="checkbox" name="remote_available" value="1"
                                                  id="remoteToggle"
                                                  {{ old('remote_available') ? 'checked' : '' }}>
                                            <span class="toggle-slider"></span>
                                        </div>
                                        <div>
                                            <div class="toggle-label">Remote Work Available</div>
                                            <div class="toggle-sub">Candidates can work from anywhere</div>
                                        </div>
                                    </label>
                                </div>

                                {{-- Salary Hidden Toggle --}}
                                <div class="form-group">
                                    <label>Salary Visibility</label>
                                    <label class="toggle-group">
                                        <div class="toggle-switch">
                                            <input type="hidden" name="salary_hidden" value="0">
                                            <input type="checkbox" name="salary_hidden" value="1"
                                                  id="salaryHiddenToggle"
                                                  {{ old('salary_hidden') ? 'checked' : '' }}>
                                            <span class="toggle-slider"></span>
                                        </div>
                                        <div>
                                            <div class="toggle-label">Hide Salary</div>
                                            <div class="toggle-sub">Salary will not be shown to candidates</div>
                                        </div>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- ══════════════════════════════════════
                        SECTION 4 — Deadline
                    ══════════════════════════════════════ --}}
                    <div class="form-section">
                        <div class="form-section-header">
                            <i class="fas fa-calendar-alt"></i>
                            <div>
                                <h3>Application Deadline</h3>
                                <p>Set the closing date for applications</p>
                            </div>
                        </div>
                        <div class="form-section-body">
                            <div class="form-row">
                                {{-- Deadline Date --}}
                                <div class="form-group">
                                    <label>Deadline Date</label>
                                    <input type="date" name="deadline"
                                          class="form-control @error('deadline') is-invalid @enderror"
                                          value="{{ old('deadline') }}"
                                          min="{{ date('Y-m-d') }}">
                                    @error('deadline')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Deadline Time --}}
                                <div class="form-group">
                                    <label>Deadline Time <span class="optional">(optional)</span></label>
                                    <input type="time" name="application_deadline_time"
                                          class="form-control @error('application_deadline_time') is-invalid @enderror"
                                          value="{{ old('application_deadline_time') }}">
                                    @error('application_deadline_time')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════
                        SECTION 5 — Job Description
                    ══════════════════════════════════════ --}}
                    <div class="form-section">
                        <div class="form-section-header">
                            <i class="fas fa-align-left"></i>
                            <div>
                                <h3>Job Description</h3>
                                <p>Detailed description of the role</p>
                            </div>
                        </div>
                        <div class="form-section-body">

                            {{-- Description --}}
                            <div class="form-group" style="margin-bottom:20px;">
                                <label>Job Description <span class="required">*</span></label>
                                <textarea name="description" rows="6"
                                          class="form-control @error('description') is-invalid @enderror"
                                          placeholder="Write a detailed description of the job role...">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Responsibilities --}}
                            <div class="form-group" style="margin-bottom:20px;">
                                <label>Responsibilities</label>
                                <textarea name="responsibilities" rows="5"
                                          class="form-control @error('responsibilities') is-invalid @enderror"
                                          placeholder="List key responsibilities (one per line or bullet points)...">{{ old('responsibilities') }}</textarea>
                                @error('responsibilities')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Requirements --}}
                            <div class="form-group" style="margin-bottom:20px;">
                                <label>Requirements</label>
                                <textarea name="requirements" rows="5"
                                          class="form-control @error('requirements') is-invalid @enderror"
                                          placeholder="List the job requirements...">{{ old('requirements') }}</textarea>
                                @error('requirements')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <hr class="section-divider">

                            <div class="form-row">
                                {{-- Education Requirements --}}
                                <div class="form-group">
                                    <label>Education Requirements</label>
                                    <textarea name="education_requirements" rows="4"
                                              class="form-control @error('education_requirements') is-invalid @enderror"
                                              placeholder="e.g. Bachelor's degree in Computer Science...">{{ old('education_requirements') }}</textarea>
                                    @error('education_requirements')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Experience Requirements --}}
                                <div class="form-group">
                                    <label>Experience Requirements</label>
                                    <textarea name="experience_requirements" rows="4"
                                              class="form-control @error('experience_requirements') is-invalid @enderror"
                                              placeholder="e.g. 3+ years of experience in React...">{{ old('experience_requirements') }}</textarea>
                                    @error('experience_requirements')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Job Benefits --}}
                            <div class="form-group">
                                <label>Job Benefits</label>
                                <textarea name="job_benefits" rows="4"
                                          class="form-control @error('job_benefits') is-invalid @enderror"
                                          placeholder="e.g. Health insurance, annual bonus, flexible hours...">{{ old('job_benefits') }}</textarea>
                                @error('job_benefits')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    {{-- ══════════════════════════════════════
                        SECTION 6 — Skills & Tags
                    ══════════════════════════════════════ --}}
                    <div class="form-section">
                        <div class="form-section-header">
                            <i class="fas fa-tags"></i>
                            <div>
                                <h3>Skills & Tags</h3>
                                <p>Help candidates find your job listing</p>
                            </div>
                        </div>
                        <div class="form-section-body">

                            <div class="form-row">
                                {{-- Skills --}}
                                <div class="form-group">
                                    <label>Required Skills</label>
                                    <div class="tag-input-wrapper" id="skillsWrapper" onclick="document.getElementById('skillInput').focus()">
                                        <input type="hidden" name="skills" id="skillsHidden" value="{{ old('skills') }}">
                                        <input type="text" id="skillInput" class="tag-input"
                                              placeholder="Type skill & press Enter">
                                    </div>
                                    <span class="hint-text">Press Enter or comma to add a skill</span>
                                    @error('skills')
                                        <div class="invalid-feedback" style="display:block;">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Tags --}}
                                <div class="form-group">
                                    <label>Tags <span class="optional">(SEO / filtering)</span></label>
                                    <div class="tag-input-wrapper" id="tagsWrapper" onclick="document.getElementById('tagInput').focus()">
                                        <input type="hidden" name="tags" id="tagsHidden" value="{{ old('tags') }}">
                                        <input type="text" id="tagInput" class="tag-input"
                                              placeholder="Type tag & press Enter">
                                    </div>
                                    <span class="hint-text">Press Enter or comma to add a tag</span>
                                    @error('tags')
                                        <div class="invalid-feedback" style="display:block;">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- ══════════════════════════════════════
                        SECTION 7 — Application Method
                    ══════════════════════════════════════ --}}
                    <div class="form-section">
                        <div class="form-section-header">
                            <i class="fas fa-paper-plane"></i>
                            <div>
                                <h3>Application Method</h3>
                                <p>How candidates should apply</p>
                            </div>
                        </div>
                        <div class="form-section-body">

                            <div class="form-row">
                                {{-- Application Email --}}
                                <div class="form-group">
                                    <label>Application Email</label>
                                    <input type="email" name="application_email"
                                          class="form-control @error('application_email') is-invalid @enderror"
                                          value="{{ old('application_email') }}"
                                          placeholder="hr@yourcompany.com">
                                    @error('application_email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Application Link --}}
                                <div class="form-group">
                                    <label>External Application Link <span class="optional">(optional)</span></label>
                                    <input type="url" name="application_link"
                                          class="form-control @error('application_link') is-invalid @enderror"
                                          value="{{ old('application_link') }}"
                                          placeholder="https://yourcompany.com/careers/apply">
                                    @error('application_link')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Apply Instruction --}}
                            <div class="form-group">
                                <label>Apply Instructions <span class="optional">(optional)</span></label>
                                <textarea name="apply_instruction" rows="4"
                                          class="form-control @error('apply_instruction') is-invalid @enderror"
                                          placeholder="Special instructions for applicants...">{{ old('apply_instruction') }}</textarea>
                                @error('apply_instruction')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                    </div>

                    {{-- ══════════════════════════════════════
                        SECTION 8 — Visibility Settings
                    ══════════════════════════════════════ --}}
                    <div class="form-section">
                        <div class="form-section-header">
                            <i class="fas fa-eye"></i>
                            <div>
                                <h3>Visibility & Status</h3>
                                <p>Control how this job appears publicly</p>
                            </div>
                        </div>
                        <div class="form-section-body">
                            <div class="form-row col-3">

                                {{-- Is Featured --}}
                                <div class="form-group">
                                    <label>Featured Job</label>
                                    <label class="toggle-group">
                                        <div class="toggle-switch">
                                            <input type="hidden" name="is_featured" value="0">
                                            <input type="checkbox" name="is_featured" value="1"
                                                  {{ old('is_featured') ? 'checked' : '' }}>
                                            <span class="toggle-slider"></span>
                                        </div>
                                        <div>
                                            <div class="toggle-label">Mark as Featured</div>
                                            <div class="toggle-sub">Highlighted on homepage</div>
                                        </div>
                                    </label>
                                </div>

                                {{-- Status --}}
                                <div class="form-group">
                                    <label>Publication Status</label>
                                    <label class="toggle-group">
                                        <div class="toggle-switch">
                                            <input type="hidden" name="status" value="0">
                                            <input type="checkbox" name="status" value="1"
                                                  {{ old('status', true) ? 'checked' : '' }}>
                                            <span class="toggle-slider"></span>
                                        </div>
                                        <div>
                                            <div class="toggle-label">Publish Job</div>
                                            <div class="toggle-sub">Uncheck to save as draft</div>
                                        </div>
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    {{-- ══════════════════════════════════════
                        SUBMIT BAR
                    ══════════════════════════════════════ --}}
                    <div class="submit-bar">
                        <div class="submit-bar-left">
                            <i class="fas fa-info-circle"></i>
                            Fields marked with <span style="color:#e74c3c;font-weight:700;margin:0 3px;">*</span> are required.
                        </div>
                        <div class="submit-bar-right">
                            <a href="{{ route('employer.jobs.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Cancel
                            </a>
                            <button type="submit" name="action" value="draft" class="btn btn-draft">
                                <i class="fas fa-save"></i> Save as Draft
                            </button>
                            <button type="submit" name="action" value="publish" class="btn btn-primary">
                                <i class="fas fa-paper-plane"></i> Post Job
                            </button>
                        </div>
                    </div>

                </form>
            </div>   
        </div>
    </div>
</div>



<script>
    // ── Logo Preview ──
    function previewLogo(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('logoPreviewImg').src = e.target.result;
                document.getElementById('logoFileName').textContent = input.files[0].name;
                document.getElementById('logoPreview').style.display = 'flex';
                document.getElementById('logoUploadArea').style.display = 'none';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function removeLogo() {
        document.getElementById('companyLogoInput').value = '';
        document.getElementById('logoPreview').style.display = 'none';
        document.getElementById('logoUploadArea').style.display = 'block';
    }

    // ── Tag Input (Skills & Tags) ──
    function initTagInput(inputId, wrapperId, hiddenId) {
        var input   = document.getElementById(inputId);
        var wrapper = document.getElementById(wrapperId);
        var hidden  = document.getElementById(hiddenId);
        var tags    = [];

        // Load old values
        if (hidden.value) {
            hidden.value.split(',').forEach(function(t) {
                t = t.trim();
                if (t) addTag(t);
            });
        }

        function addTag(val) {
            val = val.trim().replace(/,/g, '');
            if (!val || tags.includes(val)) return;
            tags.push(val);

            var chip = document.createElement('div');
            chip.className = 'tag-chip';
            chip.innerHTML = val + ' <span onclick="removeTag(this, \'' + hiddenId + '\')">×</span>';
            chip.setAttribute('data-tag', val);
            wrapper.insertBefore(chip, input);
            hidden.value = tags.join(',');
            input.value = '';
        }

        input.addEventListener('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ',') {
                e.preventDefault();
                addTag(input.value);
            }
            if (e.key === 'Backspace' && input.value === '' && tags.length) {
                var last = wrapper.querySelectorAll('.tag-chip');
                if (last.length) {
                    var lastTag = last[last.length - 1].getAttribute('data-tag');
                    tags = tags.filter(function(t) { return t !== lastTag; });
                    last[last.length - 1].remove();
                    hidden.value = tags.join(',');
                }
            }
        });

        input.addEventListener('blur', function() {
            if (input.value.trim()) addTag(input.value);
        });
    }

    function removeTag(el, hiddenId) {
        var chip   = el.parentElement;
        var tag    = chip.getAttribute('data-tag');
        var hidden = document.getElementById(hiddenId);
        var tags   = hidden.value.split(',').filter(function(t) { return t.trim() !== tag; });
        hidden.value = tags.join(',');
        chip.remove();
    }

    // Init tag inputs
    initTagInput('skillInput', 'skillsWrapper', 'skillsHidden');
    initTagInput('tagInput',   'tagsWrapper',   'tagsHidden');
</script>
@include('partials.toast')
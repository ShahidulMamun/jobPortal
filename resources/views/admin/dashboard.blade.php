@extends('admin.layouts.app')

@section('title', 'ড্যাশবোর্ড')
@section('page-title', 'ড্যাশবোর্ড')
@section('page-subtitle', 'স্বাগতম, ' . Auth::guard('admin')->user()->name . ' — আজকের সামারি দেখুন')

@section('content')

    <div class="row g-3 mb-4">
        <div class="col-md-3 col-sm-6">
            <div class="card-soft p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                         style="width:44px;height:44px;background:var(--mint-soft);color:#0c6d64;">
                        <i class="fa-solid fa-briefcase"></i>
                    </div>
                    <div>
                        <div class="mono fs-5 fw-semibold">{{ $activeJobsCount ?? 0 }}</div>
                        <div class="text-muted" style="font-size:.8rem;">অ্যাক্টিভ জবস</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card-soft p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                         style="width:44px;height:44px;background:var(--gold-soft);color:#5c4200;">
                        <i class="fa-solid fa-hourglass-half"></i>
                    </div>
                    <div>
                        <div class="mono fs-5 fw-semibold">{{ $pendingJobsCount ?? 0 }}</div>
                        <div class="text-muted" style="font-size:.8rem;">পেন্ডিং জবস</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card-soft p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                         style="width:44px;height:44px;background:#e9ecef;color:#495057;">
                        <i class="fa-solid fa-users"></i>
                    </div>
                    <div>
                        <div class="mono fs-5 fw-semibold">{{ $totalUsersCount ?? 0 }}</div>
                        <div class="text-muted" style="font-size:.8rem;">টোটাল ইউজার</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card-soft p-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center"
                         style="width:44px;height:44px;background:#fde8e8;color:#a12222;">
                        <i class="fa-solid fa-trash"></i>
                    </div>
                    <div>
                        <div class="mono fs-5 fw-semibold">{{ $trashedJobsCount ?? 0 }}</div>
                        <div class="text-muted" style="font-size:.8rem;">ট্র্যাশ করা জবস</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card-soft p-4">
        <h5 class="mb-3">সাম্প্রতিক অ্যাক্টিভিটি</h5>
        <p class="text-muted mb-0" style="font-size:.9rem;">
            এখানে সাম্প্রতিক জব পোস্ট, ইউজার রেজিস্ট্রেশন বা অন্যান্য অ্যাক্টিভিটি লগ দেখানো যাবে।
            কন্ট্রোলার থেকে ডেটা পাস করলে এই সেকশনে টেবিল/লিস্ট বসানো যাবে।
        </p>
    </div>

@endsection
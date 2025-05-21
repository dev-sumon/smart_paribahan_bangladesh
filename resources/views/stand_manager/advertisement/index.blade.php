@extends('stand_manager.layouts.master')
@section('title', 'Advertisement')
@section('content')
    <div class="tab-pane fade" id="advertisements-section">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div>
                <h1 class="h2">বিজ্ঞাপন ম্যানেজমেন্ট</h1>
                <p class="text-muted">বিজ্ঞাপন তৈরি, সম্পাদনা এবং ম্যানেজ করুন</p>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAdvertisementModal">
                <i class="bi bi-plus"></i> নতুন বিজ্ঞাপন
            </button>
        </div>

        <!-- Filter Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">বিজ্ঞাপন অনুসন্ধান</h5>
                <small class="text-muted">বিজ্ঞাপন খুঁজতে অনুসন্ধান ব্যবহার করুন</small>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">স্ট্যাটাস</label>
                        <select class="form-select">
                            <option selected>সকল</option>
                            <option>সক্রিয়</option>
                            <option>সমাপ্ত</option>
                            <option>অপেক্ষমান</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">ধরন</label>
                        <select class="form-select">
                            <option selected>সকল</option>
                            <option>ব্যানার</option>
                            <option>পপ-আপ</option>
                            <option>স্লাইডার</option>
                            <option>সাইডবার</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">অনুসন্ধান</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="শিরোনাম দিয়ে অনুসন্ধান করুন...">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Advertisements Table -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">বিজ্ঞাপন তালিকা</h5>
                <small class="text-muted">সকল বিজ্ঞাপনের তালিকা দেখুন এবং ম্যানেজ করুন</small>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>আইডি</th>
                                <th>শিরোনাম</th>
                                <th>ধরন</th>
                                <th>সময়কাল</th>
                                <th>স্ট্যাটাস</th>
                                <th class="text-end">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>১</td>
                                <td>নতুন পণ্য প্রচার</td>
                                <td>ব্যানার</td>
                                <td>
                                    <div class="small">
                                        <div><i class="bi bi-calendar me-1"></i> ১০ মে, ২০২৫ থেকে
                                        </div>
                                        <div><i class="bi bi-calendar me-1"></i> ২০ মে, ২০২৫ পর্যন্ত
                                        </div>
                                    </div>
                                </td>
                                <td><span class="status-badge status-active">সক্রিয়</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-secondary action-btn" title="দেখুন">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary action-btn" title="সম্পাদনা">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger action-btn" title="মুছুন">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>২</td>
                                <td>সাপ্তাহিক অফার</td>
                                <td>পপ-আপ</td>
                                <td>
                                    <div class="small">
                                        <div><i class="bi bi-calendar me-1"></i> ১২ মে, ২০২৫ থেকে
                                        </div>
                                        <div><i class="bi bi-calendar me-1"></i> ১৯ মে, ২০২৫ পর্যন্ত
                                        </div>
                                    </div>
                                </td>
                                <td><span class="status-badge status-active">সক্রিয়</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-secondary action-btn" title="দেখুন">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary action-btn" title="সম্পাদনা">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger action-btn" title="মুছুন">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>৩</td>
                                <td>ঈদ উৎসব অফার</td>
                                <td>স্লাইডার</td>
                                <td>
                                    <div class="small">
                                        <div><i class="bi bi-calendar me-1"></i> ০১ মে, ২০২৫ থেকে
                                        </div>
                                        <div><i class="bi bi-calendar me-1"></i> ১৫ মে, ২০২৫ পর্যন্ত
                                        </div>
                                    </div>
                                </td>
                                <td><span class="status-badge status-active">সক্রিয়</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-secondary action-btn" title="দেখুন">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary action-btn" title="সম্পাদনা">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger action-btn" title="মুছুন">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>৪</td>
                                <td>বিশেষ ছাড়</td>
                                <td>সাইডবার</td>
                                <td>
                                    <div class="small">
                                        <div><i class="bi bi-calendar me-1"></i> ০৫ মে, ২০২৫ থেকে
                                        </div>
                                        <div><i class="bi bi-calendar me-1"></i> ১৫ মে, ২০২৫ পর্যন্ত
                                        </div>
                                    </div>
                                </td>
                                <td><span class="status-badge status-active">সক্রিয়</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-secondary action-btn" title="দেখুন">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary action-btn" title="সম্পাদনা">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger action-btn" title="মুছুন">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>৫</td>
                                <td>গ্রীষ্মকালীন অফার</td>
                                <td>ব্যানার</td>
                                <td>
                                    <div class="small">
                                        <div><i class="bi bi-calendar me-1"></i> ০১ এপ্রিল, ২০২৫
                                            থেকে</div>
                                        <div><i class="bi bi-calendar me-1"></i> ০১ মে, ২০২৫ পর্যন্ত
                                        </div>
                                    </div>
                                </td>
                                <td><span class="status-badge status-expired">সমাপ্ত</span></td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-outline-secondary action-btn" title="দেখুন">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-secondary action-btn" title="সম্পাদনা">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger action-btn" title="মুছুন">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div class="text-muted small">মোট ৫টি বিজ্ঞাপনের মধ্যে ১-৫ দেখানো হচ্ছে</div>
                    <nav>
                        <ul class="pagination pagination-sm mb-0">
                            <li class="page-item disabled"><a class="page-link" href="#">আগের</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">১</a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">পরের</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection

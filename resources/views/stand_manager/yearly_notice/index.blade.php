@extends('stand_manager.layouts.master')
@section('title', 'title')
@section('content')
    <div class="tab-pane fade" id="yearly-notices-section">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <div>
                <h1 class="h2">বার্ষিক নোটিশ ম্যানেজমেন্ট</h1>
                <p class="text-muted">বার্ষিক নোটিশ তৈরি, সম্পাদনা এবং ম্যানেজ করুন</p>
            </div>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addYearlyNoticeModal">
                <i class="bi bi-plus"></i> নতুন বার্ষিক নোটিশ
            </button>
        </div>

        <!-- Filter Card -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">বার্ষিক নোটিশ অনুসন্ধান</h5>
                <small class="text-muted">বার্ষিক নোটিশ খুঁজতে অনুসন্ধান ব্যবহার করুন</small>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">বছর</label>
                        <select class="form-select">
                            <option selected>সকল</option>
                            <option>২০২৫</option>
                            <option>২০২৪</option>
                            <option>২০২৩</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">তারিখ</label>
                        <input type="date" class="form-control">
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

        <!-- Yearly Notices Table -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">বার্ষিক নোটিশ তালিকা</h5>
                <small class="text-muted">সকল বার্ষিক নোটিশের তালিকা দেখুন এবং ম্যানেজ করুন</small>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>আইডি</th>
                                <th>শিরোনাম</th>
                                <th>বছর</th>
                                <th>তারিখ</th>
                                <th>লেখক</th>
                                <th class="text-end">অ্যাকশন</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>১</td>
                                <td>বার্ষিক ছুটির তালিকা ২০২৫</td>
                                <td><span class="status-badge year-badge">২০২৫</span></td>
                                <td><i class="bi bi-calendar me-1"></i> ০১ জানুয়ারি, ২০২৫</td>
                                <td>মোঃ আবদুল করিম</td>
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
                                <td>বার্ষিক বাজেট ঘোষণা</td>
                                <td><span class="status-badge year-badge">২০২৫</span></td>
                                <td><i class="bi bi-calendar me-1"></i> ১৫ জানুয়ারি, ২০২৫</td>
                                <td>মোঃ আবদুল করিম</td>
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
                                <td>বার্ষিক পরিকল্পনা</td>
                                <td><span class="status-badge year-badge">২০২৫</span></td>
                                <td><i class="bi bi-calendar me-1"></i> ০১ ফেব্রুয়ারি, ২০২৫</td>
                                <td>মোঃ আবদুল করিম</td>
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
                                <td>বার্ষিক ছুটির তালিকা ২০২৪</td>
                                <td><span class="status-badge year-badge">২০২৪</span></td>
                                <td><i class="bi bi-calendar me-1"></i> ০১ জানুয়ারি, ২০২৪</td>
                                <td>মোঃ আবদুল করিম</td>
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
                                <td>বার্ষিক বাজেট ঘোষণা</td>
                                <td><span class="status-badge year-badge">২০২৪</span></td>
                                <td><i class="bi bi-calendar me-1"></i> ১৫ জানুয়ারি, ২০২৪</td>
                                <td>মোঃ আবদুল করিম</td>
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
                    <div class="text-muted small">মোট ৫টি বার্ষিক নোটিশের মধ্যে ১-৫ দেখানো হচ্ছে
                    </div>
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

@extends('field_worker.layouts.master', ['page_slug'=>'dashboard'])
@section('title', 'Field Worker Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-muted">আজকের সিরিয়াল</h6>
                            <h2 class="mb-0">১২</h2>
                            <small class="text-success"><i class="bi bi-arrow-up"></i> গতকাল
                                থেকে +২ বৃদ্ধি</small>
                        </div>
                        <div class="bg-light p-3 rounded">
                            <i class="bi bi-calendar-check text-primary fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-muted">সক্রিয় বিজ্ঞাপন</h6>
                            <h2 class="mb-0">৮</h2>
                            <small class="text-success"><i class="bi bi-arrow-up"></i> গত
                                সপ্তাহে +৩ বৃদ্ধি</small>
                        </div>
                        <div class="bg-light p-3 rounded">
                            <i class="bi bi-badge-ad text-danger fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-muted">নোটিশ</h6>
                            <h2 class="mb-0">৫</h2>
                            <small class="text-success"><i class="bi bi-arrow-up"></i> এই মাসে
                                +২ বৃদ্ধি</small>
                        </div>
                        <div class="bg-light p-3 rounded">
                            <i class="bi bi-bell text-warning fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="card-title text-muted">বার্ষিক নোটিশ</h6>
                            <h2 class="mb-0">৩</h2>
                            <small class="text-success"><i class="bi bi-arrow-up"></i> এই বছরে
                                +১ বৃদ্ধি</small>
                        </div>
                        <div class="bg-light p-3 rounded">
                            <i class="bi bi-calendar-event text-info fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">আজকের সিরিয়াল</h5>
                    <small class="text-muted">আজকের সিরিয়ালের তালিকা দেখুন</small>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <div
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">সিরিয়াল #১</h6>
                                <small>সকাল ১০:০০</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="status-badge status-pending me-2">অপেক্ষমান</span>
                                <button class="btn btn-sm btn-outline-primary">বিস্তারিত</button>
                            </div>
                        </div>
                        <div
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">সিরিয়াল #২</h6>
                                <small>দুপুর ১২:০০</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="status-badge status-completed me-2">সম্পন্ন</span>
                                <button class="btn btn-sm btn-outline-primary">বিস্তারিত</button>
                            </div>
                        </div>
                        <div
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">সিরিয়াল #৩</h6>
                                <small>দুপুর ০১:০০</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="status-badge status-ongoing me-2">চলমান</span>
                                <button class="btn btn-sm btn-outline-primary">বিস্তারিত</button>
                            </div>
                        </div>
                        <div
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">সিরিয়াল #৪</h6>
                                <small>বিকাল ০৩:০০</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="status-badge status-pending me-2">অপেক্ষমান</span>
                                <button class="btn btn-sm btn-outline-primary">বিস্তারিত</button>
                            </div>
                        </div>
                        <div
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="mb-1">সিরিয়াল #৫</h6>
                                <small>বিকাল ০৪:০০</small>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="status-badge status-pending me-2">অপেক্ষমান</span>
                                <button class="btn btn-sm btn-outline-primary">বিস্তারিত</button>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 mt-3">সকল সিরিয়াল দেখুন</button>
                </div>
            </div>
        </div>
        <div class="col-lg-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">সাম্প্রতিক নোটিশ</h5>
                    <small class="text-muted">সর্বশেষ নোটিশগুলি দেখুন</small>
                </div>
                <div class="card-body">
                    <div class="list-group">
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1">জরুরি নোটিশ</h6>
                                <small>আজ</small>
                            </div>
                            <p class="mb-1 small">আগামীকাল অফিস বন্ধ থাকবে। সকল সিরিয়াল পরবর্তী
                                দিনে স্থানান্তর করা হবে।</p>
                        </div>
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1">সাধারণ নোটিশ</h6>
                                <small>গতকাল</small>
                            </div>
                            <p class="mb-1 small">নতুন বিজ্ঞাপন নীতিমালা প্রকাশিত হয়েছে। সকল
                                ব্যবহারকারীকে অবহিত করা হচ্ছে।</p>
                        </div>
                        <div class="list-group-item list-group-item-action">
                            <div class="d-flex justify-content-between">
                                <h6 class="mb-1">তথ্যমূলক নোটিশ</h6>
                                <small>৩ দিন আগে</small>
                            </div>
                            <p class="mb-1 small">সিস্টেম আপডেট হবে আগামী সপ্তাহে। সময়সূচি
                                শীঘ্রই জানানো হবে।</p>
                        </div>
                    </div>
                    <button class="btn btn-primary w-100 mt-3">সকল নোটিশ দেখুন</button>
                </div>
            </div>
        </div>
    </div>
@endsection

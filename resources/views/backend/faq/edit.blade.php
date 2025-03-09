@extends('backend.layouts.master', ['page_slug' => 'faq'])


@section('title', 'Admin - management')
@section('content')
    <div class="container-fluid mt-2">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span class="float-left card-title">
                            <h4>{{ __('FAQ Update') }}</h4>
                        </span>
                        <span class="float-right">
                            <a href="{{ route('faq.index') }}" class="btn btn-info">{{ __('Back') }}</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10 m-auto">
                                <form action="{{ route('faq.update', $faq->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="question">{{ __('Question') }} <span class="text-danger">*</span></label>
                                        <input type="question" class="form-control" id="question" placeholder="Enter The Question" name="question" value="{{ old('question') ?? $faq->question }}">
                                        @if($errors->has('question'))
                                            <div class="text-danger">{{ $errors->first('question') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="answer" class="mt-3">{{ __('Answer') }} <span class="text-danger">*</span></label>
                                        <input type="answer" name="answer" value="{{ old('answer') ?? $faq->answer }}" class="form-control" placeholder="Enter The Answer">
                                        @if($errors->has('answer'))
                                            <div class="text-danger">{{ $errors->first('answer') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="status">{{ __('Status') }}  <span class="text-danger">*</span></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{( old('status') ?? $faq->status) == 1 ? 'selected' : '' }}>{{ __('Active') }}</option>
                                            <option value="0" {{ (old('status') ?? $faq->status) == 0 ? 'selected' : '' }}>{{ __('Deactive') }}</option>
                                        </select>
                                        @if($errors->has('status'))
                                            <div class="text-danger">{{ $errors->first('status') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success w-100 submitBtn">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@extends('forntend.layouts.master')

@push('css')
    <style>
        body, html {
        margin: 0;
        padding: 0;
        height: 90%;
        background-color: #f5f5f5;
        }
        .container {
        height: 100%;
        position: relative;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="chat-widget">
        <div class="chat-header" onclick="toggleChatBox()">
            <i class="fa-solid fa-phone-volume"></i> {{ __('সরাসরি কথা বলুন') }}
        </div>
        <div class="chat-box" id="chatBox">
            <div class="close-btn" onclick="toggleChatBox()">&times;</div>
            <div class="header"><i class="fa-solid fa-hands-clapping"></i>
            <br>
            {{ __('যেকোনো জিজ্ঞাসায় সরাসরি') }}<br>{{ __('আমাদের সাথে') }}
            </div>
            <div class="options">
            <button class="live-chat"><i class="fa-regular fa-comment-dots"></i> {{ __('লাইভ চ্যাট করুন') }}</button>
            <button class="whatsapp"><i class="fa-brands fa-whatsapp"></i> {{ __('WhatsApp-মেসেজ করুন') }}</button>
            <button class="call"><i class="fa-solid fa-phone-volume"></i> {{ __('কল করুন') }}<br>{{ __('01777 000000 নম্বরে') }}</button>
            </div>
        </div>
        <div class="floating-btn" onclick="toggleChatBox()">
            <i class="fa fa-chevron-up"></i>
        </div>
        </div>
    </div>
@endsection
@push('script')
<script>
    function toggleChatBox() {
      const chatBox = document.getElementById('chatBox');
      chatBox.style.display = chatBox.style.display === 'flex' ? 'none' : 'flex';
    }
  </script>
@endpush
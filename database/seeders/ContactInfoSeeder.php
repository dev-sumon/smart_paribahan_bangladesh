<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactInfo::create([
            'title' => 'যোগাযোগ করুন',
            'description' => 'আপনার যেকোনো প্রশ্ন বা পরামর্শের জন্য আমাদের সাথে সরাসরি যোগাযোগ করতে পারেন। আমরা আপনাকে সেরা সেবা দেওয়ার জন্য সবসময় প্রস্তুত। নির্দিষ্ট প্রয়োজনের জন্য আমাদের হটলাইন নম্বরে ফোন করুন অথবা ইমেইলের মাধ্যমে আপনার বার্তা পাঠান।',
            'address' => 'Section -11, Block -A ( Main road), Plot-5 (beside shopno super shop), Pallabi, Dhaka-1221',
            'phone' => '012345467890',
            'optional_number' => '012345467890',
            'email' => 'bangladeshsmartparibahan@gmail.com',
            'status' => 1,
        ]);
    }
}

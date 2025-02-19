@extends('admin.layouts.app')

@section('breadcrumb')
    <div class="flex justify-between items-center">
        <x-breadcrumb pageone="Student Details" />

    </div>
@endsection

@section('content')
<div class=" mx-auto bg-white rounded-lg border border-gray-300 shadow-lg overflow-hidden">
    <div class="bg-gradient-to-r from-blue-500 to-purple-600 p-6 text-white text-center">
        <h2 class="text-3xl font-bold">Student Details</h2>
        <p class="mt-2">Personal Information</p>
    </div>
    <div class="p-6">
        <div class="space-y-4">
            <!-- Name -->
            <div class="flex items-center">
                <span class="text-gray-700 font-medium w-28">Full Name:</span>
                <span class="text-gray-800">{{$student->fname}} {{$student->lname}}</span>
            </div>
            <!-- Email -->
            <div class="flex items-center">
                <span class="text-gray-700 font-medium w-28">Email:</span>
                <span class="text-gray-800">{{$student->email}}</span>
            </div>
            <!-- Date of Birth -->
            <div class="flex items-center">
                <span class="text-gray-700 font-medium w-28">Phone:</span>
                <span class="text-gray-800">{{$student->phone}}</span>
            </div>
            <!-- Phone -->
            <div class="flex items-center">
                <span class="text-gray-700 font-medium w-28">Address:</span>
                <span class="text-gray-800">{{$student->address}}</span>
            </div>
            <div class="flex items-center">
                <span class="text-gray-700 font-medium w-28">Course:</span>
                <span class="text-gray-800">{{$student->course}}</span>
            </div>
            <!-- Address -->
            <div class="flex items-start">
                <span class="text-gray-700 font-medium w-28">Refered by:</span>
                <span class="text-gray-800">{{$student->refered_by}}</span>
            </div>
        </div>
    </div>
    <div class="bg-gray-100 p-4 text-start">
        <a href="{{ route('student.list') }}"
        class="py-2 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-blue-600 text-white shadow-sm hover:bg-blue-700 text-sm">
        Back to List
    </a>
    </div>
</div>

@endsection

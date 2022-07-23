@extends('layouts.sidebar')
@section("name","Organisation")
@section('items')
<li class="sidebar-menu-item @if(Request::route()->getName()==="organisation.dashboard") active @endif">
    <a class="sidebar-menu-button" href="{{route("organisation.dashboard")}}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">dashboard</span>
        <span class="sidebar-menu-text">Dashboard</span>
    </a>
</li>
<li class="sidebar-menu-item @if(Request::route()->getName()==="organisation.profile") active @endif">
    <a class="sidebar-menu-button" href="{{route("organisation.profile")}}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">perm_contact_calendar</span>
        <span class="sidebar-menu-text">Profile</span>
    </a>
</li>
<li class="sidebar-menu-item @if(Request::route()->getName()==="user.resume") active @endif">
    <a class="sidebar-menu-button" href="{{route("user.resume")}}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">perm_contact_calendar</span>
        <span class="sidebar-menu-text">Resume</span>
    </a>
</li>
<li class="sidebar-menu-item @if(Request::route()->getName()==="user.chats") active @endif">
    <a class="sidebar-menu-button" href="{{route("user.chats")}}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">comment</span>
        <span class="sidebar-menu-text">Messages</span>
    </a>
</li>
<li class="sidebar-menu-item @if(Request::route()->getName()==="user.questions") active @endif">
    <a class="sidebar-menu-button" href="{{route("user.questions")}}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">help_center</span>
        <span class="sidebar-menu-text">Questionair Form</span>
    </a>
</li>
<li class="sidebar-menu-item @if(Request::route()->getName()==="organisation.mentees") active @endif">
    <a class="sidebar-menu-button" href="{{route("organisation.mentees")}}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">people</span>
        <span class="sidebar-menu-text">Mentee</span>
    </a>
</li>
<li class="sidebar-menu-item @if(Request::route()->getName()==="organisation.mentors") active @endif">
    <a class="sidebar-menu-button" href="{{route("organisation.mentors")}}">
        <span class="material-icons sidebar-menu-icon sidebar-menu-icon--left">people</span>
        <span class="sidebar-menu-text">Mentor</span>
    </a>
</li>
@endsection
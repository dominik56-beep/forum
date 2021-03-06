

@extends('layouts.home')

@section('content')

@if ( $user )

    <div class="d-flex main-section justify-content-center p-3 pt-5">
        <div class="main-section__element flex-column d-flex gap-3 mt-3 w-50">
            <div class="d-flex flex-column justify-content-center align-items-center fs-5 w-100 gap-3">
                <div class="profile-page-avatar-wrapper border border-3 d-flex justify-content-center align-items-center rounded-circle overflow-hidden">

                    @if ($user->avatar)
                        <img src="{{ asset($user->avatar) }}" class="profile-page-avatar d-block" alt="profile avatar">
                    @else
                        <img src="{{ asset($avatar) }}" class="profile-page-avatar d-block" alt="profile avatar">
                    @endif

                </div>
                <div class="d-flex flex-row gap-3">
                    <h3> {{ $user->name }} </h3>

                    @can ('userUpdate', $user )
                        <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="btn btn-success">Edit profile</a>
                    @endcan

                </div>
            </div>
            <div class="d-flex justify-content-between"></div>
            <div class="d-flex justify-content-center fs-5 w-100 gap-3">
                <ul class="nav nav-pills nav-fill">
                    <li class="nav-item">
                        <a
                            class="nav-link @if($userPostedResourcesName == 'threads') active @endif"
                            href="{{ route('user.get', ['id' => $user->id, 'data-to-display' => 'threads']) }}"
                        >
                            Threads posted
                        </a>
                    </li>
                    <li class="nav-item">
                        <a
                            class="nav-link @if($userPostedResourcesName == 'comments') active @endif"
                            href="{{ route('user.get', ['id' => $user->id, 'data-to-display' => 'comments']) }}"
                        >
                            Comments posted
                        </a>
                    </li>
                </ul>
            </div>
            <div class="d-flex flex-column w-100 gap-5 mt-4">

                @if($userPostedResourcesName == 'threads')

                    @foreach ($userPostedResources as $topic)
                        <x-topic :topic="$topic" :displayVisitButton="true" :displayHeader="true"/>
                    @endforeach

                @elseif($userPostedResourcesName == 'comments')

                    @foreach ($userPostedResources as $comment)
                        <div class="d-flex justify-content-between align-items-center fs-5 w-100 gap-3 mt-5">
                            <a
                                class="btn btn-primary"
                                href="{{ route('topic.get', ['id' => $comment->topic->id]) }}"
                            >
                                Visit
                            </a>
                            <h3>
                                {{  $comment->topic->name }}
                            </h3>
                        </div>
                        <x-topic-comment :comment="$comment"/>
                    @endforeach

                @endif

            </div>
        </div>
    </div>

@else

    <x-not-found-alert/>

@endif


@endsection

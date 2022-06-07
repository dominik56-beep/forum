<div class="card shadow">
    <div class="d-flex card-header justify-content-between flex-row gap-3 align-items-center">

        <a href="{{ route('profile', ['id' => $topic->user->id]) }}" class="m-0 p-0 text-decoration-none">
            {{ $topic->user->name }}
        </a>
        <p class="m-0 p-0"> {{ $readableDate }}</p>
    </div>
    <div class="card-body">
        <h5 class="card-title">{{ $topic->name }}</h5>
        <p class="card-text">{{ $topic->text }}</p>
        <a href="{{ route('topic.get', ['id' => $topic->id]) }}" class="btn btn-primary">
            Visit
        </a>
    </div>
</div>
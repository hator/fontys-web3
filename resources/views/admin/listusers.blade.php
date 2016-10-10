@foreach ($users as $user)
  <div class="user">
    <h3 class="name">{{ $user->name }}</h3>
    <a href="/profile/{{$user->id}}" class="btn btn-default" role="button">Show profile</a>
    <a href="/profile/{{$user->id}}/edit" class="btn btn-info" role="button">Edit</a>
  </div>
@endforeach
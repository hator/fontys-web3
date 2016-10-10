@foreach ($users as $user)
  <div class="user">
    <h3 class="name">{{ $user->name }}</h3>;
  </div>
@endforeach

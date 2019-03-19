<form action="{{route('post.create')}}" method="POST">
  @csrf
  <input type="text" name="title">
  <textarea name="content"></textarea>
  <button>Save</button>
</form>
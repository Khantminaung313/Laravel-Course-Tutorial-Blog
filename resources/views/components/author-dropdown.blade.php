<div class="dropdown">
    <button class="btn btn-outline-info dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
      {{isset($currentAuthor) ? $currentAuthor->name : "Filter By Author"}}
    </button>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="/">All</a></li>
      @foreach ($authors as $author)
      <li><a class="dropdown-item" href="/?author={{$author->username}}">{{$author->name}}</a></li>
      @endforeach
    </ul>
  </div>
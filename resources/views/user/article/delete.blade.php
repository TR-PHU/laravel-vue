<form action="{{ route('userArticle.destroy', ['article' => $article]) }}" method="POST" style="display:inline-block">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-primary">Remove</button>
</form>
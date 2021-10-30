<option value="{{ $category->id }}"> {{ $text }} {{ $category->name }}</option>
@if($category->children)
    @foreach($category->children as $childrenCategory)
        @include(
            'user.article.category_select_item',
            [
                'category' => $childrenCategory,
                'text' => '----'.$text
            ])
    @endforeach`
@endif
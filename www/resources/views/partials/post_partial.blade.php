@if ($loop->first)
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Category</th>
                <th scope="col">Body</th>
                <th scope="col">Tags</th>
                <th scope="col">Date of creation</th>
                <th class="col-1" scope="col"></th>
            </tr>
        </thead>
@endif
    <tbody>
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->user->name }}<br><br><button onclick="location.href='{{ route('posts_of_an_author', $post->user_id) }}'" type="submit" class="btn btn-danger btn-sm" name="button">View</button></td>
            <td>{{ $post->category->title }}<br><br><button onclick="location.href='{{ route('posts_of_a_category', $post->category_id ) }}'" type="submit" class="btn btn-danger btn-sm" name="button">View</button></td>
            <td>{{ $post->body }}</td>
            <td><ul class="list-group">@foreach($post->tags as $tag)
                <li class="list-group-item"><a class="text-danger" href="{{ route('posts_of_a_tag', $tag->title) }}">{{ $tag->title }}</a></li>
            @endforeach</ul></td>
            <td>{{ date("F jS, Y", strtotime($post->created_at)) }}<br><br>{{ $post->created_at->diffforhumans() }}</td>
            <td class="col-1 text-center">
                <button onclick="location.href='{{ route('posts_of_an_author_and_a_category', [$post->user->id, $post->category->id]) }}'" type="submit" class="btn btn-danger btn-sm" name="button">View all posts filtered by this author and category</button><br><br>
                <button onclick="location.href='{{ route('posts_of_an_author_and_a_category_and_a_tag', [$post->user->id, $post->category->id, $tag->id]) }}'" type="submit" class="btn btn-danger btn-sm" name="button">View all posts filtered by this author and category and the last tag showen in table</button><br><br>
                <button onclick="location.href='{{ route('update_a_post', $post) }}'" type="submit" class="btn btn-danger btn-sm" name="button">Update</button><br><br>
                <button onclick="location.href='{{ route('delete_a_post', $post) }}'" type="submit" class="btn btn-danger btn-sm" name="button">Delete</button><br><br>
            </td>
        </tr>
    </tbody>
@if ($loop->last)
    </table>
@endif

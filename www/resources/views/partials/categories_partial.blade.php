@if ($loop->first)
    <table class="table table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Date of creation</th>
                <th scope="col"></th>
            </tr>
        </thead>
@endif
    <tbody>
        <tr>
            <td>{{ $category->id }}</td>
            <td>{{ $category->title }}</td>
            <td>{{ $category->slug }}</td>
            <td>{{ date("F jS, Y", strtotime($category->created_at)) }}<br><br>{{ $category->created_at->diffforhumans() }}</td>
            <td class="col-1 text-center">
                <button onclick="location.href='{{ route('update_a_category', $category) }}'" type="submit" class="btn btn-danger btn-sm" name="button">Update</button><br><br>
                <button onclick="location.href='{{ route('delete_a_category', $category) }}'" type="submit" class="btn btn-danger btn-sm" name="button">Delete</button><br><br>
            </td>
        </tr>
    </tbody>
@if ($loop->last)
    </table>
@endif

<table>
    <thead>
    <tr>
        <th>Job Title</th>
        <th>Type</th>
        <th>City</th>
        <th>Salary Range</th>
        <th>Status</th>
        <th>Deadline</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>

     @foreach ($jobs as $job)
    <tr>
        <td>{{$job->title}}</td>
        <td>{{ $job->type }}</td>
        <td>{{ $job->city }}</td>
        <td>{{ $job->salary_range }}</td>
        <td>{{ $job->status }}</td>
        <td>{{ $job->deadline }}</td>
        <td>
            <a href="{{route('jobs.edit', $job->id)}}" class="edit-btn">Edit</a>
        </td>
    </tr>
    <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete Job</button>
    </form>

     @endforeach
    </tbody>
</table>

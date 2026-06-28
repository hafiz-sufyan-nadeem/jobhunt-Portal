<div class="container">
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Company</th>
            <th>Status</th>
        </tr>
        </thead>

        <tbody>
        @foreach($jobs as $job)
        <tr>
            <td>{{ $job->title }}</td>
            <td>{{ $job->employer->company_name }}</td>
            <td>{{ $job->status }}</td>

            <form action="{{route('admin.jobs.approve', $job->id)}}" method="POST" class="d-inline">
                @csrf
                @method('patch')
                <button type="submit" class="btn btn-success btn-sm">Approve</button>
            </form>

            <form action="{{route('admin.jobs.reject',$job->id)}}" method="POST" class="d-inline">
                @csrf
                @method('patch')
                <button type="submit" class="btn btn-danger btn-sm">Reject</button>
            </form>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

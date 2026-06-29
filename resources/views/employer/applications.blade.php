<div class="container">
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Title</th>
            <th>Status</th>
        </tr>
        </thead>

        <tbody>
        @foreach($applications as $application)
            <tr>
                <td>{{ $application->candidate->user->name }}</td>
                <td>{{ $application->job->title}}</td>
                <td>{{ $application->status }}</td>

                <form action="{{route('employer.application.status', $application->id)}}" method="POST" class="d-inline">
                    <input type="hidden" name="status" value="reviewed">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-success btn-sm">Reviewed</button>
                </form>

                <form action="{{route('employer.application.status', $application->id)}}" method="POST" class="d-inline">
                    <input type="hidden" name="status" value="hired">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-danger btn-sm">Hired</button>
                </form>

                <form action="{{route('employer.application.status', $application->id)}}" method="POST" class="d-inline">
                    <input type="hidden" name="status" value="shortlisted">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-danger btn-sm">Shortlisted</button>
                </form>

                <form action="{{route('employer.application.status', $application->id)}}" method="POST" class="d-inline">
                    <input type="hidden" name="status" value="rejected">
                    @csrf
                    @method('patch')
                    <button type="submit" class="btn btn-danger btn-sm">Rejected</button>
                </form>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

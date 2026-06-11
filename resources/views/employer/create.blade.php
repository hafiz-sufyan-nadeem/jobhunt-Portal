<form action="{{ route('employer.create') }}" method="get">
    @csrf

    <label>Company Name</label>
    <input type="text" name="company_name">

    <label>City</label>
    <input type="text" name="city">

    <label>Description</label>
    <textarea name="description"></textarea>

    <button type="submit">Save</button>
</form>

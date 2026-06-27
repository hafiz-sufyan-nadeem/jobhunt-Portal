<form enctype="multipart/form-data" action="{{ route('candidate.store') }}" method="post">
    @csrf
    <label>HeadLine</label>
    <input type="text" name="headline">

    <label>Phone</label>
    <input type="text" name="phone">

    <label>City</label>
    <input type="text" name="city">

    <label>Skills</label>
    <textarea name="skills"></textarea>

    <label>Resume</label>
    <input type="file" name="resume">

    <button type="submit">Save</button>
</form>

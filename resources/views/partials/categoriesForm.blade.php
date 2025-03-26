{{ csrf_field() }}
<label for="name">SCP Object Class Designation: </label>
<input name="name" type="text" value="{{ $name ?? '' }}"><br>

<label for="description">SCP Object Class Designation Description: </label>
<input name="description" type="text" value="{{ $description ?? '' }}"><br>

<input type="submit" value="{{ $buttonName }}"><br>

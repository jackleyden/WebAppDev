 @extends('layouts.main')

@section('title')
  search result
@endsection

@section('content')

<form method="post" action="search">
  {{csrf_form}}
  <table>
    <tr><td>name:</td> <td><input type="text" name="name"></td></tr>
    <tr><td>year</td> <td><input type="text" name="year"></td></tr>
    <tr><td>state</td> <td><input type="text" name="state"></td></tr>
    <tr><td colspan=2><input type="submit" value="Submit"></td></tr>
  </table>
  </form>
 @endsection